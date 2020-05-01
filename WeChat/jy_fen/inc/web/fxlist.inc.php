<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();

$pageindex = max(1, intval($_GPC['page']));
$pagesize=10;
$where=' WHERE  a.uniacid=:uniacid';
$where2=' WHERE  uniacid=:uniacid';
$data[':uniacid']=$_W['uniacid'];
if($_GPC['keywords']){
    $op=$_GPC['keywords'];
    $where.=" and (a.user_tel LIKE  concat('%', :name,'%') || a.user_name LIKE  concat('%', :name,'%'))";   
    $where2.=" and (user_tel LIKE  concat('%', :name,'%') || user_name LIKE  concat('%', :name,'%'))";  
    $data[':name']=$op;
} 
//$sql="SELECT * FROM ".tablename('jyfen_distribution') .  "  ". $where." ORDER BY id DESC";

$sql="select a.* ,b.img,b.commission,b.name from " . tablename("jyfen_distribution") . " a"  . " left join " . tablename("jyfen_user") . " b on b.id=a.user_id  ". $where." ORDER BY id DESC";

$total=pdo_fetchcolumn("SELECT count(*) FROM ".tablename('jyfen_distribution') .  "".$where2." ORDER BY id DESC",$data);

$list=pdo_fetchall( $sql,$data);

$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;

$list=pdo_fetchall($select_sql,$data);

$pager = pagination($total, $pageindex, $pagesize);

$operation=$_GPC['op'];

if($operation=='adopt'){
	//审核通过
    $id=$_GPC['id'];
    $res=pdo_update('jyfen_distribution',array('state'=>2),array('id'=>$id));  

    function getaccess_token2(){
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

    //模板消息
    function set_msg_wifi($mes,$getaccess_token2){
        $openid = $mes['openid'];
        // $mbid = 'R5MaiTV_s5HjY4gLbjJIu35sdGLhm6xfCd5g6yVo9Fw';

        $formwork ='{
            "touser": "'. $openid.'",
            "template_id": "'.$mes['mbid'].'",
            "form_id":"'.$mes['form_id'].'",
            "page": "jy_fen/pages/wifi/wifi",    
            "data": {
                "keyword1": {
                "value": "'.$mes['jg'].'",
                "color": "#173177"
                },
                "keyword2": {
                    "value":"'.$mes['time'].'",
                    "color": "#173177"
                },
                "keyword3": {
                    "value": "'.$mes['sh'].'",
                    "color": "#173177"
                }
            }  
        }';
        // $formwork=$data;
        $url = "https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send?access_token=".$getaccess_token2."";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$formwork);
        $data = curl_exec($ch);
        curl_close($ch);
        // echo $data;die;
        //return $data;                       
            
    }
    $sms=pdo_get('jyfen_sms',array('uniacid' => $_W['uniacid']));
    $fxu = pdo_get('jyfen_distribution',array('id'=>$id));
    $users = pdo_get('jyfen_user',array('id'=>$fxu['user_id']));
    $ress=pdo_get('jyfen_system',array('uniacid' => $_W['uniacid']));
    if($res){

        $mes = [];
        $mes['form_id'] = $fxu['form_id'];
        $mes['openid'] = $users['openid'];
        $mes['jg'] = '您的代理商申请已通过审核';
        $mes['time'] = date('Y-m-d H:i:s',time());
        $mes['sh'] = $ress['pt_name'];
        $mes['mbid'] = $sms['yy_tid'];
        if($fxu['form_id']){
            $getaccess_token2 = getaccess_token2();
            echo set_msg_wifi($mes,$getaccess_token2);
        }
        
        message('审核成功',$this->createWebUrl('fxlist',array()),'success');
    }else{
        // $mes = [];
        // $mes['form_id'] = $fxu['form_id'];
        // $mes['openid'] = $users['openid'];
        // $mes['jg'] = '您的代理商申请审核失败';
        // $mes['time'] = date('Y-m-d H:i:s',time());
        // $mes['sh'] = $ress['pt_name'];
        // if($fxu['form_id']){
        //     $getaccess_token2 = getaccess_token2();
        //     echo set_msg_wifi($mes,$getaccess_token2);
        // }
        message('审核失败','','error');
    }
}
if($operation=='reject'){
    $id=$_GPC['id'];
    $res=pdo_update('jyfen_distribution',array('state'=>3),array('id'=>$id));
    function getaccess_token2(){
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

    //模板消息
    function set_msg_wifi($mes,$getaccess_token2){
        $openid = $mes['openid'];
        // $mbid = 'R5MaiTV_s5HjY4gLbjJIu35sdGLhm6xfCd5g6yVo9Fw';

        $formwork ='{
            "touser": "'. $openid.'",
            "template_id": "'.$mes['mbid'].'",
            "form_id":"'.$mes['form_id'].'",
            "page": "jy_fen/pages/wifi/wifi",    
            "data": {
                "keyword1": {
                "value": "'.$mes['jg'].'",
                "color": "#173177"
                },
                "keyword2": {
                    "value":"'.$mes['time'].'",
                    "color": "#173177"
                },
                "keyword3": {
                    "value": "'.$mes['sh'].'",
                    "color": "#173177"
                }
            }  
        }';
        // $formwork=$data;
        $url = "https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send?access_token=".$getaccess_token2."";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$formwork);
        $data = curl_exec($ch);
        curl_close($ch);
        // echo $data;die;
        //return $data;                       
            
    }
    $sms=pdo_get('jyfen_sms',array('uniacid' => $_W['uniacid']));
    $fxu = pdo_get('jyfen_distribution',array('id'=>$id));
    $users = pdo_get('jyfen_user',array('id'=>$fxu['user_id']));
    $ress=pdo_get('jyfen_system',array('uniacid' => $_W['uniacid']));
     if($res){
        $mes = [];
        $mes['form_id'] = $fxu['form_id'];
        $mes['openid'] = $users['openid'];
        $mes['jg'] = '您的代理商申请审核已拒绝';
        $mes['time'] = date('Y-m-d H:i:s',time());
        $mes['sh'] = $ress['pt_name'];
        $mes['mbid'] = $sms['yy_tid'];
        if($fxu['form_id']){
            $getaccess_token2 = getaccess_token2();
            echo set_msg_wifi($mes,$getaccess_token2);
        }
        message('拒绝成功',$this->createWebUrl('fxlist',array()),'success');
    }else{
        message('拒绝失败','','error');
    }
}
if($operation=='delete'){
     $id=$_GPC['id'];
     $res=pdo_delete('jyfen_distribution',array('id'=>$id));
     if($res){
      pdo_delete('jyfen_fxuser',array('user_id'=>$id));
      pdo_delete('jyfen_fxuser',array('fx_user'=>$id));
        message('删除成功',$this->createWebUrl('fxlist',array()),'success');
    }else{
        message('删除失败','','error');
    }

}
if($_GPC['id2']){
  $id=$_GPC['id2'];
  pdo_update('jyfen_user',array('commission +='=>$_GPC['reply']),array('id'=>$id));
  $data3['user_id']=$id;//上线id
  $data3['son_id']=0;
  $data3['money']=$_GPC['reply'];//金额
  $data3['time']=time();//时间
  $data3['uniacid']=$_W['uniacid'];
  $data3['note']='后台充值';
  $res=pdo_insert('jyfen_earnings',$data3);
  if($res){
        message('充值成功',$this->createWebUrl('fxlist',array()),'success');
    }else{
        message('充值失败','','error');
    }
}

include $this->template('web/fxlist');