
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Access Denied.'); $type = param(2); include _include(APP_PATH.'plugin/zerodream_plugin/model/zd_plugin_check.func.php'); if($type=='download') { zd_plugin_check_response_download_data(); zd_plugin_user_check(); echo zd_plugin_check_response_download_response(); } elseif($type=='data') { $_check = param(3); zd_plugin_user_check(); echo zd_plugin_check_response_plugin(); } elseif($type=='install') { echo zd_plugin_check_response_install(); } ?>