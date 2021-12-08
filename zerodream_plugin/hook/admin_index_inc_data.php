
<?php exit;

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 $route_action = param(0, 'index').'-'.param(1); if($route_action!='plugin-zerodream_plugin_read') { $zd_plugin_read_wait_read = param('zd_plugin_read_wait_read'); if($zd_plugin_read_wait_read) { $zd_data = zd_data_get(); $zd_data['zd_plugin_read']['wait_read'] = $zd_plugin_read_wait_read; zd_data_put($zd_data); } } ?>