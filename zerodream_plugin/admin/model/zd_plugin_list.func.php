
<?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_list_dir() { $zd_399a4_0 = APP_PATH.'data/zerodream_plugin/cache/zd_plugin_list/'; if(!is_dir($zd_399a4_0)) mkdir($zd_399a4_0); } function zd_plugin_list_data() { global $conf,$action,$orderby,$cateid,$page,$search,$url_rewrite_on,$url_record,$zd_kv_zerodream_plugin,$filename_cache,$zd_plugin_list; $zd_12a37_0 = zd_request_uri(); $url_rewrite_on = $conf['url_rewrite_on']; $url_record = substr($zd_12a37_0, $url_rewrite_on?14:15); $zd_kv_zerodream_plugin = zd_kv_get('zerodream_plugin'); if(empty($zd_kv_zerodream_plugin['key'])) message(-1, jump('请设置 key', url('plugin-setting-zerodream_plugin').'#key', 3)); $zd_bed41_2 = md5($action.$orderby.$cateid.$page.$search); $filename_cache = APP_PATH."data/zerodream_plugin/cache/zd_plugin_list/$zd_bed41_2"; $zd_plugin_list = array(); } function zd_plugin_list_url_record() { global $url_record; $zd_c70c7_0 = zd_plugin_url_record_get(); $zd_c70c7_0['zd_plugin_information']['action'] = 'zd_plugin_list'; $zd_c70c7_0['zd_plugin_plugin_list']['url_record'] = $url_record; $zd_c70c7_0['zd_plugin_plugin_read']['back_action'] = 'zd_plugin_plugin_list'; zd_plugin_url_record_put($zd_c70c7_0); } function zd_plugin_list_get_information() { global $information,$zd_kv_zerodream_plugin; $zd_501f2_0 = $zd_kv_zerodream_plugin['key']; $zd_a4521_1 = explode("_", $zd_501f2_0); $information['uid'] = $zd_a4521_1[0]; $information['key'] = $zd_a4521_1[1]; $information['check'] = $zd_a4521_1[2]; } function zd_plugin_list_index() { global $zd_kv_zerodream_plugin; if($zd_kv_zerodream_plugin['cache']) zd_plugin_list_cache(); else zd_plugin_list_non_cache(); } function zd_plugin_list_cache() { global $time,$zd_plugin_conf,$_cache,$filename_cache,$response,$plugin_list_official,$zd_plugin_list; $zd_5a60d_0 = $zd_plugin_conf['cache_time']; if($_cache) { zd_plugin_list_request(); $zd_d97e3_1 = $response; file_put_contents($filename_cache, $zd_d97e3_1); message(0, '缓存成功'); } if(is_file($filename_cache)) { $response = file_get_contents($filename_cache); } else { zd_plugin_list_request(); $zd_d97e3_1 = $response; file_put_contents($filename_cache, $zd_d97e3_1); } $zd_5ecd2_5 = 'zd_plugin_list'; $zd_d97e3_1 = $response; $zd_b71bd_7 = zd_data_unzip($zd_5ecd2_5, $zd_d97e3_1); $zd_d97e3_1 = $zd_b71bd_7['data']; $zd_db088_12 = $zd_b71bd_7['html']; $zd_89762_14 = $zd_b71bd_7['script']; $zd_6d021_16 = json_decode($zd_d97e3_1, true); $plugin_list_official = $zd_6d021_16['plugin_list']; $zd_702c8_19 = $zd_6d021_16['zd_plugin_information']; $zd_d4826_21 = $zd_702c8_19['cache']; $zd_0e2b0_23 = $zd_702c8_19['create_time']; $zd_7c9f9_25 = zd_kv_get('zerodream_plugin'); $zd_7c9f9_25['cache'] = $zd_d4826_21; zd_kv_set('zerodream_plugin', $zd_7c9f9_25); if(!$zd_d4826_21) {zd_plugin_list_non_cache();return;} $zd_26eed_30 = $zd_0e2b0_23 + $zd_5a60d_0; if($time>=$zd_26eed_30) { zd_plugin_list_request(); $zd_d97e3_1 = $response; file_put_contents($filename_cache, $zd_d97e3_1); zd_plugin_list_cache();return; } zd_plugin_list_cache_data(); $zd_plugin_list['cache'] = true; $zd_plugin_list['html'] = $zd_db088_12; $zd_plugin_list['script'] = $zd_89762_14; } function zd_plugin_list_cache_data() { global $plugin_list_official,$zd_plugin_list; foreach($plugin_list_official as $zd_f8c5c_0=>$zd_aa986_1) { $zd_4deae_2 = APP_PATH."plugin/$zd_f8c5c_0/conf.json"; $zd_a7b92_4 = file_get_contents($zd_4deae_2); $zd_f635a_6 = json_decode($zd_a7b92_4, true); if(is_array($zd_f635a_6) && !$zd_aa986_1['plugin_state']['illegal']) { $zd_b21b5_10 = APP_PATH."plugin/$zd_f8c5c_0/setting.php"; $zd_plugin_list['plugin_list'][$zd_f8c5c_0]['downloaded'] = true; $zd_plugin_list['plugin_list'][$zd_f8c5c_0]['name'] = $zd_f635a_6['name']; $zd_plugin_list['plugin_list'][$zd_f8c5c_0]['installed_url'] = !$zd_f635a_6['installed'] ? url("plugin-install-$zd_f8c5c_0") : false; $zd_plugin_list['plugin_list'][$zd_f8c5c_0]['setting_url'] = is_file($zd_b21b5_10) ? url("plugin-setting-$zd_f8c5c_0") : false; $zd_plugin_list['plugin_list'][$zd_f8c5c_0]['disable_url'] = $zd_f635a_6['enable'] ? url("plugin-disable-$zd_f8c5c_0") : false; $zd_plugin_list['plugin_list'][$zd_f8c5c_0]['enable_url'] = !$zd_f635a_6['enable'] ? url("plugin-enable-$zd_f8c5c_0") : false; $zd_plugin_list['plugin_list'][$zd_f8c5c_0]['unstall_url'] = url("plugin-unstall-$zd_f8c5c_0"); $zd_6a394_29 = $zd_aa986_1['lastversion']; $zd_edd33_31 = $zd_f635a_6['version']; if(version_compare($zd_edd33_31, $zd_6a394_29, '<')) { $zd_plugin_list['plugin_list'][$zd_f8c5c_0]['upgrade_url'] = $zd_aa986_1['upgrade_url']; $zd_plugin_list['plugin_list'][$zd_f8c5c_0]['version_official'] = $zd_6a394_29; } else { $zd_plugin_list['plugin_list'][$zd_f8c5c_0]['upgrade_url'] = false; } $zd_plugin_list['plugin_list'][$zd_f8c5c_0]['version_local'] = $zd_edd33_31; } else { $zd_plugin_list['plugin_list'][$zd_f8c5c_0]['downloaded'] = false; } } } function zd_plugin_list_non_cache() { global $filename_cache,$response,$zd_plugin_list; zd_plugin_list_request(); $zd_61a42_0 = $response; file_put_contents($filename_cache, $zd_61a42_0); $zd_2c62e_2 = 'zd_plugin_list'; $zd_61a42_0 = $response; $zd_b3f9a_4 = zd_data_unzip($zd_2c62e_2, $zd_61a42_0); $zd_61a42_0 = $zd_b3f9a_4['data']; $zd_0c69a_9 = $zd_b3f9a_4['html']; $zd_f1072_11 = $zd_b3f9a_4['script']; $zd_f86ff_13 = json_decode($zd_61a42_0, true); $zd_9a4f8_15 = $zd_f86ff_13['zd_plugin_information']; $zd_5a78f_17 = $zd_9a4f8_15['cache']; $zd_b532f_19 = zd_kv_get('zerodream_plugin'); $zd_b532f_19['cache'] = $zd_5a78f_17; zd_kv_set('zerodream_plugin', $zd_b532f_19); if($zd_5a78f_17) {zd_plugin_list_cache();return;} $zd_plugin_list['cache'] = false; $zd_plugin_list['html'] = $zd_0c69a_9; $zd_plugin_list['script'] = $zd_f1072_11; } function zd_plugin_list_request() { global $action,$orderby,$cateid,$page,$search,$url_record,$information,$url_rewrite_on,$response; $zd_60d23_0 = $information['uid'].'_'.$information['key']; $zd_2d3de_1 = md5($information['uid'].'_'.$information['key'].'_'.$information['check']); $zd_98165_2 = APP_PATH.'plugin/'; $zd_a34e2_3 = scandir($zd_98165_2); $zd_26a78_5 = ''; foreach($zd_a34e2_3 as $zd_67887_7=>$zd_50d26_8) { if($zd_50d26_8!='.' && $zd_50d26_8!='..') { $zd_6c94f_11 = $zd_98165_2.$zd_50d26_8.'/conf.json'; $zd_c2d8f_14 = file_get_contents($zd_6c94f_11); $zd_a25ed_16 = json_decode($zd_c2d8f_14, true); if(is_array($zd_a25ed_16)) { $zd_26a78_5 .= $zd_50d26_8.'|'; $zd_26a78_5 .= $zd_a25ed_16['version'].'|'; $zd_26a78_5 .= $zd_a25ed_16['installed']; $zd_26a78_5 .= $zd_a25ed_16['enable']; $zd_60473_27 = $zd_98165_2.$zd_50d26_8.'/setting.php'; if(is_file($zd_60473_27)) $zd_26a78_5 .= 1; $zd_26a78_5 .= ';'; } } } $zd_1c734_33 = 'zd_plugin_list'; $zd_7c8fe_34 = array('local_plugins'=>$zd_26a78_5); $zd_96a79_36 = zd_data_zip($zd_1c734_33, $zd_7c8fe_34); $zd_657d3_39 = APP_PATH.'plugin/zerodream_plugin/conf.json'; $zd_d8181_40 = file_get_contents($zd_657d3_39); $zd_f7e31_42 = json_decode($zd_d8181_40, true); $zd_f4140_44 = zd_plugin_zerodream_plugin_md5_file(); $zd_501e5_45 = zd_plugin_zerodream_plugin_dir_existence(); $zd_15202_46['zd_plugin_information']['key'] = $zd_60d23_0; $zd_15202_46['zd_plugin_information']['check_key'] = $zd_2d3de_1; $zd_15202_46['zd_plugin_information']['url_rewrite_on'] = $url_rewrite_on; $zd_15202_46['zd_plugin_information']['action'] = $action; $zd_15202_46['zd_plugin_information']['orderby'] = $orderby; $zd_15202_46['zd_plugin_information']['cateid'] = $cateid; $zd_15202_46['zd_plugin_information']['page'] = $page; $zd_15202_46['zd_plugin_information']['search'] = $search; $zd_15202_46['zd_plugin_information']['url_record'] = $url_record; $zd_15202_46['zd_plugin_information']['zerodream_plugin']['version'] = $zd_f7e31_42['version']; $zd_15202_46['zd_plugin_information']['zerodream_plugin']['installed'] = $zd_f7e31_42['installed']; $zd_15202_46['zd_plugin_information']['zerodream_plugin']['enable'] = $zd_f7e31_42['enable']; $zd_15202_46['zd_plugin_information']['zerodream_plugin_md5'] = $zd_f4140_44; $zd_15202_46['zd_plugin_information']['zerodream_plugin_dir_existence'] = $zd_501e5_45; $zd_c2d8f_14 = json_encode($zd_15202_46); $zd_f8eb7_69 = $zd_c2d8f_14.'__zd_plugin_list_explode__'.$zd_96a79_36; if($search) { $cateid = 0; $zd_b0f8f_72 = ZERODREAM_URL.ZD_PLUGIN_URL_VERSION."plugin_list.htm"; } else { $zd_b0f8f_72 = ZERODREAM_URL.ZD_PLUGIN_URL_VERSION."plugin_list-$action-$orderby-$cateid-$page.htm"; } $zd_05c13_74 = zd_curl($zd_b0f8f_72, $zd_f8eb7_69, array('method'=>'POST')); $zd_e3d61_77 = $zd_05c13_74['data']; $zd_5f3f1_79 = $zd_05c13_74['error']; if($zd_5f3f1_79) message(-1, "curl_error: $zd_5f3f1_79"); elseif(empty($zd_e3d61_77)) message(-1, '数据不存在'); $response = $zd_e3d61_77; } ?>