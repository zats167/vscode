<?php
/**
 * 微商城公告模块定义
 */
defined('IN_IA') or exit('Access Denied');

class jy_fen_plugin_redModule extends WeModule {

	public function welcomeDisplay()
    {   
       global $_GPC, $_W;
       $url = url('account/display/type');
       /*Header("Location: " . $url);*/
	   message('请从主模块进入',$url,'error');
	}
}