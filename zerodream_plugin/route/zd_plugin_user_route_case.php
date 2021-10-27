
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Access Denied.'); $action = param(1); include _include(APP_PATH.'plugin/zerodream_plugin/model/zd_plugin_user.func.php'); switch($action) { case 'admin': include _include(APP_PATH.'plugin/zerodream_plugin/route/zd_plugin_user_admin.php'); break; case 'check': include _include(APP_PATH.'plugin/zerodream_plugin/route/zd_plugin_user_check.php'); break; case 'key_query': include _include(APP_PATH.'plugin/zerodream_plugin/route/zd_plugin_user_key_query.php'); break; } ?>