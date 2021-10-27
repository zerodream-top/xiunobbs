
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Access Denied.'); if($method == 'GET') { $zd_uniqid = zd_uniqid($prefix=''); $zd_kv_zerodream_plugin = zd_kv_get('zerodream_plugin'); $zd_plugin_setting['key'] = $zd_kv_zerodream_plugin['key']; if(isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']=='on' || (isset($_SERVER['HTTP_X_FORWARDED_PROTO'])&&$_SERVER['HTTP_X_FORWARDED_PROTO']=='https')) $scheme = 'https'; else $scheme = 'http'; $host = $_SERVER['HTTP_HOST']; $apply_url = "$scheme://$host/"; $zd_plugin_setting['key_apply_url'] = ZERODREAM_URL."zd_plugin-user-key_apply-$zd_uniqid.htm?apply_url=$apply_url"; $zd_plugin_setting['key_query_url'] = url("../zd_plugin_user-key_query-$zd_uniqid"); include _include(APP_PATH.'plugin/zerodream_plugin/setting.htm'); } else { $key = param('key'); $zd_kv_zerodream_plugin = zd_kv_get('zerodream_plugin'); $zd_kv_zerodream_plugin['key'] = $key; zd_kv_set('zerodream_plugin', $zd_kv_zerodream_plugin); message(0, '修改成功'); } ?>