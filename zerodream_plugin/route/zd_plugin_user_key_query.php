
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Access Denied.'); $apply_key = param(2); include _include(APP_PATH.'plugin/zerodream_plugin/model/zd_plugin_user_key_query.func.php'); zd_plugin_user_key_query_request(); zd_plugin_user_key_query_response(); ?>