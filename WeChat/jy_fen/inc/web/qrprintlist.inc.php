<?php
/*
ini_set('display_errors',1);            //错误信息  
ini_set('display_startup_errors',1);    //php启动错误信息  
error_reporting(-1);                    //打印出所有的 错误信息  
*/
require IA_ROOT.'/addons/jy_fen/wxapp.php';

global $_GPC, $_W;
function getaccess_token(){
    global $_GPC, $_W;
	$res=pdo_get('jyfen_system',array('uniacid' => $_W['uniacid']));
	$appid=$res['appid'];
	$secret=$res['appsecret'];
	$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$secret."";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
	$data = curl_exec($ch);
	curl_close($ch);
	$data = json_decode($data,true);
	return $data['access_token'];
}
function set_msg($id,$access_token){
	$data2=array(
		"scene"=>$id,
		"page"=>"jy_fen/pages/wifi/wifi",
		"width"=>300
	);
	$data2 = json_encode($data2);
	$url = "https://api.weixin.qq.com/wxa/getwxacodeunlimit?access_token=".$access_token."";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
	curl_setopt($ch, CURLOPT_POST,1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$data2);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}
function WxAPPToken($gzwxapp,$reset=false){
    global $_W, $_GPC;
    
	$handle = new Jy_fenModuleWxapp();

    if($gzwxapp['sf_status']==1){
    	$checksf=$handle->checkIsSf($gzwxapp);
    	if($checksf['status']==1){
			$accessToken=$checksf['accesstoken'];
			if($handle->CheckWxApi($accessToken,$_W, $_GPC)){
				$token_expire=time();
				pdo_update('jyfen_gzwxapp',array('access_token'=>$accessToken,'token_expire'=>$token_expire),array('uniacid' => $_W['uniacid'],'id'=>$gzwxapp['id']));
				return $accessToken;
	    	}
		}
    }
    if($reset){
		return $handle->makeToken($gzwxapp);
    }
	if((time()+100)<$gzwxapp['token_expire']){
		$accessToken=$gzwxapp['access_token'];
	    if(!$handle->CheckWxApi($accessToken,$_W, $_GPC)){
    		return $handle->makeToken($gzwxapp);
	    }
	}else{
		return $handle->makeToken($gzwxapp);
	}
	return $accessToken;
}
/*function WxAPPToken($gzwxapp,$reset=false){
    global $_W, $_GPC;
	$handle = new Jy_fenModuleWxapp();
	if(!$reset&&(time()+100)<$gzwxapp['token_expire']){
		$accessToken=$gzwxapp['access_token'];
	    if(!$handle->CheckWxApi($accessToken,$_W, $_GPC)){
	    	return makeToken($gzwxapp);
	    }
	}else{
		$checksf=$handle->checkIsSf($gzwxapp);
		if($checksf['status']==1){
			$accessToken=$checksf['accesstoken'];
			if(!$handle->CheckWxApi($accessToken,$_W, $_GPC)){
	    		return makeToken($gzwxapp);
	    	}
			$token_expire=time()+48*3600;
			pdo_update('jyfen_gzwxapp',array('access_token'=>$accessToken,'token_expire'=>$token_expire),array('uniacid' => $_W['uniacid'],'id'=>$gzwxapp['id']));
		}elseif($checksf['status']==2){
			// die(json_encode(['status'=>0,'msg'=>'提示:您的第三方平台的接口有异常：'.$checksf['msg']));
	    	return makeToken($gzwxapp);
		}else{
	    	return makeToken($gzwxapp);
		}
	}
	return $accessToken;
}*/
/**
 * 生成图片
 * @param string $im 源图片路径
 * @param string $dest 目标图片路径
 * @param int $maxwidth 生成图片宽
 * @param int $maxheight 生成图片高
 */
function resizeImage($im, $dest, $maxwidth, $maxheight) {
    $img = getimagesize($im);
    switch ($img[2]) {
        case 1:
            $im = @imagecreatefromgif($im);
            break;
        case 2:
            $im = @imagecreatefromjpeg($im);
            break;
        case 3:
            $im = @imagecreatefrompng($im);
            break;
    }
 
    $pic_width = imagesx($im);
    $pic_height = imagesy($im);
    $resizewidth_tag = false;
    $resizeheight_tag = false;
    if (($maxwidth && $pic_width > $maxwidth) || ($maxheight && $pic_height > $maxheight)) {
        if ($maxwidth && $pic_width > $maxwidth) {
            $widthratio = $maxwidth / $pic_width;
            $resizewidth_tag = true;
        }
 
        if ($maxheight && $pic_height > $maxheight) {
            $heightratio = $maxheight / $pic_height;
            $resizeheight_tag = true;
        }
 
        if ($resizewidth_tag && $resizeheight_tag) {
            if ($widthratio < $heightratio)
                $ratio = $widthratio;
            else
                $ratio = $heightratio;
        }
 
        if ($resizewidth_tag && !$resizeheight_tag)
            $ratio = $widthratio;
        if ($resizeheight_tag && !$resizewidth_tag)
            $ratio = $heightratio;
        $newwidth = $pic_width * $ratio;
        $newheight = $pic_height * $ratio;
 
        if (function_exists("imagecopyresampled")) {
            $newim = imagecreatetruecolor($newwidth, $newheight);
            imagecopyresampled($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $pic_width, $pic_height);
        } else {
            $newim = imagecreate($newwidth, $newheight);
            imagecopyresized($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $pic_width, $pic_height);
        }
 
        imagejpeg($newim, $dest);
		chmod($dest, 0777);
        imagedestroy($newim);
    } else {
        imagejpeg($im, $dest);
		chmod($dest, 0777);
    }
}
 
/**
 * 图片压缩处理
 * @param string $sFile 源图片路径
 * @param string $hFile 压缩后的图片路径
 * @param int $iWidth  自定义图片宽度
 * @param int $iHeight 自定义图片高度
 */
function getThumb($sFile,$hFile,$iWidth,$iHeight){
    //图片公共路径
	$public_path = '';
	//判断该图片是否存在
    if(!file_exists($public_path.$sFile)) return $sFile;
    //判断图片格式(图片文件后缀)
	$extend = explode("." , $sFile);
    $attach_fileext = strtolower($extend[count($extend) - 1]);
    if (!in_array($attach_fileext, array('jpg','png','jpeg'))){
        return '';
    }
    //压缩图片文件名称
    $sFileNameS = $hFile;
    //判断是否已压缩图片，若是则返回压缩图片路径
    if(file_exists($public_path.$sFileNameS)){
        return $sFileNameS;
    }
 
    //生成压缩图片，并存储到原图同路径下
    resizeImage($public_path.$sFile, $public_path.$sFileNameS, $iWidth, $iHeight);
    if(!file_exists($public_path.$sFileNameS)){
        return $sFile;
    }
    return $sFileNameS;
}
/*function makeToken($gzwxapp){
    global $_W, $_GPC;
	$appid=$gzwxapp['appid'];
	$secret=$gzwxapp['appsecret'];
	$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$secret."";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
	$data = curl_exec($ch);
	curl_close($ch);
	//print_r($data);
	$data = json_decode($data,true);
	if($data['access_token']){
		//成功过后返回ACCESS_TOKEN
		$accessToken = $data['access_token'];
		$token_expire=time()+$data['expires_in'];
		pdo_update('jyfen_gzwxapp',array('access_token'=>$accessToken,'token_expire'=>$token_expire),array('uniacid' => $_W['uniacid'],'id'=>$gzwxapp['id']));
	}else{
		return;
	}
	return $accessToken;
}*/
function MakeWxAPPQR($gzwxapp,$accessToken,$id,$set_txt,$path,$path2){
  	//echo $accessToken;
  	//echo '<br>';
    global $_W, $_GPC;
    if($gzwxapp&&file_exists($path)&&file_exists($path2)){
		return 1;
    }else{
		if(!$accessToken){
			$accessToken=WxAPPToken($gzwxapp,true);
        	return MakeWxAPPQR($gzwxapp,$accessToken,$id,$set_txt,$path,$path2);
		}
		load()->library('qrcode');
		$errorCorrectionLevel = "L";
		$matrixPointSize = 10;
		if($gzwxapp['gz_type']==1){
			$reqParam='{"action_name": "QR_LIMIT_STR_SCENE", "action_info": {"scene": {"scene_str": "jy_'.$set_txt.'"}}}
	';
			// print_r($reqParam);
			$url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=".$accessToken;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
			curl_setopt($ch, CURLOPT_POST,1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$reqParam);
			$resJson = curl_exec($ch);
			curl_close($ch);
			// print_r($resJson);exit;
          
			$res = json_decode($resJson ,true);
          	if($res['errcode']===40001){
              	$accessToken=WxAPPToken($gzwxapp,true);
            	return MakeWxAPPQR($gzwxapp,$accessToken,$id,$set_txt,$path,$path2);
            }
            if($res['errcode']){
				die(json_encode(['status'=>0,'msg'=>'获取公众号生成二维码出错，微信接口返回结果是：'.$resJson]));
            }
            if(empty($res['ticket'])){
				die(json_encode(['status'=>0,'msg'=>'创建公众号的二维码失败，可能是公众号还没对接好，或者公众号Appid跟公众号的Appsecret不正确']));
            }
			$ticket = $res['ticket'];
			$url=$res['url'];
			//echo "tick:".$ticket;exit;
			//获取二维码
			/*$ch2 = curl_init();
			$url2 = 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket='.$ticket;
			curl_setopt($ch2, CURLOPT_URL,$url2);
			curl_setopt($ch2, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER,0);
			curl_setopt($ch2, CURLOPT_POST,0);
			$img = curl_exec($ch2);
			//print_r($img);exit;
			*/
			$qrcode=ATTACHMENT_ROOT .'template/qrcode/';
			if(!is_dir($qrcode)){
			   	mkdir($qrcode, 0777, true);
        		chmod($qrcode, 0777);
			}

			QRcode::png($url, $path, $errorCorrectionLevel, $matrixPointSize);
			/*$picture_attach = 'code_' . $id . '.png';
			$new_attach = 'mycode_' . $id . '.png';
			$picture = $_W['attachurl'] . 'template/qrcode/' . $picture_attach;
			$newpicture = $_W['attachurl'] . 'template/qrcode/' . $new_attach; 
			$erweima = $qrcode . $picture_attach;
			$myyaoqing = $qrcode.$new_attach;
			file_put_contents($qrcode. $picture_attach, $img);*/
			// file_put_contents($path, $img);
			chmod($path, 0777);
		}else{
			if(empty($gzwxapp['gz_biz'])){
				die(json_encode(['status'=>0,'msg'=>'您选择打印的二维码中有需要公众号需要填写公众号的文章链接']));
			}
    		$url="https://mp.weixin.qq.com/mp/profile_ext?action=home&__biz=".$gzwxapp['gz_biz']."==#wechat_redirect";
			QRcode::png($url, $path, $errorCorrectionLevel, $matrixPointSize);
		}
		
		getThumb($path,$path2,300,300);

		if(!$gzwxapp){
			$gzwxapp['wifiid'] = $id;
            $gzwxapp['dateline'] = time();
			$gzwxapp['uniacid'] = $_W['uniacid'];
            // $gzwxapp['img'] = $picture;
            pdo_insert('jyfen_gzwxapp',$gzwxapp);
		}
		return 1;
	}
	return 0;
}
$GLOBALS['frames'] = $this->getMainMenu();
$uniacid = $_W['uniacid'];
$pageindex = max(1, intval($_GPC['page']));
$pagesize=10;
$where=" WHERE a.uniacid=$uniacid ";
$where2=" WHERE uniacid=$uniacid ";
$sql="select a.* ,b.name as yangshititle,c.appname from " . tablename("jyfen_qrcode_print") . " a"  . " left join " . tablename("jyfen_yangshi") . " b on a.yangshi=b.id left join " . tablename("jyfen_gzwxapp") . " c on a.wxappid=c.id ". $where." ORDER BY a.id DESC";

$total=pdo_fetchcolumn("SELECT count(*) FROM ".tablename('jyfen_qrcode_print') .  "".$where2." ORDER BY id DESC",$data);
$list=pdo_fetchall($sql);
$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
$list=pdo_fetchall($select_sql);
$pager = pagination($total, $pageindex, $pagesize);
if($_GPC['op']=='delete'){
	$qrcode_print = pdo_get('jyfen_qrcode_print', array('id' => $_GPC['id'],'uniacid'=>$uniacid), array('id','yangshi', 'num', 'name','path'));
	if(!$qrcode_print){
		message('参数无效！','','error');
	}
	$res=pdo_delete('jyfen_qrcode_print',array('id'=>$_GPC['id'],'uniacid'=>$uniacid));
	if($res){
		if($qrcode_print['path']){
			$zipname=MODULE_ROOT.'/'.$qrcode_print['path'];
			if(file_exists($zipname)){
				unlink($zipname);
			}
		}
		$wifi_sql = "select id from".tablename('jyfen_wifi')." where qrid={$_GPC['id']} and uniacid={$uniacid} and status=2 order by id asc";
		$wifi = pdo_fetchall($wifi_sql);
		pdo_delete('jyfen_wifi',array('qrid'=>$_GPC['id'],'uniacid'=>$uniacid,'status'=>2));
		foreach($wifi as $key=>$val){
			$qrcode=MODULE_ROOT .'/template/qrcode/';
			$picture_attach = 'wxapp-' . $val['name'] . '.png';
			$picture_attach2 = 'wxapp300-' . $val['name'] . '.png';
			$new_attach = 'HB-' . $val['name'] . '.png';
			$erweima = $qrcode . $picture_attach;
			$erweima2 = $qrcode . $picture_attach2;
			$myyaoqing = $qrcode.$new_attach;
			if(file_exists($erweima)){
				unlink($erweima);
			}
			if(file_exists($erweima2)){
				unlink($erweima2);
			}
		}
		message('删除成功！', $this->createWebUrl('qrprintlist'), 'success');
	}else{
		message('删除失败！','','error');
	}
}
if($_GPC['op']=='dabao'){
	$qrcode_print = pdo_get('jyfen_qrcode_print', array('id' => $_GPC['qid'],'uniacid'=>$uniacid), array('id','yangshi', 'num', 'name','path','fxid','ptype','wxappid','is_zdwifi'));
	if(!$qrcode_print){
		die(json_encode(['status'=>0,'msg'=>'参数无效！']));
	}
	//if(empty($qrcode_print['path'])||!file_exists(MODULE_ROOT.'/'.$qrcode_print['path'])){
	if(true){
		$yangshi = pdo_get('jyfen_yangshi', array('id' => $qrcode_print['yangshi'],'uniacid'=>$uniacid), array('yuantu','watermark'));
		if(!$yangshi){
			die(json_encode(['status'=>0,'msg'=>'没有选择样式，请检查']));
		}
		
		$sql = "select id,name,is_zdwifi from".tablename('jyfen_wifi')." where qrid={$qrcode_print['id']} and status=2 and uniacid={$uniacid} order by id asc";
		$wifi = pdo_fetchall($sql);
		$updatesql="";
		foreach($wifi as $key=>$val){
			$bianhao="JY".sprintf("%08d", $val['id']);
			$updatesql=$updatesql."update " . tablename("jyfen_wifi") ." set name='{$bianhao}' where id={$val['id']};";
		}
		pdo_run($updatesql);
		
		$wifi = pdo_fetchall($sql);
		load()->library('qrcode');
		if($qrcode_print['wxappid']){
			$gzwxapp=pdo_get('jyfen_gzwxapp',array('uniacid' => $_W['uniacid'],'id'=>$qrcode_print['wxappid']));
			if(!$gzwxapp){
				die(json_encode(['status'=>0,'msg'=>'公众号不存或者已被删除']));
			}
		}
		if(count($wifi)<=0){
			die(json_encode(['status'=>0,'msg'=>'没有预打印的WIFI，可能是全部WIFI已经绑定过']));
		}
		$file_arr=[];
		foreach($wifi as $key=>$val){
			$data=$val;
	
			$qrcode=MODULE_ROOT .'/template/qrcode/';
			$picture_attach = 'QR-' . $val['name'] . '.png';
			$picture_attach2 = 'wxapp300-' . $val['name'] . '.png';
			$new_attach = 'HB-' . $val['name'] . '.png';
			$picture = $_W['siteroot'].'addons/jy_fen/template/qrcode/' . $picture_attach;
			$erweima = $qrcode . $picture_attach;
			$erweima2 = $qrcode . $picture_attach2;
			$myyaoqing = $qrcode.$new_attach;
			// $newpicture = $_W['siteroot'].'addons/jy_fen/template/qrcode/' . $new_attach; 
			if(!is_dir($qrcode)){
			   	mkdir($qrcode, 0777, true);
        		chmod($qrcode, 0777);
			}
			$set_txt=$data['id'];
			if(!empty($qrcode_print['fxid'])){
				$set_txt=$set_txt.','.$qrcode_print['fxid'];
			}else{
				$set_txt=$set_txt.',0';
			}
			if($data['is_zdwifi']==2){
				$set_txt=$set_txt.',2';
			}
			// print_r($set_txt);exit;
			/*$img=set_msg($set_txt,$token);
			$txt=base64_encode($img);

			file_put_contents($qrcode. $picture_attach, base64_decode($txt));*/
			if($qrcode_print['wxappid']){
				$accessToken=WxAPPToken($gzwxapp);
				/*if(empty($accessToken)){
					die(json_encode(['status'=>0,'msg'=>'获取公众号的Token失败，请检查公众号的Appid跟公众号的Appsecret是否正确']));
				}*/
				MakeWxAPPQR($gzwxapp,$accessToken,$data['id'],$set_txt,$erweima,$erweima2);
			}else{
				$url=$_W['siteroot']."app/index.php?i=".$_W['uniacid']."&a=wxapp&c=entry&do=Huoma&m=jy_fen&wifi_id=".$data['id']."&set_txt=".$set_txt;
				$errorCorrectionLevel = "L";
				$matrixPointSize = 10;
				/*echo $url;
				echo ',';
				echo $erweima;
				echo ',';
				echo $errorCorrectionLevel;
				echo ',';
				echo $matrixPointSize;*/
				QRcode::png($url, $erweima, $errorCorrectionLevel, $matrixPointSize);
				// print_r($res);
				getThumb($erweima,$erweima2,300,300);
				/*echo $erweima;
				echo $erweima2;
				exit;*/
			}
			if($qrcode_print['ptype']==1||$qrcode_print['ptype']==0){
				$ditu=tomedia($yangshi['yuantu']);
				/*下载回原图 开始*/
				load()->func('file');
				if (strpos($ditu, $_W['attachurl_local']) === false) {
					if (function_exists('file_fetch')) {
						$ditu = file_fetch($ditu);
					} else {
						$ditu = file_remote_attach_fetch($ditu);
					}
				} else {
					$ditu = str_replace($_W['attachurl_local'], '', $ditu);
				}
				if(!file_exists(ATTACHMENT_ROOT.$ditu)){
					die(json_encode(['status'=>0,'msg'=>'获取样式图失败']));
				}
				if(!file_exists($erweima)){
					die(json_encode(['status'=>0,'msg'=>'生成的二维码图失败']));
				}
				/*下载回原图 结束*/
				$QR = imagecreatefromstring(file_get_contents(ATTACHMENT_ROOT.$ditu));  
				$logo = imagecreatefromstring(file_get_contents($erweima));   
				$QR_width = imagesx($QR);//二维码图片宽度   
				$QR_height = imagesy($QR);//二维码图片高度   
				if($QR_width!=640&&$QR_height!=1136){
					die(json_encode(['status'=>0,'msg'=>'演示图的尺寸必须为640*1136']));
				}
				$logo_width = imagesx($logo);//logo图片宽度   
				$logo_height = imagesy($logo);//logo图片高度   
				$logo_qr_width = $QR_width / 2;   
				$scale = $logo_width/$logo_qr_width;   
				$logo_qr_height = $logo_height/$scale;   
				$from_width = ($QR_width - $logo_qr_width) / 2;  
				$from_height = ($QR_width - $logo_qr_width) / 0.88;   
				//重新组合图片并调整大小   
				imagecopyresampled($QR, $logo, $from_width, $from_height, 0, 0, $logo_qr_width,   
				$logo_qr_height, $logo_width, $logo_height);   
				if(!file_exists(MODULE_ROOT .'/template/fonts/msyh.ttc')){
					die(json_encode(['status'=>0,'msg'=>'字体文件缺失']));
				}
				if($yangshi['watermark']==1){
					$str="欢迎来连我的WIFI";
					$strlen=mb_strlen($str,'gb2312');
					$width1 = (640-$strlen*20)/2;
					$width1 = $width1<0?0:$width1;
					imagettftext($QR,26,0,$width1,410,imagecolorallocate($QR,137,137,137),MODULE_ROOT .'/template/fonts/msyh.ttc',$str);
				}
				imagettftext($QR,8,0,10,10,imagecolorallocate($QR,51, 51, 51),MODULE_ROOT .'/template/fonts/msyh.ttc',$val['name']);
				//输出图片   
				imagepng($QR, $myyaoqing);
				chmod($myyaoqing, 0777);
				file_delete($erweima);
				$file_arr[]=[$myyaoqing,'wifi_id_'.$val['id'].'.png'];
			}else if($qrcode_print['ptype']==2){
				//第一：创建一个画布，以后的操作都将基于此画布区域     
				$codew = 350;
				$codeh = 350;
				$codeimg = imagecreatetruecolor($codew, $codeh);
				 
				//第二：获取画布颜色
				$white = imagecolorallocate($codeimg, 255, 255, 255);
				//第三：填充画布背景颜色
				imagefill($codeimg, 0, 0, $white);
				/*第四：将加载的图片，复制到画布上
				 参数说明：
				 $im：不用说，指的是画布;
				 $im_new：源图片，也就是从外面加载进来的图像
				 (30,30)：将加载进来的图像，放在画布中的位置，左上角
				 (0,0)：表示加载的图片，从什么位置开始。(0,0)表示左上角起点，也可以只加载图片的一部分进来的
				 (*,*)：用*表示，可以为原图片宽和高，也可以小于宽高，只截取一部分，与上面坐标一起使用，表示截取的部分
				*/
				if(!file_exists($erweima2)){
					die(json_encode(['status'=>0,'msg'=>'生成的二维码图失败']));
				}
				$im_new = imagecreatefromjpeg($erweima2);//返回图像标识符
				$im_new_info = getimagesize($erweima2);//取得图像大小，返回一个数组。该函数不需要用到gd库。
				imagecopy($codeimg,$im_new,30,0,0,0,$im_new_info[0],$im_new_info[1]);//返回布尔值
				 
				if(!file_exists(MODULE_ROOT .'/template/fonts/msyh.ttc')){
					die(json_encode(['status'=>0,'msg'=>'字体文件缺失']));
				}
				//第五：加图片的名称到画布
				imagettftext($codeimg,22,0,100,340,imagecolorallocate($codeimg,0,0,0),MODULE_ROOT .'/template/fonts/msyh.ttc',$val['name']);
				//第六：输出创建的画布
				$picture_attach = 'QR-' . $val['name'] . '.png';
				$erweima = $qrcode . $picture_attach;
				imagepng($codeimg,$erweima);
				chmod($erweima, 0777);
				//第七：销毁图像，释放内存
				imagedestroy($codeimg);
				
				$file_arr[]=[$erweima,'QR-'.$val['name'].'.png'];
			}
		}
		$zip = new ZipArchive();
		$zipname=MODULE_ROOT .'/template/qrcode/zip/gz'.$qrcode_print['id'];
		if(!is_dir($zipname)){
			mkdir($zipname, 0777, true);
        	chmod($zipname, 0777);
		}
		$zipname.="/" . date('YmdHis').".zip";
		$res = $zip->open($zipname, ZipArchive::CREATE);
		if ($res === TRUE) {
		 foreach ($file_arr as $file) {
			//这里直接用原文件的名字进行打包，也可以直接命名，需要注意如果文件名字一样会导致后面文件覆盖前面的文件，所以建议重新命名
			//$new_filename = substr($file, strrpos($file, '/') + 1);
			$zip->addFile($file[0], $file[1]);
		 }
		}
		//关闭文件
		$zip->close();
		foreach ($file_arr as $file) {
        	file_delete($file[0]);
		}
		$path=str_replace(MODULE_ROOT .'/','',$zipname);
		//更uid等于2的用户的用户名
		$set_data = array(
			'path' => $path,
		);
		$result = pdo_update('jyfen_qrcode_print', $set_data, array('id' => $qrcode_print['id'],'uniacid'=>$uniacid));
	}else{
		$zipname=MODULE_ROOT .'/'.$qrcode_print['path'];
	}
	
	//这里是下载zip文件
	/*header("Content-Type: application/zip");
	header("Content-Transfer-Encoding: Binary");
	header("Content-Length: " . filesize($zipname));
	header("Content-Disposition: attachment; filename=\"" . basename($zipname) . "\"");
	readfile($zipname);
	exit;*/
	if(file_exists($zipname)){
		$zipurl=str_replace(MODULE_ROOT,$_W['siteroot'].'addons/jy_fen',$zipname);
		die(json_encode(['status'=>1,'durl'=>$zipurl]));
	}
	die(json_encode(['status'=>0,'msg'=>'创建压缩包失败']));
}
include $this->template('web/qrprintlist');