
<?php exit;

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 elseif($action == 'zerodream_plugin_cloud') { include _include(APP_PATH.'plugin/zerodream_plugin/admin/route/zd_plugin_cloud.php'); } elseif($action == 'zerodream_plugin_plugin') { include _include(APP_PATH.'plugin/zerodream_plugin/admin/route/zd_plugin_list.php'); } elseif($action == 'zerodream_plugin_template') { include _include(APP_PATH.'plugin/zerodream_plugin/admin/route/zd_plugin_list.php'); } elseif($action == 'zerodream_plugin_read') { include _include(APP_PATH.'plugin/zerodream_plugin/admin/route/zd_plugin_read.php'); } elseif($action == 'zerodream_plugin_download') { include _include(APP_PATH.'plugin/zerodream_plugin/admin/route/zd_plugin_download.php'); } elseif($action == 'zerodream_plugin_install') { include _include(APP_PATH.'plugin/zerodream_plugin/admin/route/zd_plugin_install.php'); } elseif($action == 'new_plugin') { include _include(APP_PATH.'plugin/zerodream_plugin/admin/route/new_plugin.php'); } elseif($action == 'upload_plugin') { include _include(APP_PATH.'plugin/zerodream_plugin/admin/route/upload_plugin.php'); } elseif($action == 'interface') { include _include(APP_PATH.'plugin/zerodream_plugin/admin/route/interface.php'); } elseif($action == 'synchro') { $json_path = APP_PATH.'log/plugin-all-4.json'; $json_data = fox_write_plugin_json($json_path); if($json_data){ cache_set('plugin_official_list', xn_json_decode($json_data), 3600); message(0, '同步成功'); } else { message(-1, '同步失败'); } } ?>