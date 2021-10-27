
<?php exit;

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 rmdir_recusive($conf['tmp_path'], 1); if($dir=='zerodream_plugin') { $upgradefile = APP_PATH."plugin/$dir/upgrade.php"; if(is_file($upgradefile)) include _include($upgradefile); $msg = lang('plugin_install_sucessfully', array('name'=>$name)); $url = url('plugin-zerodream_plugin_cloud-index'); message(0, jump($msg, $url, 3)); } ?>