<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$item=pdo_get('jyfen_plugin_redset',array('uniacid'=>$_W['uniacid']));
if(checksubmit('submit')){
	$data['gz_status']=$_GPC['gz_status'];
	$data['gz_redimg1']=$_GPC['gz_redimg1'];
	$data['gz_redimg2']=$_GPC['gz_redimg2'];
	$data['gz_maxmoney']=$_GPC['gz_maxmoney'];
	$data['gz_rule']=html_entity_decode($_GPC['gz_rule']);
	if(empty($data['gz_maxmoney'])){
		$data['gz_maxmoney']=0;
	}
	if($data['gz_maxmoney']<0||$data['gz_maxmoney']>100){
		message('红包最大比例的值只能是0-100之间','','error');
	}
	if($_GPC['id']==''){
		$data['uniacid']=$_W['uniacid'];          
		$res=pdo_insert('jyfen_plugin_redset',$data);
		if($res){
			message('提交成功',$this->createWebUrl('gzredset',array()),'success');
		}else{
			message('提交失败','','error');
		}
	}else{
		$res = pdo_update('jyfen_plugin_redset', $data, array('id' => $_GPC['id']));
		if($res){
			message('提交成功',$this->createWebUrl('gzredset',array()),'success');
		}else{
			message('提交失败','','error');
		}
	}
}
include $this->template('web/gzredset');