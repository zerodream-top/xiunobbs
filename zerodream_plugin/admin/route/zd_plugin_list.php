
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Access Denied.'); $orderby = param(2, 0); $cateid = param(3, 0); $page = param(4, 1); $search = param('search'); $_cache = param('cache'); include _include(APP_PATH.'plugin/zerodream_plugin/admin/model/zd_plugin_list.func.php'); zd_plugin_conf(); zd_plugin_list_dir(); zd_plugin_list_data(); zd_plugin_list_url_record(); zd_plugin_list_get_information(); zd_plugin_list_index(); include _include(APP_PATH.'plugin/zerodream_plugin/admin/view/htm/zd_plugin_list.htm'); ?>