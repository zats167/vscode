<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$operation = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
$type=empty($_GPC['type']) ? 'all' :$_GPC['type'];
$state=empty($_GPC['state']) ? '1' :$_GPC['state'];
$pageindex = max(1, intval($_GPC['page']));
$pagesize=10;
$where=' WHERE a.uniacid=:uniacid';
$data[':uniacid']=$_W['uniacid'];
if(checksubmit('submit')){
    $op=$_GPC['keywords'];
    $where.=" and a.user_name LIKE  concat('%', :name,'%') ";    
    $data[':name']=$op;
    $type='all';
}
if($type=='all'){    
  $sql="SELECT a.*,b.name as uname FROM ".tablename('jyfen_tx') ." a left join ".tablename('jyfen_user')." b on a.user_id=b.id ".$where." ORDER BY a.time DESC";
  $total=pdo_fetchcolumn("SELECT count(0) FROM ".tablename('jyfen_tx') ." a ".$where." ORDER BY a.time DESC",$data);
}else{
    $where.= " and a.state=$state";
    $sql="SELECT a.*,b.name as uname FROM ".tablename('jyfen_tx')." a left join ".tablename('jyfen_user')." b on a.user_id=b.id ". $where." ORDER BY a.time DESC";
    $data[':uniacid']=$_W['uniacid'];
    $total=pdo_fetchcolumn("SELECT count(*) FROM ".tablename('jyfen_tx') ." a ".$where." ORDER BY a.time DESC",$data);
}
$list=pdo_fetchall( $sql,$data);
$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
$list=pdo_fetchall($select_sql,$data);
$pager = pagination($total, $pageindex, $pagesize);
if($operation=='adopt'){
	$id=$_GPC['id'];
    $list=pdo_get('jyfen_tx',array('id'=>$_GPC['id']));
    $user=pdo_get('jyfen_user',array('id'=>$list['user_id']));
    // print_r($list);die;
    
    $ress=pdo_update('jyfen_tx',array('state'=>2,'sh_time'=>time()),array('id'=>$id));  
    

    if($ress){
        $sms=pdo_get('jyfen_sms',array('uniacid' => $_W['uniacid']));
        if($user['isfrist_tx']==1){
            pdo_update('jyfen_user',array('isfrist_tx'=>2),array('id'=>$user['id']));
        }
        //添加记录
        $haha['user_id'] = $user['id'];
        $haha['money'] = $list['tx_cost'];
        $haha['type'] = 2;
        $haha['note'] = '余额提现';
        $haha['time'] = date('Y-m-d H:i:s',time());
        $arr = pdo_insert('jyfen_qbmx', $haha);

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
            // $mbid = '859AMNcu1rTBLjok_QJN6me2Vxu4wRRLZYwpu5jgp5Y';

            $formwork ='{
                "touser": "'. $openid.'",
                "template_id": "'.$mes['mbid'].'",
                "form_id":"'.$mes['form_id'].'",
                "page": "jy_fen/pages/wifi/wifi",    
                "data": {
                    "keyword1": {
                    "value": "'.$mes['user_name'].'",
                    "color": "#173177"
                    },
                    "keyword2": {
                        "value":"'.$mes['tx_cost'].'",
                        "color": "#173177"
                    },
                    "keyword3": {
                        "value": "'.$mes['sj_cost'].'",
                        "color": "#173177"
                    },
                    "keyword4": {
                        "value": "'.$mes['type'].'",
                        "color": "#173177"
                    },
                    "keyword6": {
                        "value": "'.$mes['time'].'",
                        "color": "#173177"
                    },
                    "keyword7": {
                        "value": "'.$mes['ts'].'",
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

        $mes = [];
        $mes['form_id'] = $list['form_id'];
        $mes['openid'] = $user['openid'];
        $mes['user_name'] = $list['user_name'];
        $mes['tx_cost'] = $list['tx_cost'];
        $mes['sj_cost'] = $list['sj_cost'];
        $mes['type'] = '支付宝余额';
        // $mes['account'] = $list['account'];
        $mes['time'] = date('Y-m-d H:i:s',time());
        $mes['ts'] = '提现成功';
        $mes['mbid'] = $sms['tid'];
        if($list['form_id']){
            $getaccess_token2 = getaccess_token2();
            echo set_msg_wifi($mes,$getaccess_token2);
        }
        message('审核成功',$this->createWebUrl('wifitxlist',array()),'success');
    }else{
        message('审核失败','','error');
    }
}
if($operation=='adopt2'){
    $id=$_GPC['id'];
    $list=pdo_get('jyfen_tx',array('id'=>$_GPC['id']));
    $user=pdo_get('jyfen_user',array('id'=>$list['user_id']));
    // print_r($list);
    // print_r($user);die;
    // print_r($id);die;
    ////////////////打款//////////////////////
    function arraytoxml($data){
        $str='<xml>';
        foreach($data as $k=>$v) {
            $str.='<'.$k.'>'.$v.'</'.$k.'>';
        }
        $str.='</xml>';
        return $str;
    }
    function xmltoarray($xml) { 
        //禁止引用外部xml实体 
        libxml_disable_entity_loader(true); 
        $xmlstring = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA); 
        $val = json_decode(json_encode($xmlstring),true); 
        return $val;
    } 
    function curl($param="",$url) {
        global $_GPC, $_W;
        $postUrl = $url;
        $curlPost = $param;
        $ch = curl_init();                                      //初始化curl
        curl_setopt($ch, CURLOPT_URL,$postUrl);                 //抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);                    //设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);            //要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1);                      //post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);           // 增加 HTTP Header（头）里的字段 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);        // 终止从服务端进行验证
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch,CURLOPT_SSLCERT,IA_ROOT . "/addons/jy_fen/cert/".'apiclient_cert_' . $_W['uniacid'] . '.pem'); //这个是证书的位置绝对路径
        curl_setopt($ch,CURLOPT_SSLKEY,IA_ROOT . "/addons/jy_fen/cert/".'apiclient_key_' . $_W['uniacid'] . '.pem'); //这个也是证书的位置绝对路径
        $data = curl_exec($ch);                                 //运行curl
        curl_close($ch);
        return $data;
    }  
    $system=pdo_get('jyfen_system',array('uniacid'=>$_W['uniacid']));
    $sms=pdo_get('jyfen_sms',array('uniacid' => $_W['uniacid']));
    $data=array(
        'mch_appid'=>$system['appid'],//商户账号appid
        'mchid'=>$system['mchid'],//商户号
        'nonce_str'=>rand(1111111111,9999999999),//随机字符串
        'partner_trade_no'=>time().rand(11111,99999),//商户订单号
        'openid'=>$user['openid'],//用户openid
        'check_name'=>'NO_CHECK',//校验用户姓名选项,
        're_user_name'=>$list['user_name'],//收款用户姓名
        'amount'=>$list['sj_cost']*100,//金额

        'desc'=>'提现打款',//企业付款描述信息
        'spbill_create_ip'=>$system['ip'],//Ip地址
    );
    // print_r($system);
    // print_r($data);die;
    $key=$system['wxkey'];///这个就是个API密码。32位的。。随便MD5一下就可以了
   // $key=md5($key);
    $data=array_filter($data);
    ksort($data);
    $str='';
    foreach($data as $k=>$v) {
        $str.=$k.'='.$v.'&';
    }
    $str.='key='.$key;
    $data['sign']=md5($str);
    $xml=arraytoxml($data);
    $url='https://api.mch.weixin.qq.com/mmpaymkttransfers/promotion/transfers';
    $res=curl($xml,$url);


    $return=xmltoarray($res);
    if($return['result_code']=='SUCCESS'){
        pdo_update('jyfen_tx',array('state'=>2,'sh_time'=>time()),array('id'=>$id));

        if($user['isfrist_tx']==1){
            pdo_update('jyfen_user',array('isfrist_tx'=>2),array('id'=>$user['id']));
        }

        //添加记录
        $haha['user_id'] = $user['id'];
        $haha['money'] = $list['tx_cost'];
        $haha['type'] = 2;
        $haha['note'] = '余额提现';
        $haha['time'] = date('Y-m-d H:i:s',time());
        $arr = pdo_insert('jyfen_qbmx', $haha);

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
            // $mbid = '859AMNcu1rTBLjok_QJN6me2Vxu4wRRLZYwpu5jgp5Y';

            $formwork ='{
                "touser": "'. $openid.'",
                "template_id": "'.$mes['mbid'].'",
                "form_id":"'.$mes['form_id'].'",
                "page": "jy_fen/pages/wifi/wifi",    
                "data": {
                    "keyword1": {
                    "value": "'.$mes['user_name'].'",
                    "color": "#173177"
                    },
                    "keyword2": {
                        "value":"'.$mes['tx_cost'].'",
                        "color": "#173177"
                    },
                    "keyword3": {
                        "value": "'.$mes['sj_cost'].'",
                        "color": "#173177"
                    },
                    "keyword4": {
                        "value": "'.$mes['type'].'",
                        "color": "#173177"
                    },
                    "keyword6": {
                        "value": "'.$mes['time'].'",
                        "color": "#173177"
                    },
                    "keyword7": {
                        "value": "'.$mes['ts'].'",
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

        $mes = [];
        $mes['form_id'] = $list['form_id'];
        $mes['openid'] = $user['openid'];
        $mes['user_name'] = $list['user_name'];
        $mes['tx_cost'] = $list['tx_cost'];
        $mes['sj_cost'] = $list['sj_cost'];
        $mes['type'] = '微信零钱';
        // $mes['account'] = $list['account'];
        $mes['time'] = date('Y-m-d H:i:s',time());
        $mes['ts'] = '提现成功';
        $mes['mbid'] = $sms['tid'];
        if($list['form_id']){
            $getaccess_token2 = getaccess_token2();
            echo set_msg_wifi($mes,$getaccess_token2);
        }
        

        message('审核成功',$this->createWebUrl('wifitxlist',array()),'success');
    }else{
        
        if($return['err_code_des']){
            $message=$return['err_code_des'];
        }else{
            $message='请检查证书是否上传正确!';
        }
      message($return['err_code_des'],'','error');
    }
    // print_r($return);
  
////////////////打款//////////////////////

}

    

if($operation=='reject'){
     $id=$_GPC['id'];
     $list=pdo_get('jyfen_tx',array('id'=>$id));
    $res=pdo_update('jyfen_tx',array('state'=>3,'sh_time'=>time()),array('id'=>$id));
     if($res){
        pdo_update('jyfen_user',array('wallet +='=>$list['tx_cost']),array('id'=>$list['user_id']));
        message('拒绝成功',$this->createWebUrl('wifitxlist',array()),'success');
    }else{
        message('拒绝失败','','error');
    }
}
if($operation=='delete'){
     $id=$_GPC['id'];
     $res=pdo_delete('jyfen_tx',array('id'=>$id));
     if($res){
        message('删除成功',$this->createWebUrl('wifitxlist',array()),'success');
    }else{
        message('删除失败','','error');
    }

}

include $this->template('web/wifitxlist');