
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Access Denied.'); plugin_lock_start(); $dir = param_word(2); plugin_check_exists($dir); $name = $plugins[$dir]['name']; plugin_check_dependency($dir, 'install'); plugin_install($dir); $installfile = APP_PATH."plugin/$dir/install.php"; if(is_file($installfile)) include _include($installfile); $upgradefile = APP_PATH."plugin/$dir/upgrade.php"; if(is_file($upgradefile)) include _include($upgradefile); plugin_lock_end(); if(strpos($dir, '_theme_') !== FALSE) { foreach($plugins as $_dir => $_plugin) { if($dir == $_dir) continue; if(strpos($_dir, '_theme_') !== FALSE) { plugin_unstall($_dir); } } } elseif(stripos($dir, 'zerodream') === FALSE) { $suffix = substr($dir, strpos($dir, '_')); foreach($plugins as $_dir => $_plugin) { if($dir == $_dir) continue; if(stripos($_dir, 'zerodream') === FALSE) { $_suffix = substr($_dir, strpos($_dir, '_')); if($suffix == $_suffix) { plugin_unstall($_dir); } } } } if($dir=='zerodream_plugin') { $msg = lang('plugin_install_sucessfully', array('name'=>$name)); $url = url('plugin-zerodream_plugin_cloud'); message(0, jump($msg, $url, 3)); } $msg = lang('plugin_install_sucessfully', array('name'=>$name)); message(0, jump($msg, http_referer(), 3)); ?>