
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_download_get_information() { global $conf,$information,$url_rewrite_on; $zd_0ba21_0 = zd_kv_get('zerodream_plugin'); $zd_de74c_1 = explode("_", $zd_0ba21_0['key']); $information['uid'] = $zd_de74c_1[0]; $information['key'] = $zd_de74c_1[1]; $information['check'] = $zd_de74c_1[2]; $url_rewrite_on = $conf['url_rewrite_on']; } function zd_plugin_download_check_information() { global $_key,$_check_key,$check_salt,$plugin,$information; $zd_4c7fb_0 = $information['uid'].'_'.$information['key']; $zd_12615_1 = md5($information['check'].$check_salt.$plugin); if($zd_4c7fb_0 != $_key) message(-1, 'error: b01_01'); if($zd_12615_1 != $_check_key) message(-1, 'error: b01_02'); } function zd_plugin_download_request() { global $plugin,$information,$url_rewrite_on,$data_download,$zd_plugin_html,$response; $zd_a9d75_0 = $information['uid'].'_'.$information['key']; $zd_bb405_1 = zd_uniqid(); $zd_bbe2c_2 = md5($information['check'].$zd_bb405_1.$plugin); $zd_dbe26_4 = "../data/zerodream_plugin/check/$zd_bb405_1.download"; $zd_5698e_6 = $zd_bbe2c_2; file_put_contents($zd_dbe26_4, $zd_5698e_6); $zd_c5698_10 = '../plugin/zerodream_plugin/conf.json'; $zd_32743_11 = file_get_contents($zd_c5698_10); $zd_4572c_13 = json_decode($zd_32743_11, true); $zd_a85e9_15 = zd_plugin_zerodream_plugin_md5_file(); $zd_3aff2_16 = zd_plugin_zerodream_plugin_dir_existence(); $zd_73863_17['zd_plugin_information']['key'] = $zd_a9d75_0; $zd_73863_17['zd_plugin_information']['check_salt'] = $zd_bb405_1; $zd_73863_17['zd_plugin_information']['url_rewrite_on'] = $url_rewrite_on; $zd_73863_17['zd_plugin_information']['zerodream_plugin']['version'] = $zd_4572c_13['version']; $zd_73863_17['zd_plugin_information']['zerodream_plugin']['installed'] = $zd_4572c_13['installed']; $zd_73863_17['zd_plugin_information']['zerodream_plugin']['enable'] = $zd_4572c_13['enable']; $zd_73863_17['zd_plugin_information']['zerodream_plugin_md5'] = $zd_a85e9_15; $zd_73863_17['zd_plugin_information']['zerodream_plugin_dir_existence'] = $zd_3aff2_16; $zd_534ff_32 = json_encode($zd_73863_17); $zd_1035f_34 = ZERODREAM_URL.ZD_PLUGIN_URL_VERSION."plugin_download-$plugin.htm"; $zd_409b9_35 = zd_curl($zd_1035f_34, $zd_534ff_32, array('method'=>'POST')); $zd_4032d_38 = $zd_409b9_35['data']; $zd_9f7a5_40 = $zd_409b9_35['error']; if($zd_9f7a5_40) message(-1, "curl_error: $zd_9f7a5_40"); elseif(!$zd_4032d_38) message(-1, '数据不存在'); $response = $zd_4032d_38; } function zd_plugin_download_index() { global $plugin,$url_rewrite_on,$response,$jump_url,$data_download,$zd_plugin_download; $zd_23986_0 = 'zd_plugin_download'; $zd_c92bd_1 = $response; $zd_1a41b_2 = zd_data_unzip($zd_23986_0, $zd_c92bd_1); $zd_c92bd_1 = $zd_1a41b_2['data']; $zd_86a24_7 = json_decode($zd_c92bd_1, true); $zd_f1ad2_9 = $zd_86a24_7['type']; if($zd_f1ad2_9=='html') { $zd_deea2_12 = $zd_1a41b_2['html']; $zd_5757f_14 = $zd_1a41b_2['script']; $zd_plugin_download['html'] = $zd_deea2_12; $zd_plugin_download['script'] = $zd_5757f_14; include _include(APP_PATH.'plugin/zerodream_plugin/admin/view/htm/zd_plugin_download.htm'); } elseif($zd_f1ad2_9=='download') { $zd_79088_19 = $zd_86a24_7['cache']; if($plugin=='zerodream_plugin') { $jump_url = url("plugin-install-$plugin"); } elseif($zd_79088_19) { $zd_66b6c_22 = zd_plugin_url_record_get(); $zd_e1b3c_23 = $zd_66b6c_22['zd_plugin_information']['action']; if($zd_e1b3c_23=='zd_plugin_plugin_list') { $zd_f8d54_26 = $zd_66b6c_22['zd_plugin_plugin_list']['url_record']; $jump_url = ($url_rewrite_on?'':'?')."plugin-$zd_f8d54_26#$plugin"; } elseif($zd_e1b3c_23=='zd_plugin_plugin_cloud') { $zd_e970d_30 = $zd_66b6c_22['zd_plugin_plugin_cloud']['zd_plugin_information']['url_route']; if($zd_e970d_30=='search') { $zd_f8d54_26 = $zd_66b6c_22['zd_plugin_plugin_cloud'][$zd_e970d_30]['url_record']; $jump_url = ($url_rewrite_on?'':'?')."plugin-$zd_f8d54_26#$plugin"; } } elseif($zd_e1b3c_23=='zd_plugin_plugin_read') { $zd_f8d54_26 = $zd_66b6c_22['zd_plugin_plugin_read']['url_record']; $jump_url = ($url_rewrite_on?'':'?')."plugin-$zd_f8d54_26"; } } else { $jump_url = $zd_86a24_7['jump_url']; } $data_download = $zd_1a41b_2['data_download']; zd_plugin_download_plugin(); } } function zd_plugin_download_plugin() { global $plugin,$jump_url,$data_download; $zd_33279_0 = "../plugin/$plugin"; if(is_dir($zd_33279_0)) zd_deldir($zd_33279_0); $zd_dc548_3 = zd_uniqid(); $zd_4f8a4_4 = "../data/zerodream_plugin/download/$zd_dc548_3"; if(is_file($zd_4f8a4_4)) unlink($zd_4f8a4_4); file_put_contents($zd_4f8a4_4, $data_download); $zd_02259_9 = $zd_4f8a4_4; $zd_19d3d_11 = '../plugin/'; zd_unzip($zd_02259_9, $zd_19d3d_11); unlink($zd_4f8a4_4); message(0, jump(lang('zd_plugin_download_successful'), $jump_url, 3)); } ?>