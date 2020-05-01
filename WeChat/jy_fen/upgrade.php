<?php
//升级数据表
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_commission_withdrawal` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1.支付宝2.银行卡',
  `state` int(11) NOT NULL COMMENT '1.审核中2.通过3.拒绝',
  `time` int(11) NOT NULL COMMENT '申请时间',
  `sh_time` int(11) NOT NULL COMMENT '审核时间',
  `uniacid` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `account` varchar(100) NOT NULL,
  `tx_cost` decimal(10,2) NOT NULL COMMENT '提现金额',
  `sj_cost` decimal(10,2) NOT NULL COMMENT '实际到账金额',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_commission_withdrawal','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_commission_withdrawal')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_commission_withdrawal','user_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_commission_withdrawal')." ADD   `user_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_commission_withdrawal','type')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_commission_withdrawal')." ADD   `type` int(11) NOT NULL COMMENT '1.支付宝2.银行卡'");}
if(!pdo_fieldexists('wx_jyfen_commission_withdrawal','state')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_commission_withdrawal')." ADD   `state` int(11) NOT NULL COMMENT '1.审核中2.通过3.拒绝'");}
if(!pdo_fieldexists('wx_jyfen_commission_withdrawal','time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_commission_withdrawal')." ADD   `time` int(11) NOT NULL COMMENT '申请时间'");}
if(!pdo_fieldexists('wx_jyfen_commission_withdrawal','sh_time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_commission_withdrawal')." ADD   `sh_time` int(11) NOT NULL COMMENT '审核时间'");}
if(!pdo_fieldexists('wx_jyfen_commission_withdrawal','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_commission_withdrawal')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_commission_withdrawal','user_name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_commission_withdrawal')." ADD   `user_name` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_commission_withdrawal','account')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_commission_withdrawal')." ADD   `account` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_commission_withdrawal','tx_cost')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_commission_withdrawal')." ADD   `tx_cost` decimal(10,2) NOT NULL COMMENT '提现金额'");}
if(!pdo_fieldexists('wx_jyfen_commission_withdrawal','sj_cost')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_commission_withdrawal')." ADD   `sj_cost` decimal(10,2) NOT NULL COMMENT '实际到账金额'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_distribution` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_tel` varchar(20) NOT NULL,
  `state` int(11) NOT NULL COMMENT '1.审核中2.通过3.拒绝',
  `uniacid` int(11) NOT NULL,
  `form_id` varchar(255) DEFAULT NULL,
  `province` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `area` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_distribution','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_distribution')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_distribution','user_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_distribution')." ADD   `user_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_distribution','time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_distribution')." ADD   `time` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_distribution','user_name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_distribution')." ADD   `user_name` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_distribution','user_tel')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_distribution')." ADD   `user_tel` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_distribution','state')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_distribution')." ADD   `state` int(11) NOT NULL COMMENT '1.审核中2.通过3.拒绝'");}
if(!pdo_fieldexists('wx_jyfen_distribution','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_distribution')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_distribution','form_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_distribution')." ADD   `form_id` varchar(255) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_distribution','province')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_distribution')." ADD   `province` varchar(200) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_distribution','city')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_distribution')." ADD   `city` varchar(200) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_distribution','area')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_distribution')." ADD   `area` varchar(200) DEFAULT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_djgglist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `gg_id` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `uniacid` int(11) DEFAULT NULL,
  `wifi_id` int(11) DEFAULT NULL COMMENT 'wifiid',
  `money` decimal(11,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_djgglist','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_djgglist')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_djgglist','user_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_djgglist')." ADD   `user_id` int(11) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_djgglist','gg_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_djgglist')." ADD   `gg_id` int(11) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_djgglist','time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_djgglist')." ADD   `time` int(11) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_djgglist','ip')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_djgglist')." ADD   `ip` varchar(50) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_djgglist','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_djgglist')." ADD   `uniacid` int(11) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_djgglist','wifi_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_djgglist')." ADD   `wifi_id` int(11) DEFAULT NULL COMMENT 'wifiid'");}
if(!pdo_fieldexists('wx_jyfen_djgglist','money')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_djgglist')." ADD   `money` decimal(11,2) DEFAULT '0.00'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_earnings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `son_id` int(11) NOT NULL COMMENT '下线',
  `money` decimal(11,2) DEFAULT '0.00',
  `time` int(11) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `order` varchar(20) DEFAULT NULL,
  `type` int(4) DEFAULT '1' COMMENT '1加 2减',
  `note` varchar(200) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_earnings','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_earnings')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_earnings','user_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_earnings')." ADD   `user_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_earnings','son_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_earnings')." ADD   `son_id` int(11) NOT NULL COMMENT '下线'");}
if(!pdo_fieldexists('wx_jyfen_earnings','money')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_earnings')." ADD   `money` decimal(11,2) DEFAULT '0.00'");}
if(!pdo_fieldexists('wx_jyfen_earnings','time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_earnings')." ADD   `time` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_earnings','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_earnings')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_earnings','order')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_earnings')." ADD   `order` varchar(20) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_earnings','type')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_earnings')." ADD   `type` int(4) DEFAULT '1' COMMENT '1加 2减'");}
if(!pdo_fieldexists('wx_jyfen_earnings','note')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_earnings')." ADD   `note` varchar(200) DEFAULT NULL COMMENT '描述'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '标题',
  `feed` varchar(500) NOT NULL COMMENT '反馈',
  `phone` varchar(500) NOT NULL COMMENT '电话',
  `uniacid` varchar(50) NOT NULL,
  `created_time` int(11) NOT NULL,
  `ggid` int(11) DEFAULT NULL COMMENT '广告id',
  `ggzid` int(11) DEFAULT NULL COMMENT '广告主id',
  `state` int(4) DEFAULT '0' COMMENT '0未读  1 已读',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_feedback','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_feedback')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_feedback','name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_feedback')." ADD   `name` varchar(50) NOT NULL COMMENT '标题'");}
if(!pdo_fieldexists('wx_jyfen_feedback','feed')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_feedback')." ADD   `feed` varchar(500) NOT NULL COMMENT '反馈'");}
if(!pdo_fieldexists('wx_jyfen_feedback','phone')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_feedback')." ADD   `phone` varchar(500) NOT NULL COMMENT '电话'");}
if(!pdo_fieldexists('wx_jyfen_feedback','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_feedback')." ADD   `uniacid` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_feedback','created_time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_feedback')." ADD   `created_time` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_feedback','ggid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_feedback')." ADD   `ggid` int(11) DEFAULT NULL COMMENT '广告id'");}
if(!pdo_fieldexists('wx_jyfen_feedback','ggzid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_feedback')." ADD   `ggzid` int(11) DEFAULT NULL COMMENT '广告主id'");}
if(!pdo_fieldexists('wx_jyfen_feedback','state')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_feedback')." ADD   `state` int(4) DEFAULT '0' COMMENT '0未读  1 已读'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_fxset` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fx_details` text NOT NULL COMMENT '分销商申请协议',
  `tx_details` text NOT NULL COMMENT '佣金提现协议',
  `is_fx` int(11) NOT NULL COMMENT '1.开启分销审核2.不开启',
  `is_ej` int(11) NOT NULL COMMENT '是否开启二级分销1.是2.否',
  `tx_rate` int(11) NOT NULL COMMENT '提现手续费',
  `commission` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '一级佣金',
  `commission2` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '二级佣金',
  `tx_money` int(11) NOT NULL COMMENT '提现门槛',
  `img` varchar(100) NOT NULL,
  `img2` varchar(100) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `is_open` int(11) NOT NULL DEFAULT '1' COMMENT '1.开启2关闭',
  `instructions` text NOT NULL COMMENT '分销商说明',
  `is_type` int(11) NOT NULL DEFAULT '2',
  `addtime` int(10) DEFAULT '0',
  `updatetime` int(10) DEFAULT '0',
  `g_commission` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '一级商品佣金',
  `g_commission2` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '二级商品佣金',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_fxset','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_fxset')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_fxset','fx_details')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_fxset')." ADD   `fx_details` text NOT NULL COMMENT '分销商申请协议'");}
if(!pdo_fieldexists('wx_jyfen_fxset','tx_details')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_fxset')." ADD   `tx_details` text NOT NULL COMMENT '佣金提现协议'");}
if(!pdo_fieldexists('wx_jyfen_fxset','is_fx')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_fxset')." ADD   `is_fx` int(11) NOT NULL COMMENT '1.开启分销审核2.不开启'");}
if(!pdo_fieldexists('wx_jyfen_fxset','is_ej')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_fxset')." ADD   `is_ej` int(11) NOT NULL COMMENT '是否开启二级分销1.是2.否'");}
if(!pdo_fieldexists('wx_jyfen_fxset','tx_rate')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_fxset')." ADD   `tx_rate` int(11) NOT NULL COMMENT '提现手续费'");}
if(!pdo_fieldexists('wx_jyfen_fxset','commission')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_fxset')." ADD   `commission` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '一级佣金'");}
if(!pdo_fieldexists('wx_jyfen_fxset','commission2')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_fxset')." ADD   `commission2` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '二级佣金'");}
if(!pdo_fieldexists('wx_jyfen_fxset','tx_money')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_fxset')." ADD   `tx_money` int(11) NOT NULL COMMENT '提现门槛'");}
if(!pdo_fieldexists('wx_jyfen_fxset','img')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_fxset')." ADD   `img` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_fxset','img2')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_fxset')." ADD   `img2` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_fxset','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_fxset')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_fxset','is_open')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_fxset')." ADD   `is_open` int(11) NOT NULL DEFAULT '1' COMMENT '1.开启2关闭'");}
if(!pdo_fieldexists('wx_jyfen_fxset','instructions')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_fxset')." ADD   `instructions` text NOT NULL COMMENT '分销商说明'");}
if(!pdo_fieldexists('wx_jyfen_fxset','is_type')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_fxset')." ADD   `is_type` int(11) NOT NULL DEFAULT '2'");}
if(!pdo_fieldexists('wx_jyfen_fxset','addtime')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_fxset')." ADD   `addtime` int(10) DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_fxset','updatetime')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_fxset')." ADD   `updatetime` int(10) DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_fxset','g_commission')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_fxset')." ADD   `g_commission` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '一级商品佣金'");}
if(!pdo_fieldexists('wx_jyfen_fxset','g_commission2')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_fxset')." ADD   `g_commission2` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '二级商品佣金'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_fxuser` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '一级分销',
  `fx_user` int(11) NOT NULL COMMENT '二级分销',
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_fxuser','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_fxuser')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_fxuser','user_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_fxuser')." ADD   `user_id` int(11) NOT NULL COMMENT '一级分销'");}
if(!pdo_fieldexists('wx_jyfen_fxuser','fx_user')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_fxuser')." ADD   `fx_user` int(11) NOT NULL COMMENT '二级分销'");}
if(!pdo_fieldexists('wx_jyfen_fxuser','time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_fxuser')." ADD   `time` int(11) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_gg` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL COMMENT '名称',
  `fbname` varchar(100) DEFAULT NULL COMMENT '发布人',
  `logo` varchar(300) NOT NULL COMMENT '封面图片',
  `src` varchar(300) NOT NULL COMMENT '链接地址',
  `uniacid` varchar(50) NOT NULL,
  `created_time` datetime NOT NULL COMMENT '创建时间',
  `orderby` int(4) NOT NULL COMMENT '排序',
  `status` int(4) NOT NULL DEFAULT '1' COMMENT '状态1.启用，2禁用',
  `type` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `appid` varchar(30) NOT NULL,
  `xcx_name` varchar(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `item` int(11) NOT NULL,
  `start_time` int(11) DEFAULT NULL COMMENT '开始时间',
  `end_time` int(11) DEFAULT NULL COMMENT '结束时间',
  `zclick` int(11) DEFAULT NULL COMMENT '总点击次数',
  `yclick` int(11) DEFAULT NULL COMMENT '已点击次数',
  `money` decimal(11,2) DEFAULT '0.00' COMMENT '总资产',
  `jftype` int(6) DEFAULT NULL COMMENT '计费模式  按月 按点击',
  `zstype` int(6) DEFAULT NULL COMMENT '展示模式  新闻模式  图片模式 表单模式',
  `ggimg` varchar(500) DEFAULT NULL COMMENT '广告图',
  `ggmoney` decimal(11,2) DEFAULT '0.00' COMMENT '广告费用',
  `djmoney` decimal(11,2) DEFAULT '0.00' COMMENT '每点击费用',
  `daymoney` decimal(11,2) DEFAULT '0.00' COMMENT '每日点击费用',
  `jrmoney` int(11) DEFAULT NULL COMMENT '今日点击次数',
  `news_id` int(11) DEFAULT NULL COMMENT '新闻表id',
  `uptime` int(11) DEFAULT NULL COMMENT '修改时间',
  `phone` varchar(15) DEFAULT NULL,
  `details` text,
  `djtype` int(4) DEFAULT NULL COMMENT '1电话 模式  2表单模式',
  `ggzid` int(11) DEFAULT NULL COMMENT '广告主id',
  `province` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `hangye` int(11) DEFAULT '0',
  `address` varchar(500) DEFAULT NULL,
  `coordinates` varchar(50) DEFAULT NULL,
  `fanwei` int(11) DEFAULT '0',
  `viewcount` int(11) DEFAULT '0',
  `longitude` decimal(50,15) DEFAULT '0.000000000000000',
  `latitude` decimal(50,15) DEFAULT '0.000000000000000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='广告表';

");

if(!pdo_fieldexists('wx_jyfen_gg','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_gg','name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `name` varchar(200) DEFAULT NULL COMMENT '名称'");}
if(!pdo_fieldexists('wx_jyfen_gg','fbname')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `fbname` varchar(100) DEFAULT NULL COMMENT '发布人'");}
if(!pdo_fieldexists('wx_jyfen_gg','logo')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `logo` varchar(300) NOT NULL COMMENT '封面图片'");}
if(!pdo_fieldexists('wx_jyfen_gg','src')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `src` varchar(300) NOT NULL COMMENT '链接地址'");}
if(!pdo_fieldexists('wx_jyfen_gg','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `uniacid` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_gg','created_time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `created_time` datetime NOT NULL COMMENT '创建时间'");}
if(!pdo_fieldexists('wx_jyfen_gg','orderby')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `orderby` int(4) NOT NULL COMMENT '排序'");}
if(!pdo_fieldexists('wx_jyfen_gg','status')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `status` int(4) NOT NULL DEFAULT '1' COMMENT '状态1.启用，2禁用'");}
if(!pdo_fieldexists('wx_jyfen_gg','type')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `type` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_gg','store_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `store_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_gg','appid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `appid` varchar(30) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_gg','xcx_name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `xcx_name` varchar(30) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_gg','title')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `title` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_gg','item')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `item` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_gg','start_time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `start_time` int(11) DEFAULT NULL COMMENT '开始时间'");}
if(!pdo_fieldexists('wx_jyfen_gg','end_time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `end_time` int(11) DEFAULT NULL COMMENT '结束时间'");}
if(!pdo_fieldexists('wx_jyfen_gg','zclick')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `zclick` int(11) DEFAULT NULL COMMENT '总点击次数'");}
if(!pdo_fieldexists('wx_jyfen_gg','yclick')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `yclick` int(11) DEFAULT NULL COMMENT '已点击次数'");}
if(!pdo_fieldexists('wx_jyfen_gg','money')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `money` decimal(11,2) DEFAULT '0.00' COMMENT '总资产'");}
if(!pdo_fieldexists('wx_jyfen_gg','jftype')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `jftype` int(6) DEFAULT NULL COMMENT '计费模式  按月 按点击'");}
if(!pdo_fieldexists('wx_jyfen_gg','zstype')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `zstype` int(6) DEFAULT NULL COMMENT '展示模式  新闻模式  图片模式 表单模式'");}
if(!pdo_fieldexists('wx_jyfen_gg','ggimg')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `ggimg` varchar(500) DEFAULT NULL COMMENT '广告图'");}
if(!pdo_fieldexists('wx_jyfen_gg','ggmoney')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `ggmoney` decimal(11,2) DEFAULT '0.00' COMMENT '广告费用'");}
if(!pdo_fieldexists('wx_jyfen_gg','djmoney')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `djmoney` decimal(11,2) DEFAULT '0.00' COMMENT '每点击费用'");}
if(!pdo_fieldexists('wx_jyfen_gg','daymoney')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `daymoney` decimal(11,2) DEFAULT '0.00' COMMENT '每日点击费用'");}
if(!pdo_fieldexists('wx_jyfen_gg','jrmoney')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `jrmoney` int(11) DEFAULT NULL COMMENT '今日点击次数'");}
if(!pdo_fieldexists('wx_jyfen_gg','news_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `news_id` int(11) DEFAULT NULL COMMENT '新闻表id'");}
if(!pdo_fieldexists('wx_jyfen_gg','uptime')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `uptime` int(11) DEFAULT NULL COMMENT '修改时间'");}
if(!pdo_fieldexists('wx_jyfen_gg','phone')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `phone` varchar(15) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_gg','details')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `details` text");}
if(!pdo_fieldexists('wx_jyfen_gg','djtype')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `djtype` int(4) DEFAULT NULL COMMENT '1电话 模式  2表单模式'");}
if(!pdo_fieldexists('wx_jyfen_gg','ggzid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `ggzid` int(11) DEFAULT NULL COMMENT '广告主id'");}
if(!pdo_fieldexists('wx_jyfen_gg','province')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `province` varchar(50) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_gg','city')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `city` varchar(50) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_gg','district')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `district` varchar(50) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_gg','hangye')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `hangye` int(11) DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_gg','address')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `address` varchar(500) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_gg','coordinates')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `coordinates` varchar(50) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_gg','fanwei')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `fanwei` int(11) DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_gg','viewcount')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `viewcount` int(11) DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_gg','longitude')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `longitude` decimal(50,15) DEFAULT '0.000000000000000'");}
if(!pdo_fieldexists('wx_jyfen_gg','latitude')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gg')." ADD   `latitude` decimal(50,15) DEFAULT '0.000000000000000'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_ggusers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_tel` varchar(20) NOT NULL,
  `state` int(11) NOT NULL COMMENT '1.审核中2.通过3.拒绝',
  `uniacid` int(11) NOT NULL,
  `addr` varchar(250) DEFAULT NULL COMMENT '地址',
  `form_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_ggusers','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_ggusers')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_ggusers','user_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_ggusers')." ADD   `user_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_ggusers','time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_ggusers')." ADD   `time` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_ggusers','user_name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_ggusers')." ADD   `user_name` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_ggusers','user_tel')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_ggusers')." ADD   `user_tel` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_ggusers','state')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_ggusers')." ADD   `state` int(11) NOT NULL COMMENT '1.审核中2.通过3.拒绝'");}
if(!pdo_fieldexists('wx_jyfen_ggusers','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_ggusers')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_ggusers','addr')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_ggusers')." ADD   `addr` varchar(250) DEFAULT NULL COMMENT '地址'");}
if(!pdo_fieldexists('wx_jyfen_ggusers','form_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_ggusers')." ADD   `form_id` varchar(255) DEFAULT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_gzqbmx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `wxappid` int(11) DEFAULT '0' COMMENT '公众号ID',
  `userid` int(11) DEFAULT '0',
  `money` decimal(11,2) DEFAULT '0.00',
  `time` int(10) DEFAULT '0' COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_gzqbmx','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzqbmx')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_gzqbmx','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzqbmx')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_gzqbmx','wxappid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzqbmx')." ADD   `wxappid` int(11) DEFAULT '0' COMMENT '公众号ID'");}
if(!pdo_fieldexists('wx_jyfen_gzqbmx','userid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzqbmx')." ADD   `userid` int(11) DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_gzqbmx','money')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzqbmx')." ADD   `money` decimal(11,2) DEFAULT '0.00'");}
if(!pdo_fieldexists('wx_jyfen_gzqbmx','time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzqbmx')." ADD   `time` int(10) DEFAULT '0' COMMENT '时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_gzset` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `status` int(2) DEFAULT '2' COMMENT '1.开启2关闭',
  `gh1` int(11) DEFAULT '0' COMMENT '第一次的时间间隔',
  `gh2` int(11) DEFAULT '0' COMMENT '第二次的时间间隔',
  `gh3` int(11) DEFAULT '0' COMMENT '第三次的时间间隔',
  `gc1` text COMMENT '第一次的推送内容',
  `gc2` text COMMENT '第二次的推送内容',
  `gc3` text COMMENT '第三次的推送内容',
  `gh4` int(11) DEFAULT '0' COMMENT '第四次的时间间隔',
  `gh5` int(11) DEFAULT '0' COMMENT '第五次的时间间隔',
  `gh6` int(11) DEFAULT '0' COMMENT '第六次的时间间隔',
  `gc4` text COMMENT '第四次的推送内容',
  `gc5` text COMMENT '第五次的推送内容',
  `gc6` text COMMENT '第六次的推送内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_gzset','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzset')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_gzset','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzset')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_gzset','status')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzset')." ADD   `status` int(2) DEFAULT '2' COMMENT '1.开启2关闭'");}
if(!pdo_fieldexists('wx_jyfen_gzset','gh1')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzset')." ADD   `gh1` int(11) DEFAULT '0' COMMENT '第一次的时间间隔'");}
if(!pdo_fieldexists('wx_jyfen_gzset','gh2')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzset')." ADD   `gh2` int(11) DEFAULT '0' COMMENT '第二次的时间间隔'");}
if(!pdo_fieldexists('wx_jyfen_gzset','gh3')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzset')." ADD   `gh3` int(11) DEFAULT '0' COMMENT '第三次的时间间隔'");}
if(!pdo_fieldexists('wx_jyfen_gzset','gc1')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzset')." ADD   `gc1` text COMMENT '第一次的推送内容'");}
if(!pdo_fieldexists('wx_jyfen_gzset','gc2')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzset')." ADD   `gc2` text COMMENT '第二次的推送内容'");}
if(!pdo_fieldexists('wx_jyfen_gzset','gc3')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzset')." ADD   `gc3` text COMMENT '第三次的推送内容'");}
if(!pdo_fieldexists('wx_jyfen_gzset','gh4')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzset')." ADD   `gh4` int(11) DEFAULT '0' COMMENT '第四次的时间间隔'");}
if(!pdo_fieldexists('wx_jyfen_gzset','gh5')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzset')." ADD   `gh5` int(11) DEFAULT '0' COMMENT '第五次的时间间隔'");}
if(!pdo_fieldexists('wx_jyfen_gzset','gh6')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzset')." ADD   `gh6` int(11) DEFAULT '0' COMMENT '第六次的时间间隔'");}
if(!pdo_fieldexists('wx_jyfen_gzset','gc4')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzset')." ADD   `gc4` text COMMENT '第四次的推送内容'");}
if(!pdo_fieldexists('wx_jyfen_gzset','gc5')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzset')." ADD   `gc5` text COMMENT '第五次的推送内容'");}
if(!pdo_fieldexists('wx_jyfen_gzset','gc6')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzset')." ADD   `gc6` text COMMENT '第六次的推送内容'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_gzuser` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `dateline` int(10) DEFAULT '0' COMMENT '创建时间',
  `ts_index` int(4) DEFAULT '0' COMMENT '第几次推送了',
  `ts_lasttime` int(10) DEFAULT '0' COMMENT '最后一次推送时间',
  `ts_starttime` int(10) DEFAULT '0' COMMENT '有效期起始时间',
  `wxapp_openid` varchar(255) DEFAULT NULL COMMENT '微信公众号的Openid',
  `wxappid` int(11) DEFAULT NULL COMMENT '微信公众号的id',
  `gz_time` int(10) DEFAULT '0' COMMENT '关注公众号的时间',
  `gz_views` int(11) DEFAULT '0' COMMENT '扫码公众号的数量',
  `wifi_userid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=223 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_gzuser','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzuser')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_gzuser','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzuser')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_gzuser','dateline')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzuser')." ADD   `dateline` int(10) DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('wx_jyfen_gzuser','ts_index')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzuser')." ADD   `ts_index` int(4) DEFAULT '0' COMMENT '第几次推送了'");}
if(!pdo_fieldexists('wx_jyfen_gzuser','ts_lasttime')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzuser')." ADD   `ts_lasttime` int(10) DEFAULT '0' COMMENT '最后一次推送时间'");}
if(!pdo_fieldexists('wx_jyfen_gzuser','ts_starttime')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzuser')." ADD   `ts_starttime` int(10) DEFAULT '0' COMMENT '有效期起始时间'");}
if(!pdo_fieldexists('wx_jyfen_gzuser','wxapp_openid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzuser')." ADD   `wxapp_openid` varchar(255) DEFAULT NULL COMMENT '微信公众号的Openid'");}
if(!pdo_fieldexists('wx_jyfen_gzuser','wxappid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzuser')." ADD   `wxappid` int(11) DEFAULT NULL COMMENT '微信公众号的id'");}
if(!pdo_fieldexists('wx_jyfen_gzuser','gz_time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzuser')." ADD   `gz_time` int(10) DEFAULT '0' COMMENT '关注公众号的时间'");}
if(!pdo_fieldexists('wx_jyfen_gzuser','gz_views')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzuser')." ADD   `gz_views` int(11) DEFAULT '0' COMMENT '扫码公众号的数量'");}
if(!pdo_fieldexists('wx_jyfen_gzuser','wifi_userid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzuser')." ADD   `wifi_userid` int(11) DEFAULT '0'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_gzuser_views` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `dateline` int(10) DEFAULT '0' COMMENT '创建时间',
  `wifiid` int(11) DEFAULT '0' COMMENT 'wifiid',
  `wxappid` int(11) DEFAULT '0' COMMENT '公众号id',
  `userid` int(11) DEFAULT '0' COMMENT '用户ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_gzuser_views','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzuser_views')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_gzuser_views','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzuser_views')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_gzuser_views','dateline')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzuser_views')." ADD   `dateline` int(10) DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('wx_jyfen_gzuser_views','wifiid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzuser_views')." ADD   `wifiid` int(11) DEFAULT '0' COMMENT 'wifiid'");}
if(!pdo_fieldexists('wx_jyfen_gzuser_views','wxappid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzuser_views')." ADD   `wxappid` int(11) DEFAULT '0' COMMENT '公众号id'");}
if(!pdo_fieldexists('wx_jyfen_gzuser_views','userid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzuser_views')." ADD   `userid` int(11) DEFAULT '0' COMMENT '用户ID'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_gzwxapp` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `status` int(2) DEFAULT NULL COMMENT '状态，1开启，2关闭',
  `dateline` int(10) DEFAULT '0' COMMENT '创建时间',
  `img` varchar(255) DEFAULT NULL COMMENT '生成的二维码图片',
  `appid` varchar(255) DEFAULT NULL COMMENT '公众号appid',
  `appsecret` varchar(255) DEFAULT NULL COMMENT '公众号appsecret',
  `appgh` varchar(255) DEFAULT NULL COMMENT '原始ID',
  `appname` varchar(255) DEFAULT NULL COMMENT '公众号名称',
  `access_token` varchar(255) DEFAULT NULL COMMENT 'access_token',
  `token_expire` int(10) DEFAULT NULL COMMENT 'token过期时间',
  `menu` text COMMENT '自定义菜单数据',
  `update_time` int(10) DEFAULT NULL COMMENT '修改时间',
  `click_event` text,
  `is_gg` int(4) DEFAULT '2' COMMENT '是否开启广告，1开启，2不开启，默认不开启',
  `audit_remark` varchar(500) DEFAULT NULL COMMENT '审核失败原因',
  `gh1` int(11) DEFAULT '0' COMMENT '第一次的时间间隔',
  `gh2` int(11) DEFAULT '0' COMMENT '第二次的时间间隔',
  `gh3` int(11) DEFAULT '0' COMMENT '第三次的时间间隔',
  `gh4` int(11) DEFAULT '0' COMMENT '第四次的时间间隔',
  `gh5` int(11) DEFAULT '0' COMMENT '第五次的时间间隔',
  `gh6` int(11) DEFAULT '0' COMMENT '第六次的时间间隔',
  `gc1` text COMMENT '第一次的推送内容',
  `gc2` text COMMENT '第二次的推送内容',
  `gc3` text COMMENT '第三次的推送内容',
  `gc4` text COMMENT '第四次的推送内容',
  `gc5` text COMMENT '第五次的推送内容',
  `gc6` text COMMENT '第六次的推送内容',
  `gz_users` int(11) DEFAULT '0' COMMENT '关注公众号的用户数量',
  `gz_views` int(11) DEFAULT '0' COMMENT '扫码公众号的数量',
  `create_uid` int(11) DEFAULT '0' COMMENT '创建公众号的用户ID',
  `gz_prints` int(11) DEFAULT '0' COMMENT '批量预打印的数量',
  `gz_wifis` int(11) DEFAULT '0' COMMENT '绑定wifi的数量或者贴码的数量',
  `gz_fenyong_type` int(4) DEFAULT '1' COMMENT '分佣模式，1关注公众号',
  `gz_gg_zichan` decimal(14,2) DEFAULT '0.00' COMMENT '投入的广告资产',
  `gz_gg_danjia` decimal(14,2) DEFAULT '0.00' COMMENT '每笔产生的费用',
  `gz_gg_xiaohao` decimal(14,2) DEFAULT '0.00' COMMENT '消耗资金',
  `realname` varchar(255) DEFAULT NULL COMMENT '联系人姓名',
  `utel` varchar(255) DEFAULT NULL COMMENT '联系电话',
  `is_yz` int(4) DEFAULT '0' COMMENT '是否接入，0未接入，1已接入',
  `wx_token` varchar(500) DEFAULT NULL COMMENT '微信公众号的Token',
  `wx_encodingaeskey` varchar(500) DEFAULT NULL COMMENT '微信公众号的EncodingAESKey',
  `sf_status` int(4) DEFAULT '2' COMMENT '第三方是否开启',
  `sf_url` varchar(255) DEFAULT NULL COMMENT '第三方网址',
  `sf_token` varchar(255) DEFAULT NULL COMMENT '第三方的Token',
  `sf_name` varchar(255) DEFAULT NULL COMMENT '第三方的名称',
  `sf_uptime` int(10) DEFAULT '0' COMMENT '修改第三方时间',
  `gz_type` int(4) DEFAULT '1' COMMENT '公众号类型，1服务号，2订阅号',
  `gz_art_url` varchar(255) DEFAULT NULL COMMENT '公众号的文章链接',
  `gz_biz` varchar(255) DEFAULT NULL COMMENT '公众号的唯一标识biz',
  `gz_huoma` int(4) DEFAULT '2' COMMENT '是否开启活码，1开启，2关闭',
  `gz_huoma_num` int(11) DEFAULT '0' COMMENT '每天活码出现的次数，每日清零',
  `gz_huoma_uptime` int(10) DEFAULT '0' COMMENT '修改活码次数的时间',
  `is_yhj` int(3) DEFAULT '1' COMMENT '1公众号优惠券 2商家优惠券',
  `is_red` int(4) DEFAULT '2' COMMENT '是否开启红包，1开启，2关闭',
  `gonggao` varchar(500) DEFAULT NULL COMMENT '公告',
  `logo` varchar(255) DEFAULT NULL COMMENT '公众号logo',
  `goods_pic` varchar(500) DEFAULT NULL COMMENT '封面图',
  `miaoshu` varchar(500) DEFAULT NULL COMMENT '描述',
  `address` varchar(500) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `ewm` varchar(500) DEFAULT NULL,
  `is_type` int(3) DEFAULT '0',
  `src` varchar(200) DEFAULT NULL,
  `xcxappid` varchar(100) DEFAULT NULL,
  `is_types` int(3) DEFAULT '0',
  `srcs` varchar(200) DEFAULT NULL,
  `xcxappids` varchar(100) DEFAULT NULL,
  `srcs2` varchar(200) DEFAULT NULL,
  `stgg_img` varchar(500) DEFAULT NULL COMMENT '广告封面图',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_gzwxapp','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','status')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `status` int(2) DEFAULT NULL COMMENT '状态，1开启，2关闭'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','dateline')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `dateline` int(10) DEFAULT '0' COMMENT '创建时间'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','img')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `img` varchar(255) DEFAULT NULL COMMENT '生成的二维码图片'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','appid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `appid` varchar(255) DEFAULT NULL COMMENT '公众号appid'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','appsecret')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `appsecret` varchar(255) DEFAULT NULL COMMENT '公众号appsecret'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','appgh')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `appgh` varchar(255) DEFAULT NULL COMMENT '原始ID'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','appname')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `appname` varchar(255) DEFAULT NULL COMMENT '公众号名称'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','access_token')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `access_token` varchar(255) DEFAULT NULL COMMENT 'access_token'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','token_expire')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `token_expire` int(10) DEFAULT NULL COMMENT 'token过期时间'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','menu')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `menu` text COMMENT '自定义菜单数据'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','update_time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `update_time` int(10) DEFAULT NULL COMMENT '修改时间'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','click_event')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `click_event` text");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','is_gg')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `is_gg` int(4) DEFAULT '2' COMMENT '是否开启广告，1开启，2不开启，默认不开启'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','audit_remark')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `audit_remark` varchar(500) DEFAULT NULL COMMENT '审核失败原因'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gh1')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gh1` int(11) DEFAULT '0' COMMENT '第一次的时间间隔'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gh2')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gh2` int(11) DEFAULT '0' COMMENT '第二次的时间间隔'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gh3')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gh3` int(11) DEFAULT '0' COMMENT '第三次的时间间隔'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gh4')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gh4` int(11) DEFAULT '0' COMMENT '第四次的时间间隔'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gh5')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gh5` int(11) DEFAULT '0' COMMENT '第五次的时间间隔'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gh6')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gh6` int(11) DEFAULT '0' COMMENT '第六次的时间间隔'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gc1')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gc1` text COMMENT '第一次的推送内容'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gc2')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gc2` text COMMENT '第二次的推送内容'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gc3')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gc3` text COMMENT '第三次的推送内容'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gc4')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gc4` text COMMENT '第四次的推送内容'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gc5')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gc5` text COMMENT '第五次的推送内容'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gc6')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gc6` text COMMENT '第六次的推送内容'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gz_users')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gz_users` int(11) DEFAULT '0' COMMENT '关注公众号的用户数量'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gz_views')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gz_views` int(11) DEFAULT '0' COMMENT '扫码公众号的数量'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','create_uid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `create_uid` int(11) DEFAULT '0' COMMENT '创建公众号的用户ID'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gz_prints')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gz_prints` int(11) DEFAULT '0' COMMENT '批量预打印的数量'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gz_wifis')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gz_wifis` int(11) DEFAULT '0' COMMENT '绑定wifi的数量或者贴码的数量'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gz_fenyong_type')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gz_fenyong_type` int(4) DEFAULT '1' COMMENT '分佣模式，1关注公众号'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gz_gg_zichan')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gz_gg_zichan` decimal(14,2) DEFAULT '0.00' COMMENT '投入的广告资产'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gz_gg_danjia')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gz_gg_danjia` decimal(14,2) DEFAULT '0.00' COMMENT '每笔产生的费用'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gz_gg_xiaohao')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gz_gg_xiaohao` decimal(14,2) DEFAULT '0.00' COMMENT '消耗资金'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','realname')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `realname` varchar(255) DEFAULT NULL COMMENT '联系人姓名'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','utel')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `utel` varchar(255) DEFAULT NULL COMMENT '联系电话'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','is_yz')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `is_yz` int(4) DEFAULT '0' COMMENT '是否接入，0未接入，1已接入'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','wx_token')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `wx_token` varchar(500) DEFAULT NULL COMMENT '微信公众号的Token'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','wx_encodingaeskey')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `wx_encodingaeskey` varchar(500) DEFAULT NULL COMMENT '微信公众号的EncodingAESKey'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','sf_status')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `sf_status` int(4) DEFAULT '2' COMMENT '第三方是否开启'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','sf_url')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `sf_url` varchar(255) DEFAULT NULL COMMENT '第三方网址'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','sf_token')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `sf_token` varchar(255) DEFAULT NULL COMMENT '第三方的Token'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','sf_name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `sf_name` varchar(255) DEFAULT NULL COMMENT '第三方的名称'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','sf_uptime')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `sf_uptime` int(10) DEFAULT '0' COMMENT '修改第三方时间'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gz_type')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gz_type` int(4) DEFAULT '1' COMMENT '公众号类型，1服务号，2订阅号'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gz_art_url')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gz_art_url` varchar(255) DEFAULT NULL COMMENT '公众号的文章链接'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gz_biz')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gz_biz` varchar(255) DEFAULT NULL COMMENT '公众号的唯一标识biz'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gz_huoma')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gz_huoma` int(4) DEFAULT '2' COMMENT '是否开启活码，1开启，2关闭'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gz_huoma_num')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gz_huoma_num` int(11) DEFAULT '0' COMMENT '每天活码出现的次数，每日清零'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gz_huoma_uptime')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gz_huoma_uptime` int(10) DEFAULT '0' COMMENT '修改活码次数的时间'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','is_yhj')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `is_yhj` int(3) DEFAULT '1' COMMENT '1公众号优惠券 2商家优惠券'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','is_red')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `is_red` int(4) DEFAULT '2' COMMENT '是否开启红包，1开启，2关闭'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','gonggao')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `gonggao` varchar(500) DEFAULT NULL COMMENT '公告'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','logo')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `logo` varchar(255) DEFAULT NULL COMMENT '公众号logo'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','goods_pic')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `goods_pic` varchar(500) DEFAULT NULL COMMENT '封面图'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','miaoshu')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `miaoshu` varchar(500) DEFAULT NULL COMMENT '描述'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','address')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `address` varchar(500) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','latitude')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `latitude` varchar(255) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','longitude')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `longitude` varchar(255) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','ewm')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `ewm` varchar(500) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','is_type')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `is_type` int(3) DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','src')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `src` varchar(200) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','xcxappid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `xcxappid` varchar(100) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','is_types')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `is_types` int(3) DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','srcs')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `srcs` varchar(200) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','xcxappids')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `xcxappids` varchar(100) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','srcs2')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `srcs2` varchar(200) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_gzwxapp','stgg_img')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_gzwxapp')." ADD   `stgg_img` varchar(500) DEFAULT NULL COMMENT '广告封面图'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_hangye` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL COMMENT '标题',
  `uniacid` varchar(50) NOT NULL,
  `dateline` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_hangye','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_hangye')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_hangye','title')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_hangye')." ADD   `title` varchar(200) NOT NULL COMMENT '标题'");}
if(!pdo_fieldexists('wx_jyfen_hangye','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_hangye')." ADD   `uniacid` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_hangye','dateline')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_hangye')." ADD   `dateline` int(10) NOT NULL DEFAULT '0'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_help` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(200) NOT NULL COMMENT '标题',
  `answer` text NOT NULL COMMENT '回答',
  `sort` int(4) NOT NULL COMMENT '排序',
  `uniacid` varchar(50) NOT NULL,
  `created_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_help','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_help')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_help','question')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_help')." ADD   `question` varchar(200) NOT NULL COMMENT '标题'");}
if(!pdo_fieldexists('wx_jyfen_help','answer')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_help')." ADD   `answer` text NOT NULL COMMENT '回答'");}
if(!pdo_fieldexists('wx_jyfen_help','sort')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_help')." ADD   `sort` int(4) NOT NULL COMMENT '排序'");}
if(!pdo_fieldexists('wx_jyfen_help','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_help')." ADD   `uniacid` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_help','created_time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_help')." ADD   `created_time` datetime NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_help_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(200) NOT NULL COMMENT '标题',
  `uniacid` varchar(50) NOT NULL,
  `created_time` datetime NOT NULL,
  `cid` int(11) DEFAULT '0' COMMENT '父类别',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_help_type','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_help_type')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_help_type','question')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_help_type')." ADD   `question` varchar(200) NOT NULL COMMENT '标题'");}
if(!pdo_fieldexists('wx_jyfen_help_type','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_help_type')." ADD   `uniacid` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_help_type','created_time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_help_type')." ADD   `created_time` datetime NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_help_type','cid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_help_type')." ADD   `cid` int(11) DEFAULT '0' COMMENT '父类别'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_hexiao` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `time` int(11) NOT NULL COMMENT '时间',
  `uniacid` int(11) NOT NULL,
  `type` int(3) DEFAULT '1' COMMENT '1公众号核销人员 2商家核销人员',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_hexiao','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_hexiao')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_hexiao','user_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_hexiao')." ADD   `user_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_hexiao','store_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_hexiao')." ADD   `store_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_hexiao','time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_hexiao')." ADD   `time` int(11) NOT NULL COMMENT '时间'");}
if(!pdo_fieldexists('wx_jyfen_hexiao','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_hexiao')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_hexiao','type')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_hexiao')." ADD   `type` int(3) DEFAULT '1' COMMENT '1公众号核销人员 2商家核销人员'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL COMMENT '灰色图标',
  `orderby` int(11) DEFAULT '99',
  `url` varchar(255) DEFAULT NULL COMMENT '网页跳转',
  `type` int(11) DEFAULT NULL COMMENT '1.站内跳转2.网页3.小程序',
  `uniacid` int(11) NOT NULL,
  `appid` varchar(50) DEFAULT NULL,
  `state` int(4) DEFAULT '0' COMMENT '0否 1是',
  `url1` varchar(255) DEFAULT NULL COMMENT '站内跳转',
  `vice_name` varchar(30) DEFAULT NULL COMMENT '副标题',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_menu','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_menu')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_menu','name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_menu')." ADD   `name` varchar(30) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_menu','img')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_menu')." ADD   `img` varchar(255) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_menu','img2')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_menu')." ADD   `img2` varchar(255) DEFAULT NULL COMMENT '灰色图标'");}
if(!pdo_fieldexists('wx_jyfen_menu','orderby')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_menu')." ADD   `orderby` int(11) DEFAULT '99'");}
if(!pdo_fieldexists('wx_jyfen_menu','url')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_menu')." ADD   `url` varchar(255) DEFAULT NULL COMMENT '网页跳转'");}
if(!pdo_fieldexists('wx_jyfen_menu','type')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_menu')." ADD   `type` int(11) DEFAULT NULL COMMENT '1.站内跳转2.网页3.小程序'");}
if(!pdo_fieldexists('wx_jyfen_menu','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_menu')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_menu','appid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_menu')." ADD   `appid` varchar(50) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_menu','state')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_menu')." ADD   `state` int(4) DEFAULT '0' COMMENT '0否 1是'");}
if(!pdo_fieldexists('wx_jyfen_menu','url1')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_menu')." ADD   `url1` varchar(255) DEFAULT NULL COMMENT '站内跳转'");}
if(!pdo_fieldexists('wx_jyfen_menu','vice_name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_menu')." ADD   `vice_name` varchar(30) DEFAULT NULL COMMENT '副标题'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_pinguservoucher` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `vouchers_id` int(11) NOT NULL COMMENT '代金券id',
  `state` int(11) NOT NULL COMMENT '1使用  2未使用',
  `uniacid` varchar(50) NOT NULL,
  `type` int(3) DEFAULT '1' COMMENT '1公众号 2商家',
  `hxname` varchar(100) DEFAULT NULL COMMENT '核销人名称',
  `hxid` int(11) DEFAULT '0' COMMENT '核销人id',
  `hxtime` int(11) DEFAULT '0' COMMENT '核销时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_pinguservoucher','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_pinguservoucher')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_pinguservoucher','user_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_pinguservoucher')." ADD   `user_id` int(11) NOT NULL COMMENT '用户id'");}
if(!pdo_fieldexists('wx_jyfen_pinguservoucher','vouchers_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_pinguservoucher')." ADD   `vouchers_id` int(11) NOT NULL COMMENT '代金券id'");}
if(!pdo_fieldexists('wx_jyfen_pinguservoucher','state')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_pinguservoucher')." ADD   `state` int(11) NOT NULL COMMENT '1使用  2未使用'");}
if(!pdo_fieldexists('wx_jyfen_pinguservoucher','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_pinguservoucher')." ADD   `uniacid` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_pinguservoucher','type')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_pinguservoucher')." ADD   `type` int(3) DEFAULT '1' COMMENT '1公众号 2商家'");}
if(!pdo_fieldexists('wx_jyfen_pinguservoucher','hxname')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_pinguservoucher')." ADD   `hxname` varchar(100) DEFAULT NULL COMMENT '核销人名称'");}
if(!pdo_fieldexists('wx_jyfen_pinguservoucher','hxid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_pinguservoucher')." ADD   `hxid` int(11) DEFAULT '0' COMMENT '核销人id'");}
if(!pdo_fieldexists('wx_jyfen_pinguservoucher','hxtime')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_pinguservoucher')." ADD   `hxtime` int(11) DEFAULT '0' COMMENT '核销时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_pingvoucher` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '名称',
  `start_time` varchar(20) NOT NULL COMMENT '开始时间',
  `end_time` varchar(20) NOT NULL COMMENT '结束时间',
  `preferential` varchar(10) NOT NULL COMMENT '优惠',
  `uniacid` varchar(50) NOT NULL,
  `voucher_type` int(4) NOT NULL COMMENT '使用类型1:外卖，2店内,3都可使用',
  `instruction` varchar(300) NOT NULL COMMENT '使用说明',
  `store_id` int(11) NOT NULL COMMENT '商家id',
  `conditions` int(10) DEFAULT '0' COMMENT '满多少钱可使用',
  `wxapp_id` int(11) DEFAULT NULL,
  `type` int(3) DEFAULT '1' COMMENT '1公众号 2商家',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_pingvoucher','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_pingvoucher')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_pingvoucher','name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_pingvoucher')." ADD   `name` varchar(20) NOT NULL COMMENT '名称'");}
if(!pdo_fieldexists('wx_jyfen_pingvoucher','start_time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_pingvoucher')." ADD   `start_time` varchar(20) NOT NULL COMMENT '开始时间'");}
if(!pdo_fieldexists('wx_jyfen_pingvoucher','end_time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_pingvoucher')." ADD   `end_time` varchar(20) NOT NULL COMMENT '结束时间'");}
if(!pdo_fieldexists('wx_jyfen_pingvoucher','preferential')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_pingvoucher')." ADD   `preferential` varchar(10) NOT NULL COMMENT '优惠'");}
if(!pdo_fieldexists('wx_jyfen_pingvoucher','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_pingvoucher')." ADD   `uniacid` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_pingvoucher','voucher_type')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_pingvoucher')." ADD   `voucher_type` int(4) NOT NULL COMMENT '使用类型1:外卖，2店内,3都可使用'");}
if(!pdo_fieldexists('wx_jyfen_pingvoucher','instruction')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_pingvoucher')." ADD   `instruction` varchar(300) NOT NULL COMMENT '使用说明'");}
if(!pdo_fieldexists('wx_jyfen_pingvoucher','store_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_pingvoucher')." ADD   `store_id` int(11) NOT NULL COMMENT '商家id'");}
if(!pdo_fieldexists('wx_jyfen_pingvoucher','conditions')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_pingvoucher')." ADD   `conditions` int(10) DEFAULT '0' COMMENT '满多少钱可使用'");}
if(!pdo_fieldexists('wx_jyfen_pingvoucher','wxapp_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_pingvoucher')." ADD   `wxapp_id` int(11) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_pingvoucher','type')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_pingvoucher')." ADD   `type` int(3) DEFAULT '1' COMMENT '1公众号 2商家'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_plugin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL COMMENT '插件标识符',
  `addtime` int(10) DEFAULT NULL COMMENT '添加时间',
  `is_tong` int(4) DEFAULT '2' COMMENT '1已开通，2未开通',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_plugin','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_plugin')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_plugin','title')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_plugin')." ADD   `title` varchar(200) NOT NULL COMMENT '插件标识符'");}
if(!pdo_fieldexists('wx_jyfen_plugin','addtime')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_plugin')." ADD   `addtime` int(10) DEFAULT NULL COMMENT '添加时间'");}
if(!pdo_fieldexists('wx_jyfen_plugin','is_tong')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_plugin')." ADD   `is_tong` int(4) DEFAULT '2' COMMENT '1已开通，2未开通'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_plugin_redlog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `redmoney` decimal(10,2) DEFAULT NULL COMMENT '红包金额',
  `redtype` int(2) NOT NULL COMMENT '红包类型，1关注红包',
  `userid` int(11) NOT NULL COMMENT '用户ID',
  `status` int(4) DEFAULT '1' COMMENT '是否领取了，1领取了，2未领取',
  `remark` varchar(500) DEFAULT NULL COMMENT '描述',
  `addtime` int(10) NOT NULL COMMENT '领取时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_plugin_redlog','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_plugin_redlog')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_plugin_redlog','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_plugin_redlog')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_plugin_redlog','redmoney')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_plugin_redlog')." ADD   `redmoney` decimal(10,2) DEFAULT NULL COMMENT '红包金额'");}
if(!pdo_fieldexists('wx_jyfen_plugin_redlog','redtype')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_plugin_redlog')." ADD   `redtype` int(2) NOT NULL COMMENT '红包类型，1关注红包'");}
if(!pdo_fieldexists('wx_jyfen_plugin_redlog','userid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_plugin_redlog')." ADD   `userid` int(11) NOT NULL COMMENT '用户ID'");}
if(!pdo_fieldexists('wx_jyfen_plugin_redlog','status')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_plugin_redlog')." ADD   `status` int(4) DEFAULT '1' COMMENT '是否领取了，1领取了，2未领取'");}
if(!pdo_fieldexists('wx_jyfen_plugin_redlog','remark')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_plugin_redlog')." ADD   `remark` varchar(500) DEFAULT NULL COMMENT '描述'");}
if(!pdo_fieldexists('wx_jyfen_plugin_redlog','addtime')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_plugin_redlog')." ADD   `addtime` int(10) NOT NULL COMMENT '领取时间'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_plugin_redset` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `gz_status` int(2) DEFAULT '1' COMMENT '1.开启2关闭',
  `gz_redimg1` varchar(255) DEFAULT NULL COMMENT '红包图片',
  `gz_redimg2` varchar(255) DEFAULT NULL COMMENT '红包图片',
  `gz_maxmoney` decimal(10,2) DEFAULT '0.00' COMMENT '红包最大比例',
  `gz_rule` text COMMENT '规则',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_plugin_redset','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_plugin_redset')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_plugin_redset','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_plugin_redset')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_plugin_redset','gz_status')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_plugin_redset')." ADD   `gz_status` int(2) DEFAULT '1' COMMENT '1.开启2关闭'");}
if(!pdo_fieldexists('wx_jyfen_plugin_redset','gz_redimg1')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_plugin_redset')." ADD   `gz_redimg1` varchar(255) DEFAULT NULL COMMENT '红包图片'");}
if(!pdo_fieldexists('wx_jyfen_plugin_redset','gz_redimg2')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_plugin_redset')." ADD   `gz_redimg2` varchar(255) DEFAULT NULL COMMENT '红包图片'");}
if(!pdo_fieldexists('wx_jyfen_plugin_redset','gz_maxmoney')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_plugin_redset')." ADD   `gz_maxmoney` decimal(10,2) DEFAULT '0.00' COMMENT '红包最大比例'");}
if(!pdo_fieldexists('wx_jyfen_plugin_redset','gz_rule')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_plugin_redset')." ADD   `gz_rule` text COMMENT '规则'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_qbmx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `money` decimal(10,2) DEFAULT '0.00',
  `type` int(11) NOT NULL COMMENT '1.加2减',
  `note` varchar(20) NOT NULL COMMENT '备注',
  `time` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `state` int(11) DEFAULT '8' COMMENT '1、代理广告收益2、WIFI提供者广告收益3、WIFI提供者新用户关注收益4、区长商品佣金收入5、代理商品佣金收入6、用户提现7、商品退货8、其它',
  `desc` varchar(500) DEFAULT '' COMMENT '描述',
  `uniacid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_qbmx','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_qbmx')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_qbmx','money')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_qbmx')." ADD   `money` decimal(10,2) DEFAULT '0.00'");}
if(!pdo_fieldexists('wx_jyfen_qbmx','type')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_qbmx')." ADD   `type` int(11) NOT NULL COMMENT '1.加2减'");}
if(!pdo_fieldexists('wx_jyfen_qbmx','note')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_qbmx')." ADD   `note` varchar(20) NOT NULL COMMENT '备注'");}
if(!pdo_fieldexists('wx_jyfen_qbmx','time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_qbmx')." ADD   `time` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_qbmx','user_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_qbmx')." ADD   `user_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_qbmx','state')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_qbmx')." ADD   `state` int(11) DEFAULT '8' COMMENT '1、代理广告收益2、WIFI提供者广告收益3、WIFI提供者新用户关注收益4、区长商品佣金收入5、代理商品佣金收入6、用户提现7、商品退货8、其它'");}
if(!pdo_fieldexists('wx_jyfen_qbmx','desc')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_qbmx')." ADD   `desc` varchar(500) DEFAULT '' COMMENT '描述'");}
if(!pdo_fieldexists('wx_jyfen_qbmx','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_qbmx')." ADD   `uniacid` int(11) DEFAULT '0'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_qrcode_print` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL COMMENT '标题',
  `path` varchar(200) NOT NULL COMMENT '压缩包路径',
  `num` int(11) NOT NULL DEFAULT '0' COMMENT '数量',
  `yangshi` int(11) NOT NULL DEFAULT '0' COMMENT '样式表ID',
  `uniacid` varchar(50) NOT NULL,
  `dateline` int(10) DEFAULT '0',
  `fxid` int(11) DEFAULT '0',
  `ptype` int(2) DEFAULT '1' COMMENT '打印方式，1代表海报，2代表二维码',
  `wxappid` int(11) DEFAULT '0' COMMENT '微信公众号ID',
  `is_zdwifi` int(2) DEFAULT '1' COMMENT '是否指定WIFI，1代表是，2代表否',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_qrcode_print','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_qrcode_print')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_qrcode_print','name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_qrcode_print')." ADD   `name` varchar(200) NOT NULL COMMENT '标题'");}
if(!pdo_fieldexists('wx_jyfen_qrcode_print','path')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_qrcode_print')." ADD   `path` varchar(200) NOT NULL COMMENT '压缩包路径'");}
if(!pdo_fieldexists('wx_jyfen_qrcode_print','num')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_qrcode_print')." ADD   `num` int(11) NOT NULL DEFAULT '0' COMMENT '数量'");}
if(!pdo_fieldexists('wx_jyfen_qrcode_print','yangshi')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_qrcode_print')." ADD   `yangshi` int(11) NOT NULL DEFAULT '0' COMMENT '样式表ID'");}
if(!pdo_fieldexists('wx_jyfen_qrcode_print','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_qrcode_print')." ADD   `uniacid` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_qrcode_print','dateline')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_qrcode_print')." ADD   `dateline` int(10) DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_qrcode_print','fxid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_qrcode_print')." ADD   `fxid` int(11) DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_qrcode_print','ptype')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_qrcode_print')." ADD   `ptype` int(2) DEFAULT '1' COMMENT '打印方式，1代表海报，2代表二维码'");}
if(!pdo_fieldexists('wx_jyfen_qrcode_print','wxappid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_qrcode_print')." ADD   `wxappid` int(11) DEFAULT '0' COMMENT '微信公众号ID'");}
if(!pdo_fieldexists('wx_jyfen_qrcode_print','is_zdwifi')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_qrcode_print')." ADD   `is_zdwifi` int(2) DEFAULT '1' COMMENT '是否指定WIFI，1代表是，2代表否'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_sms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tid` varchar(100) NOT NULL COMMENT '提现模板ID',
  `uniacid` varchar(50) NOT NULL,
  `yy_tid` varchar(50) NOT NULL COMMENT '代理商审核模板ID',
  `dm_tid` varchar(50) NOT NULL COMMENT 'WIFI入驻成功模板ID',
  `pt_cg` varchar(50) DEFAULT '' COMMENT '拼团成功模板',
  `pt_sb` varchar(50) DEFAULT '' COMMENT '拼团失败模板',
  `order_zf` varchar(50) DEFAULT '' COMMENT '订单支付成功模板',
  `order_state` varchar(50) DEFAULT '' COMMENT '订单状态变动模板',
  `djj_tid` varchar(50) DEFAULT '' COMMENT '领取代金券通知',
  `dlb_tid` varchar(50) DEFAULT '' COMMENT '大礼包通知',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_sms','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_sms')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_sms','tid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_sms')." ADD   `tid` varchar(100) NOT NULL COMMENT '提现模板ID'");}
if(!pdo_fieldexists('wx_jyfen_sms','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_sms')." ADD   `uniacid` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_sms','yy_tid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_sms')." ADD   `yy_tid` varchar(50) NOT NULL COMMENT '代理商审核模板ID'");}
if(!pdo_fieldexists('wx_jyfen_sms','dm_tid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_sms')." ADD   `dm_tid` varchar(50) NOT NULL COMMENT 'WIFI入驻成功模板ID'");}
if(!pdo_fieldexists('wx_jyfen_sms','pt_cg')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_sms')." ADD   `pt_cg` varchar(50) DEFAULT '' COMMENT '拼团成功模板'");}
if(!pdo_fieldexists('wx_jyfen_sms','pt_sb')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_sms')." ADD   `pt_sb` varchar(50) DEFAULT '' COMMENT '拼团失败模板'");}
if(!pdo_fieldexists('wx_jyfen_sms','order_zf')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_sms')." ADD   `order_zf` varchar(50) DEFAULT '' COMMENT '订单支付成功模板'");}
if(!pdo_fieldexists('wx_jyfen_sms','order_state')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_sms')." ADD   `order_state` varchar(50) DEFAULT '' COMMENT '订单状态变动模板'");}
if(!pdo_fieldexists('wx_jyfen_sms','djj_tid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_sms')." ADD   `djj_tid` varchar(50) DEFAULT '' COMMENT '领取代金券通知'");}
if(!pdo_fieldexists('wx_jyfen_sms','dlb_tid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_sms')." ADD   `dlb_tid` varchar(50) DEFAULT '' COMMENT '大礼包通知'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_storetype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `state` int(4) DEFAULT '0',
  `logo` varchar(255) DEFAULT NULL,
  `orderby` int(11) DEFAULT '99',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_storetype','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_storetype')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_storetype','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_storetype')." ADD   `uniacid` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_storetype','name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_storetype')." ADD   `name` varchar(255) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_storetype','state')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_storetype')." ADD   `state` int(4) DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_storetype','logo')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_storetype')." ADD   `logo` varchar(255) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_storetype','orderby')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_storetype')." ADD   `orderby` int(11) DEFAULT '99'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_system` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `appid` varchar(100) NOT NULL COMMENT 'appid',
  `appsecret` varchar(200) NOT NULL COMMENT 'appsecret',
  `link` varchar(200) NOT NULL COMMENT '网址',
  `mchid` varchar(20) NOT NULL COMMENT '商户号',
  `wxkey` varchar(100) NOT NULL COMMENT '商户秘钥',
  `uniacid` varchar(50) NOT NULL,
  `url_name` varchar(20) NOT NULL COMMENT '网址名称',
  `details` text NOT NULL COMMENT '关于我们',
  `url_logo` varchar(100) NOT NULL COMMENT '网址logo',
  `bq_name` varchar(50) NOT NULL COMMENT '版权名称',
  `link_name` varchar(30) NOT NULL COMMENT '网站名称',
  `link_logo` varchar(100) NOT NULL COMMENT '网站logo',
  `more` int(11) NOT NULL DEFAULT '1',
  `default_store` int(11) NOT NULL COMMENT '默认门店id',
  `support` varchar(20) NOT NULL COMMENT '技术支持',
  `bq_logo` varchar(100) NOT NULL,
  `color` varchar(20) NOT NULL,
  `map_key` varchar(100) NOT NULL COMMENT '腾讯地图key',
  `tz_appid` varchar(30) NOT NULL,
  `tz_name` varchar(30) NOT NULL,
  `pt_name` varchar(30) NOT NULL COMMENT '平台名称',
  `dada_key` varchar(50) NOT NULL,
  `dada_secret` varchar(50) NOT NULL,
  `apiclient_cert` text NOT NULL,
  `apiclient_key` text NOT NULL,
  `day` int(11) NOT NULL COMMENT '天数',
  `username` varchar(20) NOT NULL COMMENT '邮箱用户名',
  `password` varchar(50) NOT NULL COMMENT '邮箱密码',
  `type` varchar(10) NOT NULL COMMENT '邮箱类型',
  `sender` varchar(50) NOT NULL COMMENT '发件人名称',
  `signature` varchar(200) NOT NULL COMMENT '邮件签名',
  `is_email` int(11) NOT NULL COMMENT '1开启  2关闭',
  `tx_money` decimal(10,2) NOT NULL COMMENT '最低提现金额',
  `tx_rate` int(11) NOT NULL COMMENT '手续费',
  `tx_details` text NOT NULL COMMENT '提现详情',
  `tel` varchar(20) NOT NULL COMMENT '平台电话',
  `dc_name` varchar(20) NOT NULL,
  `wm_name` varchar(20) NOT NULL,
  `yd_name` varchar(20) NOT NULL,
  `typeset` int(11) NOT NULL COMMENT '1开启  2.关闭(分类)',
  `integral` int(11) NOT NULL COMMENT '评论得积分',
  `cjwt` text NOT NULL,
  `rzxy` text NOT NULL,
  `is_ruzhu` int(11) NOT NULL COMMENT '1.开启2关闭',
  `is_yue` int(11) NOT NULL DEFAULT '1',
  `integral2` int(11) NOT NULL COMMENT '消费得积分',
  `is_jf` int(11) NOT NULL DEFAULT '1' COMMENT '1开启2关闭',
  `is_jfpay` int(11) NOT NULL DEFAULT '1',
  `jf_proportion` int(11) NOT NULL DEFAULT '1',
  `is_zfb` int(11) NOT NULL DEFAULT '1',
  `is_yhk` int(11) NOT NULL DEFAULT '1',
  `is_wx` int(11) NOT NULL DEFAULT '1',
  `ip` varchar(30) NOT NULL,
  `jfgn` int(11) NOT NULL DEFAULT '1',
  `fxgn` int(11) NOT NULL DEFAULT '1',
  `msgn` int(11) NOT NULL DEFAULT '1',
  `is_img` int(11) NOT NULL DEFAULT '2',
  `is_psxx` int(11) NOT NULL DEFAULT '2',
  `kfw_appid` varchar(30) NOT NULL,
  `kfw_appsecret` varchar(50) NOT NULL,
  `usertx_money` decimal(10,2) DEFAULT NULL,
  `usertx_rate` int(11) DEFAULT NULL,
  `usertx_details` text,
  `wfms` varchar(500) DEFAULT NULL COMMENT 'wifi描述',
  `is_ggruzhu` int(11) DEFAULT NULL COMMENT '广告入驻  1 开启 2关闭',
  `is_zhanshi` int(11) DEFAULT '1' COMMENT '1 开启广告展示  2 关闭',
  `ggrzxy` text COMMENT '入驻须知',
  `ggcjwt` text COMMENT '平台优势',
  `ggsy` decimal(10,2) DEFAULT '0.00' COMMENT '广告收益',
  `gzsy` decimal(10,2) DEFAULT '0.00' COMMENT '关注公众号收益',
  `ggtx` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '最低提现金额',
  `txservice` decimal(10,2) DEFAULT '0.00' COMMENT '提现手续费',
  `txagreement` text COMMENT '提现协议',
  `is_txggsy` int(4) DEFAULT '2' COMMENT '1 开启 2关闭  首页',
  `is_txggl` int(4) DEFAULT '2' COMMENT '1开启 2关闭  流',
  `txgg_id` varchar(255) DEFAULT NULL,
  `is_newregion` int(4) DEFAULT '1' COMMENT '1开启 2关闭',
  `is_video` int(4) DEFAULT '2' COMMENT '1开启新闻展示  2关闭',
  `addtime` int(10) DEFAULT '0',
  `wifihomeimg` varchar(255) DEFAULT NULL COMMENT 'WIFI封面图',
  `updatetime` int(10) DEFAULT '0',
  `is_hongbao` int(4) DEFAULT '2' COMMENT '1开启红包底部广告 2关闭',
  `is_ptgg` int(4) DEFAULT '2' COMMENT '1开启拼团列表页轮播图2关闭',
  `onetx` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '首次最低提现金额',
  `is_wifi` int(4) DEFAULT '1' COMMENT '1开启wwifi入驻  2关闭',
  `print_type` int(2) DEFAULT '1' COMMENT '二维码打印方式，1微信小程序打印 2微信公众号打印',
  `default_wxapp` int(11) DEFAULT '0' COMMENT '默认微信公众号',
  `wxapp_sys` text COMMENT '添加公众号教程',
  `wxapp_shuoming` text COMMENT '公众号入驻说明',
  `is_send` int(10) DEFAULT '0',
  `store_shuoming` text COMMENT '门店入驻说明',
  `is_huosong` int(11) DEFAULT '1' COMMENT '1 开启活码推送连WIFI  2 关闭',
  `is_banner` int(4) DEFAULT '1' COMMENT '1 开启 2关闭 Banner广告',
  `is_tanping` int(4) DEFAULT '1' COMMENT '首页弹屏广告',
  `tanping_id` varchar(100) DEFAULT NULL COMMENT '流量主弹屏广告id',
  `is_storesh` int(4) DEFAULT '1' COMMENT '1开启门店审核',
  `is_zhuanwifi` int(4) DEFAULT '2' COMMENT '1开启 2关闭',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_system','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_system','appid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `appid` varchar(100) NOT NULL COMMENT 'appid'");}
if(!pdo_fieldexists('wx_jyfen_system','appsecret')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `appsecret` varchar(200) NOT NULL COMMENT 'appsecret'");}
if(!pdo_fieldexists('wx_jyfen_system','link')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `link` varchar(200) NOT NULL COMMENT '网址'");}
if(!pdo_fieldexists('wx_jyfen_system','mchid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `mchid` varchar(20) NOT NULL COMMENT '商户号'");}
if(!pdo_fieldexists('wx_jyfen_system','wxkey')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `wxkey` varchar(100) NOT NULL COMMENT '商户秘钥'");}
if(!pdo_fieldexists('wx_jyfen_system','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `uniacid` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_system','url_name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `url_name` varchar(20) NOT NULL COMMENT '网址名称'");}
if(!pdo_fieldexists('wx_jyfen_system','details')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `details` text NOT NULL COMMENT '关于我们'");}
if(!pdo_fieldexists('wx_jyfen_system','url_logo')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `url_logo` varchar(100) NOT NULL COMMENT '网址logo'");}
if(!pdo_fieldexists('wx_jyfen_system','bq_name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `bq_name` varchar(50) NOT NULL COMMENT '版权名称'");}
if(!pdo_fieldexists('wx_jyfen_system','link_name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `link_name` varchar(30) NOT NULL COMMENT '网站名称'");}
if(!pdo_fieldexists('wx_jyfen_system','link_logo')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `link_logo` varchar(100) NOT NULL COMMENT '网站logo'");}
if(!pdo_fieldexists('wx_jyfen_system','more')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `more` int(11) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_jyfen_system','default_store')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `default_store` int(11) NOT NULL COMMENT '默认门店id'");}
if(!pdo_fieldexists('wx_jyfen_system','support')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `support` varchar(20) NOT NULL COMMENT '技术支持'");}
if(!pdo_fieldexists('wx_jyfen_system','bq_logo')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `bq_logo` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_system','color')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `color` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_system','map_key')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `map_key` varchar(100) NOT NULL COMMENT '腾讯地图key'");}
if(!pdo_fieldexists('wx_jyfen_system','tz_appid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `tz_appid` varchar(30) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_system','tz_name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `tz_name` varchar(30) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_system','pt_name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `pt_name` varchar(30) NOT NULL COMMENT '平台名称'");}
if(!pdo_fieldexists('wx_jyfen_system','dada_key')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `dada_key` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_system','dada_secret')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `dada_secret` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_system','apiclient_cert')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `apiclient_cert` text NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_system','apiclient_key')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `apiclient_key` text NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_system','day')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `day` int(11) NOT NULL COMMENT '天数'");}
if(!pdo_fieldexists('wx_jyfen_system','username')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `username` varchar(20) NOT NULL COMMENT '邮箱用户名'");}
if(!pdo_fieldexists('wx_jyfen_system','password')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `password` varchar(50) NOT NULL COMMENT '邮箱密码'");}
if(!pdo_fieldexists('wx_jyfen_system','type')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `type` varchar(10) NOT NULL COMMENT '邮箱类型'");}
if(!pdo_fieldexists('wx_jyfen_system','sender')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `sender` varchar(50) NOT NULL COMMENT '发件人名称'");}
if(!pdo_fieldexists('wx_jyfen_system','signature')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `signature` varchar(200) NOT NULL COMMENT '邮件签名'");}
if(!pdo_fieldexists('wx_jyfen_system','is_email')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_email` int(11) NOT NULL COMMENT '1开启  2关闭'");}
if(!pdo_fieldexists('wx_jyfen_system','tx_money')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `tx_money` decimal(10,2) NOT NULL COMMENT '最低提现金额'");}
if(!pdo_fieldexists('wx_jyfen_system','tx_rate')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `tx_rate` int(11) NOT NULL COMMENT '手续费'");}
if(!pdo_fieldexists('wx_jyfen_system','tx_details')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `tx_details` text NOT NULL COMMENT '提现详情'");}
if(!pdo_fieldexists('wx_jyfen_system','tel')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `tel` varchar(20) NOT NULL COMMENT '平台电话'");}
if(!pdo_fieldexists('wx_jyfen_system','dc_name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `dc_name` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_system','wm_name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `wm_name` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_system','yd_name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `yd_name` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_system','typeset')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `typeset` int(11) NOT NULL COMMENT '1开启  2.关闭(分类)'");}
if(!pdo_fieldexists('wx_jyfen_system','integral')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `integral` int(11) NOT NULL COMMENT '评论得积分'");}
if(!pdo_fieldexists('wx_jyfen_system','cjwt')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `cjwt` text NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_system','rzxy')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `rzxy` text NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_system','is_ruzhu')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_ruzhu` int(11) NOT NULL COMMENT '1.开启2关闭'");}
if(!pdo_fieldexists('wx_jyfen_system','is_yue')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_yue` int(11) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_jyfen_system','integral2')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `integral2` int(11) NOT NULL COMMENT '消费得积分'");}
if(!pdo_fieldexists('wx_jyfen_system','is_jf')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_jf` int(11) NOT NULL DEFAULT '1' COMMENT '1开启2关闭'");}
if(!pdo_fieldexists('wx_jyfen_system','is_jfpay')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_jfpay` int(11) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_jyfen_system','jf_proportion')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `jf_proportion` int(11) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_jyfen_system','is_zfb')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_zfb` int(11) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_jyfen_system','is_yhk')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_yhk` int(11) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_jyfen_system','is_wx')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_wx` int(11) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_jyfen_system','ip')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `ip` varchar(30) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_system','jfgn')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `jfgn` int(11) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_jyfen_system','fxgn')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `fxgn` int(11) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_jyfen_system','msgn')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `msgn` int(11) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wx_jyfen_system','is_img')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_img` int(11) NOT NULL DEFAULT '2'");}
if(!pdo_fieldexists('wx_jyfen_system','is_psxx')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_psxx` int(11) NOT NULL DEFAULT '2'");}
if(!pdo_fieldexists('wx_jyfen_system','kfw_appid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `kfw_appid` varchar(30) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_system','kfw_appsecret')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `kfw_appsecret` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_system','usertx_money')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `usertx_money` decimal(10,2) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_system','usertx_rate')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `usertx_rate` int(11) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_system','usertx_details')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `usertx_details` text");}
if(!pdo_fieldexists('wx_jyfen_system','wfms')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `wfms` varchar(500) DEFAULT NULL COMMENT 'wifi描述'");}
if(!pdo_fieldexists('wx_jyfen_system','is_ggruzhu')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_ggruzhu` int(11) DEFAULT NULL COMMENT '广告入驻  1 开启 2关闭'");}
if(!pdo_fieldexists('wx_jyfen_system','is_zhanshi')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_zhanshi` int(11) DEFAULT '1' COMMENT '1 开启广告展示  2 关闭'");}
if(!pdo_fieldexists('wx_jyfen_system','ggrzxy')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `ggrzxy` text COMMENT '入驻须知'");}
if(!pdo_fieldexists('wx_jyfen_system','ggcjwt')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `ggcjwt` text COMMENT '平台优势'");}
if(!pdo_fieldexists('wx_jyfen_system','ggsy')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `ggsy` decimal(10,2) DEFAULT '0.00' COMMENT '广告收益'");}
if(!pdo_fieldexists('wx_jyfen_system','gzsy')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `gzsy` decimal(10,2) DEFAULT '0.00' COMMENT '关注公众号收益'");}
if(!pdo_fieldexists('wx_jyfen_system','ggtx')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `ggtx` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '最低提现金额'");}
if(!pdo_fieldexists('wx_jyfen_system','txservice')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `txservice` decimal(10,2) DEFAULT '0.00' COMMENT '提现手续费'");}
if(!pdo_fieldexists('wx_jyfen_system','txagreement')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `txagreement` text COMMENT '提现协议'");}
if(!pdo_fieldexists('wx_jyfen_system','is_txggsy')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_txggsy` int(4) DEFAULT '2' COMMENT '1 开启 2关闭  首页'");}
if(!pdo_fieldexists('wx_jyfen_system','is_txggl')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_txggl` int(4) DEFAULT '2' COMMENT '1开启 2关闭  流'");}
if(!pdo_fieldexists('wx_jyfen_system','txgg_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `txgg_id` varchar(255) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_system','is_newregion')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_newregion` int(4) DEFAULT '1' COMMENT '1开启 2关闭'");}
if(!pdo_fieldexists('wx_jyfen_system','is_video')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_video` int(4) DEFAULT '2' COMMENT '1开启新闻展示  2关闭'");}
if(!pdo_fieldexists('wx_jyfen_system','addtime')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `addtime` int(10) DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_system','wifihomeimg')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `wifihomeimg` varchar(255) DEFAULT NULL COMMENT 'WIFI封面图'");}
if(!pdo_fieldexists('wx_jyfen_system','updatetime')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `updatetime` int(10) DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_system','is_hongbao')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_hongbao` int(4) DEFAULT '2' COMMENT '1开启红包底部广告 2关闭'");}
if(!pdo_fieldexists('wx_jyfen_system','is_ptgg')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_ptgg` int(4) DEFAULT '2' COMMENT '1开启拼团列表页轮播图2关闭'");}
if(!pdo_fieldexists('wx_jyfen_system','onetx')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `onetx` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '首次最低提现金额'");}
if(!pdo_fieldexists('wx_jyfen_system','is_wifi')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_wifi` int(4) DEFAULT '1' COMMENT '1开启wwifi入驻  2关闭'");}
if(!pdo_fieldexists('wx_jyfen_system','print_type')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `print_type` int(2) DEFAULT '1' COMMENT '二维码打印方式，1微信小程序打印 2微信公众号打印'");}
if(!pdo_fieldexists('wx_jyfen_system','default_wxapp')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `default_wxapp` int(11) DEFAULT '0' COMMENT '默认微信公众号'");}
if(!pdo_fieldexists('wx_jyfen_system','wxapp_sys')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `wxapp_sys` text COMMENT '添加公众号教程'");}
if(!pdo_fieldexists('wx_jyfen_system','wxapp_shuoming')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `wxapp_shuoming` text COMMENT '公众号入驻说明'");}
if(!pdo_fieldexists('wx_jyfen_system','is_send')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_send` int(10) DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_system','store_shuoming')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `store_shuoming` text COMMENT '门店入驻说明'");}
if(!pdo_fieldexists('wx_jyfen_system','is_huosong')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_huosong` int(11) DEFAULT '1' COMMENT '1 开启活码推送连WIFI  2 关闭'");}
if(!pdo_fieldexists('wx_jyfen_system','is_banner')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_banner` int(4) DEFAULT '1' COMMENT '1 开启 2关闭 Banner广告'");}
if(!pdo_fieldexists('wx_jyfen_system','is_tanping')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_tanping` int(4) DEFAULT '1' COMMENT '首页弹屏广告'");}
if(!pdo_fieldexists('wx_jyfen_system','tanping_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `tanping_id` varchar(100) DEFAULT NULL COMMENT '流量主弹屏广告id'");}
if(!pdo_fieldexists('wx_jyfen_system','is_storesh')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_storesh` int(4) DEFAULT '1' COMMENT '1开启门店审核'");}
if(!pdo_fieldexists('wx_jyfen_system','is_zhuanwifi')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_system')." ADD   `is_zhuanwifi` int(4) DEFAULT '2' COMMENT '1开启 2关闭'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_tx` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1.支付宝2.微信3银联',
  `state` int(11) NOT NULL COMMENT '1.审核中2.通过3.拒绝',
  `time` int(11) NOT NULL COMMENT '申请时间',
  `sh_time` int(11) NOT NULL COMMENT '审核时间',
  `uniacid` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `account` varchar(100) NOT NULL,
  `tx_cost` decimal(10,2) NOT NULL COMMENT '提现金额',
  `sj_cost` decimal(10,2) NOT NULL COMMENT '实际到账金额',
  `form_id` varchar(255) DEFAULT NULL,
  `user_tel` varchar(20) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_tx','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_tx')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_tx','user_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_tx')." ADD   `user_id` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_tx','type')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_tx')." ADD   `type` int(11) NOT NULL COMMENT '1.支付宝2.微信3银联'");}
if(!pdo_fieldexists('wx_jyfen_tx','state')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_tx')." ADD   `state` int(11) NOT NULL COMMENT '1.审核中2.通过3.拒绝'");}
if(!pdo_fieldexists('wx_jyfen_tx','time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_tx')." ADD   `time` int(11) NOT NULL COMMENT '申请时间'");}
if(!pdo_fieldexists('wx_jyfen_tx','sh_time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_tx')." ADD   `sh_time` int(11) NOT NULL COMMENT '审核时间'");}
if(!pdo_fieldexists('wx_jyfen_tx','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_tx')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_tx','user_name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_tx')." ADD   `user_name` varchar(20) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_tx','account')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_tx')." ADD   `account` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_tx','tx_cost')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_tx')." ADD   `tx_cost` decimal(10,2) NOT NULL COMMENT '提现金额'");}
if(!pdo_fieldexists('wx_jyfen_tx','sj_cost')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_tx')." ADD   `sj_cost` decimal(10,2) NOT NULL COMMENT '实际到账金额'");}
if(!pdo_fieldexists('wx_jyfen_tx','form_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_tx')." ADD   `form_id` varchar(255) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_tx','user_tel')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_tx')." ADD   `user_tel` varchar(20) DEFAULT ''");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `join_time` int(11) NOT NULL,
  `img` varchar(500) NOT NULL,
  `openid` varchar(200) NOT NULL,
  `uniacid` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL COMMENT '收货人姓名',
  `user_tel` varchar(50) NOT NULL COMMENT '收货人电话',
  `user_address` varchar(100) NOT NULL COMMENT '收货人地址',
  `total_score` int(11) NOT NULL DEFAULT '0',
  `wallet` decimal(13,2) DEFAULT '0.00',
  `commission` decimal(13,2) NOT NULL DEFAULT '0.00',
  `day` int(11) NOT NULL DEFAULT '0',
  `order_money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `order_number` int(11) NOT NULL DEFAULT '0',
  `dailiyongji` decimal(10,2) DEFAULT '0.00' COMMENT '区长佣金',
  `jifen` int(11) DEFAULT '0' COMMENT '积分',
  `vip` int(11) DEFAULT '0' COMMENT '会员等级',
  `kljifen` int(11) DEFAULT '0' COMMENT '可领积分',
  `daydingnum` int(11) DEFAULT '0' COMMENT '今天定时红包领取次数',
  `uptime` int(11) DEFAULT '0' COMMENT '修改时间',
  `isfirst` int(11) DEFAULT '0' COMMENT '是否第一次领取定时红包',
  `isfrist_tx` int(4) DEFAULT '1' COMMENT '1首次提现 2不是',
  `qzyongji` decimal(10,2) DEFAULT '0.00' COMMENT '区长佣金',
  `sjyongjin` decimal(10,2) DEFAULT '0.00' COMMENT '商家佣金',
  `wifiyongji` decimal(10,2) DEFAULT '0.00' COMMENT '商家wifi佣金',
  `isfirst_tx` int(4) DEFAULT '1' COMMENT '1首次提现 2不是',
  `ts_index` int(4) DEFAULT '0' COMMENT '第几次推送了',
  `ts_lasttime` int(10) DEFAULT '0' COMMENT '最后一次推送时间',
  `ts_starttime` int(10) DEFAULT '0' COMMENT '有效期起始时间',
  `wxapp_openid` varchar(255) DEFAULT NULL COMMENT '微信公众号的Openid',
  `wxappid` int(11) DEFAULT NULL COMMENT '微信公众号的id',
  `gz_time` int(10) DEFAULT '0' COMMENT '关注公众号的时间',
  `gz_views` int(11) DEFAULT '0' COMMENT '扫码公众号的数量',
  `mb_type` varchar(100) DEFAULT NULL COMMENT '手机类型',
  `wifi_status` int(2) DEFAULT '0' COMMENT '是否连接wifi成功，0未连接成功，1连接成功',
  `is_wifi` int(11) DEFAULT '0',
  `store_name` varchar(255) DEFAULT NULL COMMENT '商家名称',
  `longitude` varchar(255) DEFAULT NULL COMMENT '经度',
  `latitude` varchar(255) DEFAULT NULL COMMENT '纬度',
  `address` varchar(500) DEFAULT NULL,
  `store_logo` varchar(255) DEFAULT NULL,
  `miaoshu` varchar(500) DEFAULT NULL COMMENT '描述',
  `store_tel` varchar(20) DEFAULT NULL,
  `typeid` int(11) DEFAULT '0' COMMENT '门店类型id',
  `gonggao` varchar(500) DEFAULT NULL COMMENT '公告',
  `goods_pic` varchar(500) DEFAULT NULL COMMENT '封面图',
  `ewm` varchar(500) DEFAULT NULL COMMENT '二维码',
  `is_type` int(3) DEFAULT '0',
  `src` varchar(200) DEFAULT NULL COMMENT '跳转地址',
  `xcxappid` varchar(100) DEFAULT NULL COMMENT '小程序appid',
  `is_types` int(3) DEFAULT '0',
  `srcs` varchar(200) DEFAULT NULL COMMENT '跳转地址',
  `xcxappids` varchar(100) DEFAULT NULL COMMENT '小程序appid',
  `srcs2` varchar(200) DEFAULT NULL COMMENT '跳转地址',
  `stgg_img` varchar(500) DEFAULT NULL COMMENT '广告封面图',
  `status` int(4) DEFAULT '0',
  `user_code` varchar(100) DEFAULT NULL COMMENT '用户唯一标识',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_user','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_user','name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `name` varchar(100) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_user','join_time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `join_time` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_user','img')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `img` varchar(500) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_user','openid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `openid` varchar(200) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_user','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `uniacid` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_user','user_name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `user_name` varchar(50) NOT NULL COMMENT '收货人姓名'");}
if(!pdo_fieldexists('wx_jyfen_user','user_tel')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `user_tel` varchar(50) NOT NULL COMMENT '收货人电话'");}
if(!pdo_fieldexists('wx_jyfen_user','user_address')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `user_address` varchar(100) NOT NULL COMMENT '收货人地址'");}
if(!pdo_fieldexists('wx_jyfen_user','total_score')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `total_score` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_user','wallet')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `wallet` decimal(13,2) DEFAULT '0.00'");}
if(!pdo_fieldexists('wx_jyfen_user','commission')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `commission` decimal(13,2) NOT NULL DEFAULT '0.00'");}
if(!pdo_fieldexists('wx_jyfen_user','day')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `day` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_user','order_money')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `order_money` decimal(10,2) NOT NULL DEFAULT '0.00'");}
if(!pdo_fieldexists('wx_jyfen_user','order_number')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `order_number` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_user','dailiyongji')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `dailiyongji` decimal(10,2) DEFAULT '0.00' COMMENT '区长佣金'");}
if(!pdo_fieldexists('wx_jyfen_user','jifen')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `jifen` int(11) DEFAULT '0' COMMENT '积分'");}
if(!pdo_fieldexists('wx_jyfen_user','vip')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `vip` int(11) DEFAULT '0' COMMENT '会员等级'");}
if(!pdo_fieldexists('wx_jyfen_user','kljifen')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `kljifen` int(11) DEFAULT '0' COMMENT '可领积分'");}
if(!pdo_fieldexists('wx_jyfen_user','daydingnum')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `daydingnum` int(11) DEFAULT '0' COMMENT '今天定时红包领取次数'");}
if(!pdo_fieldexists('wx_jyfen_user','uptime')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `uptime` int(11) DEFAULT '0' COMMENT '修改时间'");}
if(!pdo_fieldexists('wx_jyfen_user','isfirst')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `isfirst` int(11) DEFAULT '0' COMMENT '是否第一次领取定时红包'");}
if(!pdo_fieldexists('wx_jyfen_user','isfrist_tx')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `isfrist_tx` int(4) DEFAULT '1' COMMENT '1首次提现 2不是'");}
if(!pdo_fieldexists('wx_jyfen_user','qzyongji')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `qzyongji` decimal(10,2) DEFAULT '0.00' COMMENT '区长佣金'");}
if(!pdo_fieldexists('wx_jyfen_user','sjyongjin')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `sjyongjin` decimal(10,2) DEFAULT '0.00' COMMENT '商家佣金'");}
if(!pdo_fieldexists('wx_jyfen_user','wifiyongji')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `wifiyongji` decimal(10,2) DEFAULT '0.00' COMMENT '商家wifi佣金'");}
if(!pdo_fieldexists('wx_jyfen_user','isfirst_tx')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `isfirst_tx` int(4) DEFAULT '1' COMMENT '1首次提现 2不是'");}
if(!pdo_fieldexists('wx_jyfen_user','ts_index')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `ts_index` int(4) DEFAULT '0' COMMENT '第几次推送了'");}
if(!pdo_fieldexists('wx_jyfen_user','ts_lasttime')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `ts_lasttime` int(10) DEFAULT '0' COMMENT '最后一次推送时间'");}
if(!pdo_fieldexists('wx_jyfen_user','ts_starttime')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `ts_starttime` int(10) DEFAULT '0' COMMENT '有效期起始时间'");}
if(!pdo_fieldexists('wx_jyfen_user','wxapp_openid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `wxapp_openid` varchar(255) DEFAULT NULL COMMENT '微信公众号的Openid'");}
if(!pdo_fieldexists('wx_jyfen_user','wxappid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `wxappid` int(11) DEFAULT NULL COMMENT '微信公众号的id'");}
if(!pdo_fieldexists('wx_jyfen_user','gz_time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `gz_time` int(10) DEFAULT '0' COMMENT '关注公众号的时间'");}
if(!pdo_fieldexists('wx_jyfen_user','gz_views')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `gz_views` int(11) DEFAULT '0' COMMENT '扫码公众号的数量'");}
if(!pdo_fieldexists('wx_jyfen_user','mb_type')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `mb_type` varchar(100) DEFAULT NULL COMMENT '手机类型'");}
if(!pdo_fieldexists('wx_jyfen_user','wifi_status')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `wifi_status` int(2) DEFAULT '0' COMMENT '是否连接wifi成功，0未连接成功，1连接成功'");}
if(!pdo_fieldexists('wx_jyfen_user','is_wifi')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `is_wifi` int(11) DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_user','store_name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `store_name` varchar(255) DEFAULT NULL COMMENT '商家名称'");}
if(!pdo_fieldexists('wx_jyfen_user','longitude')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `longitude` varchar(255) DEFAULT NULL COMMENT '经度'");}
if(!pdo_fieldexists('wx_jyfen_user','latitude')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `latitude` varchar(255) DEFAULT NULL COMMENT '纬度'");}
if(!pdo_fieldexists('wx_jyfen_user','address')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `address` varchar(500) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_user','store_logo')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `store_logo` varchar(255) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_user','miaoshu')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `miaoshu` varchar(500) DEFAULT NULL COMMENT '描述'");}
if(!pdo_fieldexists('wx_jyfen_user','store_tel')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `store_tel` varchar(20) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_user','typeid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `typeid` int(11) DEFAULT '0' COMMENT '门店类型id'");}
if(!pdo_fieldexists('wx_jyfen_user','gonggao')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `gonggao` varchar(500) DEFAULT NULL COMMENT '公告'");}
if(!pdo_fieldexists('wx_jyfen_user','goods_pic')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `goods_pic` varchar(500) DEFAULT NULL COMMENT '封面图'");}
if(!pdo_fieldexists('wx_jyfen_user','ewm')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `ewm` varchar(500) DEFAULT NULL COMMENT '二维码'");}
if(!pdo_fieldexists('wx_jyfen_user','is_type')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `is_type` int(3) DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_user','src')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `src` varchar(200) DEFAULT NULL COMMENT '跳转地址'");}
if(!pdo_fieldexists('wx_jyfen_user','xcxappid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `xcxappid` varchar(100) DEFAULT NULL COMMENT '小程序appid'");}
if(!pdo_fieldexists('wx_jyfen_user','is_types')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `is_types` int(3) DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_user','srcs')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `srcs` varchar(200) DEFAULT NULL COMMENT '跳转地址'");}
if(!pdo_fieldexists('wx_jyfen_user','xcxappids')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `xcxappids` varchar(100) DEFAULT NULL COMMENT '小程序appid'");}
if(!pdo_fieldexists('wx_jyfen_user','srcs2')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `srcs2` varchar(200) DEFAULT NULL COMMENT '跳转地址'");}
if(!pdo_fieldexists('wx_jyfen_user','stgg_img')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `stgg_img` varchar(500) DEFAULT NULL COMMENT '广告封面图'");}
if(!pdo_fieldexists('wx_jyfen_user','status')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `status` int(4) DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_user','user_code')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_user')." ADD   `user_code` varchar(100) DEFAULT NULL COMMENT '用户唯一标识'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_version` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `version` varchar(20) DEFAULT '' COMMENT '版本号',
  `time` int(10) DEFAULT NULL,
  `status` int(4) DEFAULT '0' COMMENT '0关闭 1开启',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_version','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_version')." ADD 
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_version','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_version')." ADD   `uniacid` int(11) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_version','version')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_version')." ADD   `version` varchar(20) DEFAULT '' COMMENT '版本号'");}
if(!pdo_fieldexists('wx_jyfen_version','time')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_version')." ADD   `time` int(10) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_version','status')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_version')." ADD   `status` int(4) DEFAULT '0' COMMENT '0关闭 1开启'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_wifi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `zhanghao` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `status` int(4) DEFAULT '1' COMMENT '0 禁用 1启用',
  `uniacid` varchar(50) DEFAULT NULL,
  `longitude` decimal(50,15) DEFAULT NULL,
  `latitude` decimal(50,15) DEFAULT NULL,
  `miaoshu` text,
  `addr` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT '0' COMMENT '连接次数',
  `ysid` int(11) DEFAULT NULL COMMENT '样式id',
  `bssid` varchar(20) DEFAULT NULL COMMENT '设备号',
  `qrid` int(11) DEFAULT '0',
  `updatetime` int(10) DEFAULT '0' COMMENT '修改时间',
  `addtime` int(10) DEFAULT NULL,
  `gzqrid` int(11) DEFAULT '0',
  `wxappid` int(11) DEFAULT '0',
  `dlid` int(11) DEFAULT '0',
  `is_zdwifi` int(2) DEFAULT '1' COMMENT '是否指定WIFI，1代表是，2代表否',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_wifi','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifi')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_wifi','store_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifi')." ADD   `store_id` int(11) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_wifi','name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifi')." ADD   `name` varchar(255) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_wifi','zhanghao')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifi')." ADD   `zhanghao` varchar(255) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_wifi','pass')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifi')." ADD   `pass` varchar(255) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_wifi','status')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifi')." ADD   `status` int(4) DEFAULT '1' COMMENT '0 禁用 1启用'");}
if(!pdo_fieldexists('wx_jyfen_wifi','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifi')." ADD   `uniacid` varchar(50) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_wifi','longitude')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifi')." ADD   `longitude` decimal(50,15) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_wifi','latitude')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifi')." ADD   `latitude` decimal(50,15) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_wifi','miaoshu')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifi')." ADD   `miaoshu` text");}
if(!pdo_fieldexists('wx_jyfen_wifi','addr')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifi')." ADD   `addr` varchar(500) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_wifi','user_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifi')." ADD   `user_id` int(11) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_wifi','num')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifi')." ADD   `num` int(11) DEFAULT '0' COMMENT '连接次数'");}
if(!pdo_fieldexists('wx_jyfen_wifi','ysid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifi')." ADD   `ysid` int(11) DEFAULT NULL COMMENT '样式id'");}
if(!pdo_fieldexists('wx_jyfen_wifi','bssid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifi')." ADD   `bssid` varchar(20) DEFAULT NULL COMMENT '设备号'");}
if(!pdo_fieldexists('wx_jyfen_wifi','qrid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifi')." ADD   `qrid` int(11) DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_wifi','updatetime')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifi')." ADD   `updatetime` int(10) DEFAULT '0' COMMENT '修改时间'");}
if(!pdo_fieldexists('wx_jyfen_wifi','addtime')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifi')." ADD   `addtime` int(10) DEFAULT NULL");}
if(!pdo_fieldexists('wx_jyfen_wifi','gzqrid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifi')." ADD   `gzqrid` int(11) DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_wifi','wxappid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifi')." ADD   `wxappid` int(11) DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_wifi','dlid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifi')." ADD   `dlid` int(11) DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_wifi','is_zdwifi')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifi')." ADD   `is_zdwifi` int(2) DEFAULT '1' COMMENT '是否指定WIFI，1代表是，2代表否'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_wifilist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `wifi_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
  `wifi_user` int(11) NOT NULL DEFAULT '0' COMMENT 'wifi提供者user_id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_wifilist','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifilist')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_wifilist','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifilist')." ADD   `uniacid` int(11) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_wifilist','wifi_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifilist')." ADD   `wifi_id` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_wifilist','user_id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifilist')." ADD   `user_id` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_wifilist','addtime')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifilist')." ADD   `addtime` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wx_jyfen_wifilist','wifi_user')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_wifilist')." ADD   `wifi_user` int(11) NOT NULL DEFAULT '0' COMMENT 'wifi提供者user_id'");}
pdo_query("CREATE TABLE IF NOT EXISTS `wx_jyfen_yangshi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `slt` varchar(200) NOT NULL COMMENT '缩略图',
  `zst` varchar(200) NOT NULL COMMENT '展示图',
  `yuantu` varchar(200) NOT NULL COMMENT '源图',
  `uniacid` varchar(50) NOT NULL,
  `watermark` int(2) DEFAULT '1',
  `updatetime` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wx_jyfen_yangshi','id')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_yangshi')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wx_jyfen_yangshi','name')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_yangshi')." ADD   `name` varchar(200) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_yangshi','slt')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_yangshi')." ADD   `slt` varchar(200) NOT NULL COMMENT '缩略图'");}
if(!pdo_fieldexists('wx_jyfen_yangshi','zst')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_yangshi')." ADD   `zst` varchar(200) NOT NULL COMMENT '展示图'");}
if(!pdo_fieldexists('wx_jyfen_yangshi','yuantu')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_yangshi')." ADD   `yuantu` varchar(200) NOT NULL COMMENT '源图'");}
if(!pdo_fieldexists('wx_jyfen_yangshi','uniacid')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_yangshi')." ADD   `uniacid` varchar(50) NOT NULL");}
if(!pdo_fieldexists('wx_jyfen_yangshi','watermark')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_yangshi')." ADD   `watermark` int(2) DEFAULT '1'");}
if(!pdo_fieldexists('wx_jyfen_yangshi','updatetime')) {pdo_query("ALTER TABLE ".tablename('wx_jyfen_yangshi')." ADD   `updatetime` int(10) DEFAULT '0'");}
