
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Access Denied.'); include XIUNOPHP_PATH.'xn_zip.func.php'; $action = param(1); // hook admin_plugin_start.php // hook admin_plugin_data.php plugin_init(); plugin_env_check(); empty($action) AND $action = 'local'; if($action == 'local') { // hook admin_plugin_local_start.php // hook admin_plugin_local_data.php $pluginlist = $plugins; $pagination = ''; $pugin_cate_html = ''; $header['title'] = lang('local_plugin'); $header['mobile_title'] = lang('local_plugin'); // hook admin_plugin_local_end.php include _include(ADMIN_PATH."view/htm/plugin_list.htm"); } elseif($action == 'official_fee' || $action == 'official_free') { // hook admin_plugin_official_start.php $cateid = param(2, 0); $page = param(3, 1); $pagesize = 10; $cond = $cateid ? array('cateid'=>$cateid) : array(); $cond['price'] = $action == 'official_fee' ? array('>'=>0) : 0; // hook admin_plugin_official_data.php $pugin_cates = array(0=>lang('pugin_cate_0'), 1=>lang('pugin_cate_1'), 2=>lang('pugin_cate_2'), 3=>lang('pugin_cate_3'), 4=>lang('pugin_cate_4'), 99=>lang('pugin_cate_99')); $pugin_cate_html = plugin_cate_active($action, $pugin_cates, $cateid, $page); $total = plugin_official_total($cond); $pluginlist = plugin_official_list($cond, array('pluginid'=>-1), $page, $pagesize); $pagination = pagination(url("plugin-$action-$cateid-{page}"), $total, $page, $pagesize); $header['title'] = lang('official_plugin'); $header['mobile_title'] = lang('official_plugin'); // hook admin_plugin_official_end.php include _include(ADMIN_PATH."view/htm/plugin_list.htm"); } elseif($action == 'read') { // hook admin_plugin_read_start.php $dir = param_word(2); $siteid = plugin_siteid(); // hook admin_plugin_read_data.php $plugin = plugin_read_by_dir($dir); empty($plugin) AND message(-1, lang('plugin_not_exists')); $islocal = plugin_is_local($dir); $url = ''; $download_url = ''; $errmsg = ''; if($plugin['pluginid']) { if(!empty($plugin['official']) && $plugin['official']['price'] > 0) { $url = plugin_order_buy_qrcode_url($siteid, $dir); if($url === FALSE) { if($errno == 1 || $errno == 2) { $download_url = url("plugin-download-$dir"); } else { $download_url = ''; $errmsg = $errstr; } } else { } } else { } } else { $url = ''; } $tab = !$islocal ? ($plugin['price'] > 0 ? 'official_fee' : 'official_free') : 'local'; $header['title'] = lang('plugin_detail').'-'.$plugin['name']; $header['mobile_title'] = $plugin['name']; // hook admin_plugin_read_end.php include _include(ADMIN_PATH."view/htm/plugin_read.htm"); } elseif($action == 'is_bought') { $dir = param_word(2); plugin_check_exists($dir, FALSE); $plugin = plugin_read_by_dir($dir); if($plugin['official']['price'] == 0) { message(1, lang('plugin_is_free')); } if(plugin_is_bought($dir)) { message(0, lang('plugin_is_bought')); } else { message(2, lang('plugin_not_bought')); } } elseif($action == 'download') { plugin_lock_start(); $dir = param_word(2); plugin_check_exists($dir, FALSE); $plugin = plugin_read_by_dir($dir); $official = plugin_official_read($dir); empty($official) AND message(-1, lang('plugin_not_exists')); if(version_compare($conf['version'], $official['bbs_version']) == -1) { message(-1, lang('plugin_versio_not_match', array('bbs_version'=>$official['bbs_version'], 'version'=>$conf['version']))); } plugin_download_unzip($dir); plugin_lock_end(); message(0, jump(lang('plugin_download_sucessfully', array('dir'=>$dir)), url("plugin-read-$dir"), 3)); } elseif($action == 'install') { // hook admin_plugin_install_start.php plugin_lock_start(); $dir = param_word(2); plugin_check_exists($dir); $name = $plugins[$dir]['name']; // hook admin_plugin_install_data.php plugin_check_dependency($dir, 'install'); plugin_install($dir); $installfile = APP_PATH."plugin/$dir/install.php"; if(is_file($installfile)) { include _include($installfile); } plugin_lock_end(); if(strpos($dir, '_theme_') !== FALSE) { foreach($plugins as $_dir => $_plugin) { if($dir == $_dir) continue; if(strpos($_dir, '_theme_') !== FALSE) { plugin_unstall($_dir); } } } else { $suffix = substr($dir, strpos($dir, '_')); foreach($plugins as $_dir => $_plugin) { if($dir == $_dir) continue; $_suffix = substr($_dir, strpos($_dir, '_')); if($suffix == $_suffix) { plugin_unstall($_dir); } } } // hook admin_plugin_install_end.php $msg = lang('plugin_install_sucessfully', array('name'=>$name)); message(0, jump($msg, http_referer(), 3)); } elseif($action == 'unstall') { // hook admin_plugin_unstall_start.php plugin_lock_start(); $dir = param_word(2); plugin_check_exists($dir); $name = $plugins[$dir]['name']; // hook admin_plugin_unstall_data.php plugin_check_dependency($dir, 'unstall'); plugin_unstall($dir); $unstallfile = APP_PATH."plugin/$dir/unstall.php"; if(is_file($unstallfile)) { include _include($unstallfile); } plugin_lock_end(); // hook admin_plugin_unstall_end.php $msg = lang('plugin_unstall_sucessfully', array('name'=>$name, 'dir'=>"plugin/$dir")); message(0, jump($msg, http_referer(), 5)); } elseif($action == 'enable') { // hook admin_plugin_enable_start.php plugin_lock_start(); $dir = param_word(2); plugin_check_exists($dir); $name = $plugins[$dir]['name']; // hook admin_plugin_enable_data.php plugin_check_dependency($dir, 'install'); plugin_enable($dir); plugin_lock_end(); // hook admin_plugin_enable_end.php $msg = lang('plugin_enable_sucessfully', array('name'=>$name)); message(0, jump($msg, http_referer(), 1)); } elseif($action == 'disable') { // hook admin_plugin_disable_start.php plugin_lock_start(); $dir = param_word(2); plugin_check_exists($dir); $name = $plugins[$dir]['name']; // hook admin_plugin_disable_data.php plugin_check_dependency($dir, 'unstall'); plugin_disable($dir); plugin_lock_end(); // hook admin_plugin_disable_end.php $msg = lang('plugin_disable_sucessfully', array('name'=>$name)); message(0, jump($msg, http_referer(), 3)); } elseif($action == 'upgrade') { plugin_lock_start(); $dir = param_word(2); plugin_check_exists($dir, FALSE); $name = $plugins[$dir]['name']; $plugin = plugin_read_by_dir($dir); plugin_check_dependency($dir, 'install'); $official = plugin_read_by_dir($dir, FALSE); if(version_compare($conf['version'], $official['bbs_version']) == -1) { message(-1, lang('plugin_versio_not_match', array('bbs_version'=>$official['bbs_version'], 'version'=>$conf['version']))); } plugin_download_unzip($dir); plugin_install($dir); $upgradefile = APP_PATH."plugin/$dir/upgrade.php"; if(is_file($upgradefile)) { include _include($upgradefile); } plugin_lock_end(); $msg = lang('plugin_upgrade_sucessfully', array('name'=>$name)); message(0, jump($msg, http_referer(), 3)); } elseif($action == 'setting') { // hook admin_plugin_setting_start.php $dir = param_word(2); plugin_check_exists($dir); $name = $plugins[$dir]['name']; // hook admin_plugin_setting_data.php // hook admin_plugin_setting_end.php include _include(APP_PATH."plugin/$dir/setting.php"); } // hook admin_plugin_end.php function plugin_check_dependency($zd_035ed_0, $zd_1be88_1 = 'install') { global $plugins; $zd_04b0d_2 = $plugins[$zd_035ed_0]['name']; if($zd_1be88_1 == 'install') { $zd_82f85_5 = plugin_dependencies($zd_035ed_0); if(!empty($zd_82f85_5)) { $zd_4b6ec_8 = plugin_dependency_arr_to_links($zd_82f85_5); $zd_10f4a_10 = lang('plugin_dependency_following', array('name'=>$zd_04b0d_2, 's'=>$zd_4b6ec_8)); message(-1, $zd_10f4a_10); } } else { $zd_82f85_5 = plugin_by_dependencies($zd_035ed_0); if(!empty($zd_82f85_5)) { $zd_4b6ec_8 = plugin_dependency_arr_to_links($zd_82f85_5); $zd_10f4a_10 = lang('plugin_being_dependent_cant_delete', array('name'=>$zd_04b0d_2, 's'=>$zd_4b6ec_8)); message(-1, $zd_10f4a_10); } } } function plugin_dependency_arr_to_links($zd_1591d_0) { global $plugins; $zd_8ba45_1 = ''; foreach($zd_1591d_0 as $zd_856dc_3=>$zd_01e73_4) { $zd_2a3c1_5 = isset($plugins[$zd_856dc_3]['name']) ? $plugins[$zd_856dc_3]['name'] : $zd_856dc_3; $zd_9b672_9 = url("plugin-read-$zd_856dc_3"); $zd_8ba45_1 .= " <a href=\"$zd_9b672_9\">【{$zd_2a3c1_5}】</a> "; } return $zd_8ba45_1; } function plugin_download_unzip($zd_52fc5_0) { global $conf; $zd_44a99_1 = http_url_path(); $zd_f9c1a_2 = plugin_siteid(); $zd_44a99_1 = xn_urlencode($zd_44a99_1); $zd_a08d5_5 = PLUGIN_OFFICIAL_URL."plugin-download-$zd_52fc5_0-$zd_f9c1a_2-$zd_44a99_1.htm"; $zd_50778_9 = http_get($zd_a08d5_5); empty($zd_50778_9) AND message(-1, $zd_a08d5_5.lang('plugin_return_data_error').lang('server_response_empty')); if(substr($zd_50778_9, 0, 2) != 'PK') { $zd_3519a_14 = xn_json_decode($zd_50778_9); empty($zd_3519a_14) AND message(-1, $zd_a08d5_5.lang('plugin_return_data_error').$zd_50778_9); if($zd_3519a_14['code'] == -2) { message(-2, jump(lang('plugin_is_not_free'), url("plugin-read-$zd_52fc5_0"))); } message($zd_3519a_14['code'], $zd_a08d5_5.lang('plugin_return_data_error').$zd_3519a_14['message']); } $zd_98364_24 = $conf['tmp_path'].'plugin_'.$zd_52fc5_0.'.zip'; $zd_3196e_26 = APP_PATH."plugin/"; file_put_contents($zd_98364_24, $zd_50778_9); rmdir_recusive(APP_PATH."plugin/$zd_52fc5_0/hook/", 1); rmdir_recusive(APP_PATH."plugin/$zd_52fc5_0/overwrite/", 1); xn_unzip($zd_98364_24, $zd_3196e_26); $conffile = "../plugin/$zd_52fc5_0/conf.json"; !is_file($conffile) AND message(-1, 'conf.json '.lang('not_exists')); $zd_3519a_14 = xn_json_decode(file_get_contents($conffile)); empty($zd_3519a_14['name']) AND message(-1, 'conf.json '.lang('format_maybe_error')); !is_dir("../plugin/$zd_52fc5_0") AND message(-1, lang('plugin_maybe_download_failed')." plugin/$zd_52fc5_0"); } function plugin_is_bought($zd_9f143_0) { global $conf; $zd_ed0ab_1 = plugin_siteid(); $zd_8ea29_2 = http_url_path(); $zd_8ea29_2 = xn_urlencode($zd_8ea29_2); $zd_b0087_5 = PLUGIN_OFFICIAL_URL."plugin-is_bought-$zd_9f143_0-$zd_ed0ab_1-$zd_8ea29_2.htm"; $zd_c1221_9 = http_get($zd_b0087_5); $zd_a423e_11 = xn_json_decode($zd_c1221_9); empty($zd_a423e_11) AND message(-1, $zd_b0087_5.lang('plugin_return_data_error').$zd_c1221_9); if($zd_a423e_11['code'] == 0) { return TRUE; } else { return xn_error($zd_a423e_11['code'], $zd_a423e_11['message']); } } function plugin_order_buy_qrcode_url($zd_a39c0_0, $zd_bde78_1, $zd_7994f_2 = '') { global $conf; $zd_a39c0_0 = plugin_siteid(); $zd_7994f_2 = http_url_path(); $zd_7994f_2 = xn_urlencode($zd_7994f_2); $zd_cbb7d_7 = PLUGIN_OFFICIAL_URL."plugin-buy_qrcode_url-$zd_bde78_1-$zd_a39c0_0-$zd_7994f_2.htm"; set_time_limit(0); $zd_ec204_11 = http_get($zd_cbb7d_7); if(empty($zd_ec204_11)) return xn_error(-1, lang('server_response_empty')); $zd_b6dbf_14 = xn_json_decode($zd_ec204_11); if(empty($zd_b6dbf_14) || !isset($zd_b6dbf_14['code'])) { return xn_error($zd_b6dbf_14['code'], $zd_cbb7d_7.lang('plugin_return_data_error').$zd_ec204_11); } if($zd_b6dbf_14['code'] == 0) { return $zd_b6dbf_14['message']; } else { return xn_error($zd_b6dbf_14['code'], $zd_cbb7d_7.lang('plugin_return_data_error').$zd_b6dbf_14['message']); } } function plugin_is_local($zd_fedff_0) { global $plugins; return isset($plugins[$zd_fedff_0]) ? TRUE : FALSE; } function plugin_check_exists($zd_b8497_0, $zd_42eee_1 = TRUE) { global $plugins, $official_plugins; !is_word($zd_b8497_0) AND message(-1, lang('plugin_name_error')); if($zd_42eee_1) { !isset($plugins[$zd_b8497_0]) AND message(-1, lang('plugin_not_exists')); } else { !isset($official_plugins[$zd_b8497_0]) AND message(-1, lang('plugin_not_exists')); } } function plugin_cate_active($zd_1827b_0, $zd_88aad_1, $zd_81567_2, $zd_2b834_3) { $zd_4fff3_4 = ''; foreach ($zd_88aad_1 as $zd_3c754_6=>$zd_88459_7) { $zd_ed73d_8 = url("plugin-$zd_1827b_0-$zd_3c754_6-$zd_2b834_3"); $zd_4fff3_4 .= '<a role="button" class="btn btn btn-secondary'.($zd_81567_2 == $zd_3c754_6 ? ' active' : '').'" href="'.$zd_ed73d_8.'">'.$zd_88459_7.'</a>'; } return $zd_4fff3_4; } function plugin_lock_start() { global $route, $action; !xn_lock_start($route.'_'.$action) AND message(-1, lang('plugin_task_locked')); } function plugin_lock_end() { global $route, $action; xn_lock_end($route.'_'.$action); } function plugin_env_check() { } ?>