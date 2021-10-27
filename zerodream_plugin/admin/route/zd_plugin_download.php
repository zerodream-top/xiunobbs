
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Access Denied.'); $_key = param(2); $_check_key = param(3); $check_salt = param(4); $plugin = param(5); include _include(APP_PATH.'plugin/zerodream_plugin/admin/model/zd_plugin_download.func.php'); zd_plugin_download_data(); zd_plugin_download_get_information(); zd_plugin_download_check_information(); zd_plugin_download_request(); zd_plugin_download_index(); ?>