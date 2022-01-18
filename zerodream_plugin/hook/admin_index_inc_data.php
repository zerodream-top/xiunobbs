
<?php exit;

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 include _include(APP_PATH.'plugin/zerodream_plugin/admin/model/_zd_plugin.func.php'); $zd_kv_zerodream_plugin = zd_kv_get('zerodream_plugin'); if($zd_kv_zerodream_plugin['interface']=='zerodream') $menu = include _include(APP_PATH.'plugin/zerodream_plugin/conf/menu.conf.php'); $zd_plugin_read_wait = param('zd_plugin_read_wait'); if($zd_plugin_read_wait) { $zd_data = zd_data_get(); $zd_data['zd_plugin_read']['wait_read'] = $zd_plugin_read_wait; zd_data_put($zd_data); $zd_plugin_url_record = zd_plugin_url_record_get(); $zd_plugin_url_record['zd_plugin_information']['source'] = 'zd_plugin_thread_download'; zd_plugin_url_record_put($zd_plugin_url_record); } ?>