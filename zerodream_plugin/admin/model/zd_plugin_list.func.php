
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_list_dir() { $zd_ad5e1_0 = '../data/zerodream_plugin/cache/zd_plugin_list/'; if(!is_dir($zd_ad5e1_0)) mkdir($zd_ad5e1_0); } function zd_plugin_list_data() { global $conf,$action,$orderby,$cateid,$page,$search,$url_rewrite_on,$url_record,$zd_kv_zerodream_plugin,$filename_cache,$zd_plugin_list; $zd_d63f3_0 = zd_request_uri(); $url_rewrite_on = $conf['url_rewrite_on']; $url_record = substr($zd_d63f3_0, $url_rewrite_on?14:15); $zd_kv_zerodream_plugin = zd_kv_get('zerodream_plugin'); if(empty($zd_kv_zerodream_plugin['key'])) message(-1, jump('请设置 key', url('plugin-setting-zerodream_plugin').'#key', 3)); $zd_93bfe_2 = md5($action.$orderby.$cateid.$page.$search); $filename_cache = "../data/zerodream_plugin/cache/zd_plugin_list/$zd_93bfe_2"; $zd_plugin_list = array(); } function zd_plugin_list_url_record() { global $url_record; $zd_9ea96_0 = zd_plugin_url_record_get(); $zd_9ea96_0['zd_plugin_information']['action'] = 'zd_plugin_list'; $zd_9ea96_0['zd_plugin_plugin_list']['url_record'] = $url_record; $zd_9ea96_0['zd_plugin_plugin_read']['back_action'] = 'zd_plugin_plugin_list'; zd_plugin_url_record_put($zd_9ea96_0); } function zd_plugin_list_get_information() { global $information,$zd_kv_zerodream_plugin; $zd_3d32a_0 = $zd_kv_zerodream_plugin['key']; $zd_d59b0_1 = explode("_", $zd_3d32a_0); $information['uid'] = $zd_d59b0_1[0]; $information['key'] = $zd_d59b0_1[1]; $information['check'] = $zd_d59b0_1[2]; } function zd_plugin_list_index() { global $zd_kv_zerodream_plugin; if($zd_kv_zerodream_plugin['cache']) zd_plugin_list_cache(); else zd_plugin_list_non_cache(); } function zd_plugin_list_cache() { global $time,$zd_plugin_conf,$_cache,$filename_cache,$response,$plugin_list_official,$zd_plugin_list; $zd_c48f8_0 = $zd_plugin_conf['cache_time']; if($_cache) { zd_plugin_list_request(); $zd_61aec_1 = $response; file_put_contents($filename_cache, $zd_61aec_1); message(0, '缓存成功'); } if(is_file($filename_cache)) { $response = file_get_contents($filename_cache); } else { zd_plugin_list_request(); $zd_61aec_1 = $response; file_put_contents($filename_cache, $zd_61aec_1); } $zd_33cdf_5 = 'zd_plugin_list'; $zd_61aec_1 = $response; $zd_ccfa8_7 = zd_data_unzip($zd_33cdf_5, $zd_61aec_1); $zd_61aec_1 = $zd_ccfa8_7['data']; $zd_27cac_12 = $zd_ccfa8_7['html']; $zd_290d8_14 = $zd_ccfa8_7['script']; $zd_c9809_16 = json_decode($zd_61aec_1, true); $plugin_list_official = $zd_c9809_16['plugin_list']; $zd_26245_19 = $zd_c9809_16['zd_plugin_information']; $zd_a356b_21 = $zd_26245_19['cache']; $zd_27200_23 = $zd_26245_19['create_time']; $zd_4acbe_25 = zd_kv_get('zerodream_plugin'); $zd_4acbe_25['cache'] = $zd_a356b_21; zd_kv_set('zerodream_plugin', $zd_4acbe_25); if(!$zd_a356b_21) {zd_plugin_list_non_cache();return;} $zd_3ced0_30 = $zd_27200_23 + $zd_c48f8_0; if($time>=$zd_3ced0_30) { zd_plugin_list_request(); $zd_61aec_1 = $response; file_put_contents($filename_cache, $zd_61aec_1); zd_plugin_list_cache();return; } zd_plugin_list_cache_data(); $zd_plugin_list['cache'] = true; $zd_plugin_list['html'] = $zd_27cac_12; $zd_plugin_list['script'] = $zd_290d8_14; } function zd_plugin_list_cache_data() { global $plugin_list_official,$zd_plugin_list; foreach($plugin_list_official as $zd_38486_0=>$zd_32313_1) { $zd_6b910_2 = "../plugin/$zd_38486_0/conf.json"; $zd_9c611_4 = file_get_contents($zd_6b910_2); $zd_ecdff_6 = json_decode($zd_9c611_4, true); if(is_array($zd_ecdff_6) && !$zd_32313_1['plugin_state']['illegal']) { $zd_3a9a6_10 = "../plugin/$zd_38486_0/setting.php"; $zd_plugin_list['plugin_list'][$zd_38486_0]['downloaded'] = true; $zd_plugin_list['plugin_list'][$zd_38486_0]['name'] = $zd_ecdff_6['name']; $zd_plugin_list['plugin_list'][$zd_38486_0]['installed_url'] = !$zd_ecdff_6['installed'] ? url("plugin-install-$zd_38486_0") : false; $zd_plugin_list['plugin_list'][$zd_38486_0]['setting_url'] = is_file($zd_3a9a6_10) ? url("plugin-setting-$zd_38486_0") : false; $zd_plugin_list['plugin_list'][$zd_38486_0]['disable_url'] = $zd_ecdff_6['enable'] ? url("plugin-disable-$zd_38486_0") : false; $zd_plugin_list['plugin_list'][$zd_38486_0]['enable_url'] = !$zd_ecdff_6['enable'] ? url("plugin-enable-$zd_38486_0") : false; $zd_plugin_list['plugin_list'][$zd_38486_0]['unstall_url'] = url("plugin-unstall-$zd_38486_0"); $zd_728d9_29 = $zd_32313_1['lastversion']; $zd_853c3_31 = $zd_ecdff_6['version']; if(version_compare($zd_853c3_31, $zd_728d9_29, '<')) { $zd_plugin_list['plugin_list'][$zd_38486_0]['upgrade_url'] = $zd_32313_1['upgrade_url']; $zd_plugin_list['plugin_list'][$zd_38486_0]['version_official'] = $zd_728d9_29; } else { $zd_plugin_list['plugin_list'][$zd_38486_0]['upgrade_url'] = false; } $zd_plugin_list['plugin_list'][$zd_38486_0]['version_local'] = $zd_853c3_31; } else { $zd_plugin_list['plugin_list'][$zd_38486_0]['downloaded'] = false; } } } function zd_plugin_list_non_cache() { global $filename_cache,$response,$zd_plugin_list; zd_plugin_list_request(); $zd_ebfc2_0 = $response; file_put_contents($filename_cache, $zd_ebfc2_0); $zd_ec948_2 = 'zd_plugin_list'; $zd_ebfc2_0 = $response; $zd_0442e_4 = zd_data_unzip($zd_ec948_2, $zd_ebfc2_0); $zd_ebfc2_0 = $zd_0442e_4['data']; $zd_499a7_9 = $zd_0442e_4['html']; $zd_75244_11 = $zd_0442e_4['script']; $zd_1b651_13 = json_decode($zd_ebfc2_0, true); $zd_c0985_15 = $zd_1b651_13['zd_plugin_information']; $zd_50b39_17 = $zd_c0985_15['cache']; $zd_e9767_19 = zd_kv_get('zerodream_plugin'); $zd_e9767_19['cache'] = $zd_50b39_17; zd_kv_set('zerodream_plugin', $zd_e9767_19); if($zd_50b39_17) {zd_plugin_list_cache();return;} $zd_plugin_list['cache'] = false; $zd_plugin_list['html'] = $zd_499a7_9; $zd_plugin_list['script'] = $zd_75244_11; } function zd_plugin_list_request() { global $action,$orderby,$cateid,$page,$search,$url_record,$information,$url_rewrite_on,$response; $zd_9eb77_0 = $information['uid'].'_'.$information['key']; $zd_e1da0_1 = md5($information['uid'].'_'.$information['key'].'_'.$information['check']); $zd_55d63_2 = '../plugin/'; $zd_3b682_3 = scandir($zd_55d63_2); $zd_568f5_5 = ''; foreach($zd_3b682_3 as $zd_af599_7=>$zd_21676_8) { if($zd_21676_8!='.' && $zd_21676_8!='..') { $zd_8d1be_11 = $zd_55d63_2.$zd_21676_8.'/conf.json'; $zd_4232c_14 = file_get_contents($zd_8d1be_11); $zd_45344_16 = json_decode($zd_4232c_14, true); if(is_array($zd_45344_16)) { $zd_568f5_5 .= $zd_21676_8.'|'; $zd_568f5_5 .= $zd_45344_16['version'].'|'; $zd_568f5_5 .= $zd_45344_16['installed']; $zd_568f5_5 .= $zd_45344_16['enable']; $zd_64f14_27 = $zd_55d63_2.$zd_21676_8.'/setting.php'; if(is_file($zd_64f14_27)) $zd_568f5_5 .= 1; $zd_568f5_5 .= ';'; } } } $zd_d5ff6_33 = 'zd_plugin_list'; $zd_ca1c7_34 = array('local_plugins'=>$zd_568f5_5); $zd_cf38b_36 = zd_data_zip($zd_d5ff6_33, $zd_ca1c7_34); $zd_46f5c_39 = '../plugin/zerodream_plugin/conf.json'; $zd_ac540_40 = file_get_contents($zd_46f5c_39); $zd_af292_42 = json_decode($zd_ac540_40, true); $zd_631fb_44 = zd_plugin_zerodream_plugin_md5_file(); $zd_e19a1_45 = zd_plugin_zerodream_plugin_dir_existence(); $zd_41721_46['zd_plugin_information']['key'] = $zd_9eb77_0; $zd_41721_46['zd_plugin_information']['check_key'] = $zd_e1da0_1; $zd_41721_46['zd_plugin_information']['url_rewrite_on'] = $url_rewrite_on; $zd_41721_46['zd_plugin_information']['action'] = $action; $zd_41721_46['zd_plugin_information']['orderby'] = $orderby; $zd_41721_46['zd_plugin_information']['cateid'] = $cateid; $zd_41721_46['zd_plugin_information']['page'] = $page; $zd_41721_46['zd_plugin_information']['search'] = $search; $zd_41721_46['zd_plugin_information']['url_record'] = $url_record; $zd_41721_46['zd_plugin_information']['zerodream_plugin']['version'] = $zd_af292_42['version']; $zd_41721_46['zd_plugin_information']['zerodream_plugin']['installed'] = $zd_af292_42['installed']; $zd_41721_46['zd_plugin_information']['zerodream_plugin']['enable'] = $zd_af292_42['enable']; $zd_41721_46['zd_plugin_information']['zerodream_plugin_md5'] = $zd_631fb_44; $zd_41721_46['zd_plugin_information']['zerodream_plugin_dir_existence'] = $zd_e19a1_45; $zd_4232c_14 = json_encode($zd_41721_46); $zd_4a944_69 = $zd_4232c_14.'__zd_plugin_list_explode__'.$zd_cf38b_36; if($search) { $cateid = 0; $zd_e9cd5_72 = ZERODREAM_URL.ZD_PLUGIN_URL_VERSION."plugin_list.htm"; } else { $zd_e9cd5_72 = ZERODREAM_URL.ZD_PLUGIN_URL_VERSION."plugin_list-$action-$orderby-$cateid-$page.htm"; } $zd_36d53_74 = zd_curl($zd_e9cd5_72, $zd_4a944_69, array('method'=>'POST')); $zd_8ba7d_77 = $zd_36d53_74['data']; $zd_44410_79 = $zd_36d53_74['error']; if($zd_44410_79) message(-1, "curl_error: $zd_44410_79"); elseif(empty($zd_8ba7d_77)) message(-1, '数据不存在'); $response = $zd_8ba7d_77; } ?>