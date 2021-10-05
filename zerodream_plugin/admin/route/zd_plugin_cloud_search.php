
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Access Denied.'); $_cache = param('cache'); include _include(APP_PATH.'plugin/zerodream_plugin/admin/model/zd_plugin_cloud_search.func.php'); zd_plugin_conf(); zd_plugin_cloud_search_dir(); zd_plugin_cloud_search_data(); zd_plugin_cloud_search_url_record(); zd_plugin_cloud_search_get_information(); zd_plugin_cloud_search_index(); include _include(APP_PATH.'plugin/zerodream_plugin/admin/view/htm/zd_plugin_cloud_search.htm'); ?>