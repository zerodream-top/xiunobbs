
<?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 return array( 'setting' => array( 'url'=>url('setting-base'), 'text'=>lang('setting'), 'icon'=>'icon-cog', 'tab'=> array ( 'base'=>array('url'=>url('setting-base'), 'text'=>lang('admin_setting_base')), 'smtp'=>array('url'=>url('setting-smtp'), 'text'=>lang('admin_setting_smtp')), ) ), 'forum' => array( 'url'=>url('forum-list'), 'text'=>lang('forum'), 'icon'=>'icon-comment', 'tab'=> array ( ) ), 'thread' => array( 'url'=>url('thread-list'), 'text'=>lang('thread'), 'icon'=>'icon-comment', 'tab'=> array ( 'list'=>array('url'=>url('thread-list'), 'text'=>lang('admin_thread_batch')), ) ), 'user' => array( 'url'=>url('user-list'), 'text'=>lang('user'), 'icon'=>'icon-user', 'tab'=> array ( 'list'=>array('url'=>url('user-list'), 'text'=>lang('admin_user_list')), 'group'=>array('url'=>url('group-list'), 'text'=>lang('admin_user_group')), 'create'=>array('url'=>url('user-create'), 'text'=>lang('admin_user_create')), ) ), 'other' => array( 'url'=>url('other'), 'text'=>lang('other'), 'icon'=>'icon-wrench', 'tab'=> array ( 'cache'=>array('url'=>url('other-cache'), 'text'=>lang('admin_other_cache')), ) ), '_plugin' => array( 'url'=>url('_plugin'), 'text'=>lang('plugin'), 'icon'=>'icon-cogs', 'tab'=> array ( 'zd_plugin_list'=>array('url'=>url('_plugin-zd_plugin_list'), 'text'=>lang('admin_plugin_zd_plugin_list')), 'zerodream_plugin_plugin'=>array('url'=>url('_plugin-zerodream_plugin_plugin'), 'text'=>lang('admin_plugin_zerodream_plugin_plugin')), 'zerodream_plugin_template'=>array('url'=>url('_plugin-zerodream_plugin_template'), 'text'=>lang('admin_plugin_zerodream_plugin_template')), 'zerodream_plugin_cloud'=>array('url'=>url('_plugin-zerodream_plugin_cloud'), 'text'=>lang('admin_plugin_zerodream_plugin_cloud')), ) ) ); ?>