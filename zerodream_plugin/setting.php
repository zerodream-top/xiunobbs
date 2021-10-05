
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Access Denied.'); if($method == 'GET') { $zd_kv_zerodream_plugin = zd_kv_get('zerodream_plugin'); $zd_plugin_setting['key'] = $zd_kv_zerodream_plugin['key']; include _include(APP_PATH.'plugin/zerodream_plugin/setting.htm'); } else { $key = param('key'); $zd_kv_zerodream_plugin = zd_kv_get('zerodream_plugin'); $zd_kv_zerodream_plugin['key'] = $key; zd_kv_set('zerodream_plugin', $zd_kv_zerodream_plugin); message(0, '修改成功'); } ?>