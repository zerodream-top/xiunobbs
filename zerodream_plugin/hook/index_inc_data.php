
<?php exit;

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Access Denied.'); if(!defined('ZERODREAM_URL')) define('ZERODREAM_URL', 'https://www.zerodream.top/'); if(!defined('ZERODREAM_URL_THREAD')) define('ZERODREAM_URL_THREAD', ZERODREAM_URL.'thread-'); define('ZD_PLUGIN_VERSION', 'api'); define('ZD_PLUGIN_URL_VERSION', 'zd_plugin_'.ZD_PLUGIN_VERSION.'-'); define('_ZERODREAM_XIUNO_PATH', 'zerodream/'); define('_ZD_PATH_DATA', _ZERODREAM_XIUNO_PATH.'xiuno/data/'); define('_ZD_PLUGIN_ADMIN_PATH_DATA', _ZD_PATH_DATA.'zerodream_plugin_administrator/'); define('_ZD_PLUGIN_ADMIN_PATH_PLUGIN_DATA', _ZD_PLUGIN_ADMIN_PATH_DATA.'plugin_data/'); define('_ZD_PLUGIN_ADMIN_PATH_PNG', _ZD_PLUGIN_ADMIN_PATH_PLUGIN_DATA.'_png/'); define('ZD_SEPARATOR', '<zd_br>'); if(isset($_SERVER['HTTPS']) && strcasecmp($_SERVER['HTTPS'],'on')==0) $zd_scheme = 'https'; elseif(isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strcasecmp($_SERVER['HTTP_X_FORWARDED_PROTO'],'https')==0) $zd_scheme = 'https'; else $zd_scheme = 'http'; $zd_host = $_SERVER['HTTP_HOST']; $zd_scheme_host = "$zd_scheme://$zd_host/"; ?>