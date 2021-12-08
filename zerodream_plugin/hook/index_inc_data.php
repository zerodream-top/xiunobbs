
<?php exit;

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Access Denied.'); $zd_plugin_conf = include _include(APP_PATH.'plugin/zerodream_plugin/conf/zd_plugin.conf.php'); if(!defined('ZERODREAM_URL')) define('ZERODREAM_URL', 'https://www.zerodream.top/'); define('ZERODREAM_URL_THREAD', ZERODREAM_URL.'thread-'); define('ZD_PLUGIN_URL_VERSION', 'zd_plugin_'.ZD_PLUGIN_VERSION.'-'); ?>