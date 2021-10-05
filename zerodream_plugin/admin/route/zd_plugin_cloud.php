
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Access Denied.'); include _include(APP_PATH.'plugin/zerodream_plugin/admin/model/zd_plugin_cloud.func.php'); $_server_request_url = zd_request_uri(); $url_rewrite_on = $conf['url_rewrite_on']; $url_request = substr($_server_request_url, $url_rewrite_on?37:38); $url_arr = explode('-', $url_request); $url_arr[count($url_arr)-1] = explode('.', end($url_arr))[0]; $url_route = $url_arr[0]; if($url_route=='search') { include _include(APP_PATH.'plugin/zerodream_plugin/admin/route/zd_plugin_cloud_search.php');exit(); } $_cache = param('cache'); zd_plugin_conf(); zd_plugin_cloud_dir(); zd_plugin_cloud_data(); zd_plugin_cloud_url_record(); zd_plugin_cloud_get_information(); zd_plugin_cloud_index(); include _include(APP_PATH.'plugin/zerodream_plugin/admin/view/htm/zd_plugin_cloud.htm'); ?>