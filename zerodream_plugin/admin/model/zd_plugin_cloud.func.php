
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_cloud_dir() { $zd_48215_0 = '../data/zerodream_plugin/cache/zd_plugin_cloud/'; if(!is_dir($zd_48215_0)) mkdir($zd_48215_0); } function zd_plugin_cloud_data() { global $conf,$url_rewrite_on,$url_record,$url_request,$zd_kv_zerodream_plugin,$filename_cache,$zd_plugin_cloud; $zd_694f5_0 = zd_request_uri(); $url_rewrite_on = $conf['url_rewrite_on']; $url_record = substr($zd_694f5_0, $url_rewrite_on?14:15); $zd_kv_zerodream_plugin = zd_kv_get('zerodream_plugin'); if(empty($zd_kv_zerodream_plugin['key'])) message(-1, jump('请设置 key', url('plugin-setting-zerodream_plugin').'#key', 3)); $zd_c1725_2 = md5($url_request); $filename_cache = "../data/zerodream_plugin/cache/zd_plugin_cloud/$zd_c1725_2"; $zd_plugin_cloud = array(); } function zd_plugin_cloud_url_record() { global $url_route,$url_record; $zd_9e05c_0 = zd_plugin_url_record_get(); $zd_9e05c_0['zd_plugin_information']['action'] = 'zd_plugin_plugin_cloud'; $zd_9e05c_0['zd_plugin_plugin_cloud']['zd_plugin_information']['url_route'] = $url_route; $zd_9e05c_0['zd_plugin_plugin_cloud'][$url_route]['url_record'] = $url_record; $zd_9e05c_0['zd_plugin_plugin_read']['back_action'] = 'zd_plugin_plugin_cloud'; zd_plugin_url_record_put($zd_9e05c_0); } function zd_plugin_cloud_get_information() { global $information,$zd_kv_zerodream_plugin; $zd_5fa89_0 = $zd_kv_zerodream_plugin['key']; $zd_da325_1 = explode("_", $zd_5fa89_0); $information['uid'] = $zd_da325_1[0]; $information['key'] = $zd_da325_1[1]; $information['check'] = $zd_da325_1[2]; } function zd_plugin_cloud_index() { global $zd_kv_zerodream_plugin; if($zd_kv_zerodream_plugin['cache']) zd_plugin_cloud_cache(); else zd_plugin_cloud_non_cache(); } function zd_plugin_cloud_cache() { global $time,$zd_plugin_conf,$_cache,$filename_cache,$response,$zd_plugin_cloud; $zd_45b76_0 = $zd_plugin_conf['cache_time']; if($_cache) { zd_plugin_cloud_request(); $zd_7085c_1 = $response; file_put_contents($filename_cache, $zd_7085c_1); message(0, '缓存成功'); } if(is_file($filename_cache)) { $response = file_get_contents($filename_cache); } else { zd_plugin_cloud_request(); $zd_7085c_1 = $response; file_put_contents($filename_cache, $zd_7085c_1); } $zd_4fa57_5 = 'zd_plugin_cloud'; $zd_7085c_1 = $response; $zd_48053_7 = zd_data_unzip($zd_4fa57_5, $zd_7085c_1); $zd_7085c_1 = $zd_48053_7['data']; $zd_9d1b4_12 = $zd_48053_7['html']; $zd_82ba0_14 = $zd_48053_7['script']; $zd_900d8_16 = json_decode($zd_7085c_1, true); $zd_6bc4f_18 = $zd_900d8_16['zd_plugin_information']; $zd_fc1b3_20 = $zd_6bc4f_18['cache']; $zd_63c8f_22 = $zd_6bc4f_18['create_time']; $zd_a93a6_24 = zd_kv_get('zerodream_plugin'); $zd_a93a6_24['cache'] = $zd_fc1b3_20; zd_kv_set('zerodream_plugin', $zd_a93a6_24); if(!$zd_fc1b3_20) {zd_plugin_cloud_non_cache();return;} $zd_53ab4_29 = $zd_63c8f_22 + $zd_45b76_0; if($time>=$zd_53ab4_29) { zd_plugin_cloud_request(); $zd_7085c_1 = $response; file_put_contents($filename_cache, $zd_7085c_1); zd_plugin_cloud_cache();return; } $zd_plugin_cloud['cache'] = true; $zd_plugin_cloud['html'] = $zd_9d1b4_12; $zd_plugin_cloud['script'] = $zd_82ba0_14; } function zd_plugin_cloud_non_cache() { global $filename_cache,$response,$zd_plugin_cloud; zd_plugin_cloud_request(); $zd_4ab59_0 = $response; file_put_contents($filename_cache, $zd_4ab59_0); $zd_f0118_2 = 'zd_plugin_cloud'; $zd_4ab59_0 = $response; $zd_78d3e_4 = zd_data_unzip($zd_f0118_2, $zd_4ab59_0); $zd_4ab59_0 = $zd_78d3e_4['data']; $zd_301e1_9 = $zd_78d3e_4['html']; $zd_1b840_11 = $zd_78d3e_4['script']; $zd_f1743_13 = json_decode($zd_4ab59_0, true); $zd_457ce_15 = $zd_f1743_13['zd_plugin_information']; $zd_13dce_17 = $zd_457ce_15['cache']; $zd_2720e_19 = zd_kv_get('zerodream_plugin'); $zd_2720e_19['cache'] = $zd_13dce_17; zd_kv_set('zerodream_plugin', $zd_2720e_19); if($zd_13dce_17) {zd_plugin_cloud_cache();return;} $zd_plugin_cloud['cache'] = false; $zd_plugin_cloud['html'] = $zd_301e1_9; $zd_plugin_cloud['script'] = $zd_1b840_11; } function zd_plugin_cloud_request() { global $url_record,$information,$url_rewrite_on,$url_request,$response; $zd_2b680_0 = $information['uid'].'_'.$information['key']; $zd_12669_1 = md5($information['uid'].'_'.$information['key'].'_'.$information['check']); $zd_a5ad5_2 = '../plugin/zerodream_plugin/conf.json'; $zd_a2d55_3 = file_get_contents($zd_a5ad5_2); $zd_6e194_5 = json_decode($zd_a2d55_3, true); $zd_95213_7 = zd_plugin_zerodream_plugin_md5_file(); $zd_2d9f5_8 = zd_plugin_zerodream_plugin_dir_existence(); $zd_4eb71_9['zd_plugin_information']['key'] = $zd_2b680_0; $zd_4eb71_9['zd_plugin_information']['check_key'] = $zd_12669_1; $zd_4eb71_9['zd_plugin_information']['url_rewrite_on'] = $url_rewrite_on; $zd_4eb71_9['zd_plugin_information']['url_request'] = $url_request; $zd_4eb71_9['zd_plugin_information']['url_record'] = $url_record; $zd_4eb71_9['zd_plugin_information']['zerodream_plugin']['version'] = $zd_6e194_5['version']; $zd_4eb71_9['zd_plugin_information']['zerodream_plugin']['installed'] = $zd_6e194_5['installed']; $zd_4eb71_9['zd_plugin_information']['zerodream_plugin']['enable'] = $zd_6e194_5['enable']; $zd_4eb71_9['zd_plugin_information']['zerodream_plugin_md5'] = $zd_95213_7; $zd_4eb71_9['zd_plugin_information']['zerodream_plugin_dir_existence'] = $zd_2d9f5_8; $zd_8b902_26 = json_encode($zd_4eb71_9); $zd_65a81_28 = 'zd_plugin_cloud'; $zd_e21fd_29 = array('data'=>$zd_8b902_26); $zd_6f371_31 = zd_data_zip($zd_65a81_28, $zd_e21fd_29); $zd_17f95_34 = ZERODREAM_URL.ZD_PLUGIN_URL_VERSION."plugin_cloud"; $zd_e47ef_35 = zd_curl($zd_17f95_34, $zd_6f371_31, array('method'=>'POST')); $zd_3c91d_38 = $zd_e47ef_35['data']; $zd_4b6f2_40 = $zd_e47ef_35['error']; if($zd_4b6f2_40) message(-1, "curl_error: $zd_4b6f2_40"); elseif(empty($zd_3c91d_38)) message(-1, '数据不存在'); $response = $zd_3c91d_38; } ?>