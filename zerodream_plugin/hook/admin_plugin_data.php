
<?php exit;

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 include _include(APP_PATH.'plugin/zerodream_plugin/admin/model/zd_plugin.func.php'); $zd_kv_zerodream_plugin = zd_kv_get('zerodream_plugin'); $interface = $zd_kv_zerodream_plugin['interface']; if($interface=='zerodream') { unset($menu); $menu = include _include(APP_PATH.'plugin/zerodream_plugin/admin/route/menu.conf.php'); } elseif($interface=='xiuno') { unset($menu); $menu = include _include(ADMIN_PATH.'menu.conf.php'); } ?>