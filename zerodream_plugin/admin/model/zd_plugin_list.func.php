
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_list_dir() { $zd_0016c_0 = '../data/zerodream_plugin/cache/zd_plugin_list/'; if(!is_dir($zd_0016c_0)) mkdir($zd_0016c_0); } function zd_plugin_list_data() { global $conf,$action,$orderby,$cateid,$page,$search,$url_rewrite_on,$url_record,$zd_kv_zerodream_plugin,$filename_cache; $zd_977cb_0 = zd_request_uri(); $url_rewrite_on = $conf['url_rewrite_on']; $url_record = substr($zd_977cb_0, $url_rewrite_on?14:15); $zd_kv_zerodream_plugin = zd_kv_get('zerodream_plugin'); if(empty($zd_kv_zerodream_plugin['key'])) message(-1, jump('请设置 key', url('plugin-setting-zerodream_plugin').'#key', 3)); $zd_55a8e_2 = md5($action.$orderby.$cateid.$page.$search); $filename_cache = "../data/zerodream_plugin/cache/zd_plugin_list/$zd_55a8e_2"; } function zd_plugin_list_url_record() { global $url_record; $zd_caebe_0 = zd_plugin_url_record_get(); $zd_caebe_0['zd_plugin_information']['action'] = 'zd_plugin_list'; $zd_caebe_0['zd_plugin_plugin_list']['url_record'] = $url_record; $zd_caebe_0['zd_plugin_plugin_read']['back_action'] = 'zd_plugin_plugin_list'; zd_plugin_url_record_put($zd_caebe_0); } function zd_plugin_list_get_information() { global $information,$zd_kv_zerodream_plugin; $zd_ebcb8_0 = $zd_kv_zerodream_plugin['key']; $zd_43784_1 = explode("_", $zd_ebcb8_0); $information['uid'] = $zd_43784_1[0]; $information['key'] = $zd_43784_1[1]; $information['check'] = $zd_43784_1[2]; } function zd_plugin_list_index() { global $zd_kv_zerodream_plugin; if($zd_kv_zerodream_plugin['cache']) zd_plugin_list_cache(); else zd_plugin_list_non_cache(); } function zd_plugin_list_cache() { global $time,$zd_plugin_conf,$_cache,$filename_cache,$response,$zd_plugin_list; $zd_c5c04_0 = $zd_plugin_conf['cache_time']; if($_cache) { zd_plugin_list_request(); $zd_d991b_1 = $response; file_put_contents($filename_cache, $zd_d991b_1); message(0, '缓存成功'); } if(is_file($filename_cache)) { $response = file_get_contents($filename_cache); } else { zd_plugin_list_request(); $zd_d991b_1 = $response; file_put_contents($filename_cache, $zd_d991b_1); } $zd_41d9e_5 = 'zd_plugin_list'; $zd_d991b_1 = $response; $zd_dd5fa_7 = zd_data_unzip($zd_41d9e_5, $zd_d991b_1); $zd_d991b_1 = $zd_dd5fa_7['data']; $zd_12948_12 = $zd_dd5fa_7['html']; $zd_f19ad_14 = $zd_dd5fa_7['script']; $zd_284aa_16 = json_decode($zd_d991b_1, true); $zd_d60f4_18 = $zd_284aa_16['plugin_list']; $zd_e45a5_20 = $zd_284aa_16['zd_plugin_information']; $zd_f8e27_22 = $zd_e45a5_20['cache']; $zd_3eaf6_24 = $zd_e45a5_20['create_time']; $zd_38577_26 = zd_kv_get('zerodream_plugin'); $zd_38577_26['cache'] = $zd_f8e27_22; zd_kv_set('zerodream_plugin', $zd_38577_26); if(!$zd_f8e27_22) { zd_plugin_list_non_cache();return; } $zd_2e7a6_31 = $zd_3eaf6_24 + $zd_c5c04_0; if($time>=$zd_2e7a6_31) { zd_plugin_list_request(); $zd_d991b_1 = $response; file_put_contents($filename_cache, $zd_d991b_1); } foreach($zd_d60f4_18 as $zd_759cb_38=>$zd_dc23a_39) { $zd_95428_40 = "../plugin/$zd_759cb_38/conf.json"; $zd_e8023_42 = file_get_contents($zd_95428_40); $zd_a5ddc_44 = json_decode($zd_e8023_42, true); if(is_array($zd_a5ddc_44) && !$zd_dc23a_39['plugin_state']['illegal']) { $zd_plugin_list['plugin_list'][$zd_759cb_38]['downloaded'] = true; $zd_76455_49 = "../plugin/$zd_759cb_38/setting.php"; $zd_plugin_list['plugin_list'][$zd_759cb_38]['name'] = $zd_a5ddc_44['name']; $zd_plugin_list['plugin_list'][$zd_759cb_38]['installed_url'] = !$zd_a5ddc_44['installed'] ? url("plugin-install-$zd_759cb_38") : false; $zd_plugin_list['plugin_list'][$zd_759cb_38]['setting_url'] = is_file($zd_76455_49) ? url("plugin-setting-$zd_759cb_38") : false; $zd_plugin_list['plugin_list'][$zd_759cb_38]['disable_url'] = $zd_a5ddc_44['enable'] ? url("plugin-disable-$zd_759cb_38") : false; $zd_plugin_list['plugin_list'][$zd_759cb_38]['enable_url'] = !$zd_a5ddc_44['enable'] ? url("plugin-enable-$zd_759cb_38") : false; $zd_plugin_list['plugin_list'][$zd_759cb_38]['unstall_url'] = url("plugin-unstall-$zd_759cb_38"); $zd_ec5a4_67 = $zd_dc23a_39['lastversion']; $zd_62114_69 = $zd_a5ddc_44['version']; if(version_compare($zd_62114_69, $zd_ec5a4_67, '<')) $zd_plugin_list['plugin_list'][$zd_759cb_38]['upgrade_url'] = $zd_dc23a_39['upgrade_url']; else $zd_plugin_list['plugin_list'][$zd_759cb_38]['upgrade_url'] = false; $zd_plugin_list['plugin_list'][$zd_759cb_38]['version_local'] = $zd_62114_69; } else { $zd_plugin_list['plugin_list'][$zd_759cb_38]['downloaded'] = false; } } $zd_plugin_list['cache'] = true; $zd_plugin_list['html'] = $zd_12948_12; $zd_plugin_list['script'] = $zd_f19ad_14; } function zd_plugin_list_non_cache() { global $filename_cache,$response,$zd_plugin_list; zd_plugin_list_request(); $zd_4c18d_0 = $response; file_put_contents($filename_cache, $zd_4c18d_0); $zd_d266f_2 = 'zd_plugin_list'; $zd_4c18d_0 = $response; $zd_4ea07_4 = zd_data_unzip($zd_d266f_2, $zd_4c18d_0); $zd_4c18d_0 = $zd_4ea07_4['data']; $zd_fb1e7_9 = $zd_4ea07_4['html']; $zd_5fae8_11 = $zd_4ea07_4['script']; $zd_fc7b2_13 = json_decode($zd_4c18d_0, true); $zd_2f77a_15 = $zd_fc7b2_13['zd_plugin_information']; $zd_6c419_17 = $zd_2f77a_15['cache']; $zd_1c511_19 = zd_kv_get('zerodream_plugin'); $zd_1c511_19['cache'] = $zd_6c419_17; zd_kv_set('zerodream_plugin', $zd_1c511_19); if($zd_6c419_17) { zd_plugin_list_cache();return; } $zd_plugin_list['cache'] = false; $zd_plugin_list['html'] = $zd_fb1e7_9; $zd_plugin_list['script'] = $zd_5fae8_11; } function zd_plugin_list_request() { global $action,$orderby,$cateid,$page,$search,$url_record,$information,$url_rewrite_on,$response; $zd_d4b6c_0 = $information['uid'].'_'.$information['key']; $zd_635a1_1 = md5($information['uid'].'_'.$information['key'].'_'.$information['check']); $zd_a2202_2 = '../plugin/'; $zd_116d6_3 = scandir($zd_a2202_2); foreach($zd_116d6_3 as $zd_dabfa_6=>$zd_0c218_7) { if($zd_0c218_7!='.' && $zd_0c218_7!='..') { $zd_83f9a_10 = $zd_a2202_2.$zd_0c218_7.'/conf.json'; $zd_d4f38_13 = file_get_contents($zd_83f9a_10); $zd_05c1b_15 = json_decode($zd_d4f38_13, true); if(is_array($zd_05c1b_15)) { $zd_09b7e_18 .= $zd_0c218_7.'|'; $zd_09b7e_18 .= $zd_05c1b_15['version'].'|'; $zd_09b7e_18 .= $zd_05c1b_15['installed']; $zd_09b7e_18 .= $zd_05c1b_15['enable']; $zd_48e4a_26 = $zd_a2202_2.$zd_0c218_7.'/setting.php'; if(is_file($zd_48e4a_26)) $zd_09b7e_18 .= 1; $zd_09b7e_18 .= ';'; } } } $zd_454d8_32 = 'zd_plugin_list'; $zd_920eb_33 = array('local_plugins'=>$zd_09b7e_18); $zd_8cce0_35 = zd_data_zip($zd_454d8_32, $zd_920eb_33); $zd_0faa2_38 = '../plugin/zerodream_plugin/conf.json'; $zd_cd01d_39 = file_get_contents($zd_0faa2_38); $zd_96520_41 = json_decode($zd_cd01d_39, true); $zd_43269_43 = zd_plugin_zerodream_plugin_md5_file(); $zd_47500_44 = zd_plugin_zerodream_plugin_dir_existence(); $zd_28b30_45['zd_plugin_information']['key'] = $zd_d4b6c_0; $zd_28b30_45['zd_plugin_information']['check_key'] = $zd_635a1_1; $zd_28b30_45['zd_plugin_information']['url_rewrite_on'] = $url_rewrite_on; $zd_28b30_45['zd_plugin_information']['action'] = $action; $zd_28b30_45['zd_plugin_information']['orderby'] = $orderby; $zd_28b30_45['zd_plugin_information']['cateid'] = $cateid; $zd_28b30_45['zd_plugin_information']['page'] = $page; $zd_28b30_45['zd_plugin_information']['search'] = $search; $zd_28b30_45['zd_plugin_information']['url_record'] = $url_record; $zd_28b30_45['zd_plugin_information']['zerodream_plugin']['version'] = $zd_96520_41['version']; $zd_28b30_45['zd_plugin_information']['zerodream_plugin']['installed'] = $zd_96520_41['installed']; $zd_28b30_45['zd_plugin_information']['zerodream_plugin']['enable'] = $zd_96520_41['enable']; $zd_28b30_45['zd_plugin_information']['zerodream_plugin_md5'] = $zd_43269_43; $zd_28b30_45['zd_plugin_information']['zerodream_plugin_dir_existence'] = $zd_47500_44; $zd_d4f38_13 = json_encode($zd_28b30_45); $zd_8184c_68 = $zd_d4f38_13.'__zd_plugin_list_explode__'.$zd_8cce0_35; if($search) { $cateid = 0; $zd_be523_71 = ZERODREAM_URL.ZD_PLUGIN_URL_VERSION."plugin_list.htm"; } else { $zd_be523_71 = ZERODREAM_URL.ZD_PLUGIN_URL_VERSION."plugin_list-$action-$orderby-$cateid-$page.htm"; } $zd_66083_73 = zd_curl($zd_be523_71, $zd_8184c_68, array('method'=>'POST')); $zd_cc37b_76 = $zd_66083_73['data']; $zd_fd462_78 = $zd_66083_73['error']; if($zd_fd462_78) message(-1, "curl_error: $zd_fd462_78"); elseif(!$zd_cc37b_76) message(-1, '数据不存在'); $response = $zd_cc37b_76; } ?>