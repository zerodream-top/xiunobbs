
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_conf() { global $zd_plugin_conf; $zd_plugin_conf['cache_time'] = 10*24*60*60; } function zd_plugin_url_record_put($zd_a20c3_0) { $zd_0ac66_1 = '../data/zerodream_plugin/url_record.json'; $zd_e9655_2 = json_encode($zd_a20c3_0); file_put_contents($zd_0ac66_1, $zd_e9655_2); } function zd_plugin_url_record_get() { static $zd_9d11d_0 = array(); if(empty($zd_9d11d_0)) { $zd_3c9e9_2 = '../data/zerodream_plugin/url_record.json'; $zd_193d1_3 = file_get_contents($zd_3c9e9_2); $zd_9d11d_0 = json_decode($zd_193d1_3, true); } return $zd_9d11d_0; } function zd_plugin_zerodream_plugin_dir_existence() { if(!is_dir('../data/')) return false; if(!is_dir('../data/zerodream_plugin/')) return false; if(!is_dir('../data/zerodream_plugin/cache/')) return false; if(!is_dir('../data/zerodream_plugin/check/')) return false; if(!is_dir('../data/zerodream_plugin/download/')) return false; if(!is_dir('../data/zerodream_plugin/tmp/')) return false; else return true; } function zd_plugin_zerodream_plugin_md5_file() { $zd_81256_0 = '../plugin/zerodream_plugin'; $zd_9f404_1 = array($zd_81256_0.'/conf.json'); $zd_cb6a8_3 = zd_md5_file($zd_81256_0, $zd_9f404_1); $zd_81256_0 = $zd_81256_0.'/conf.json'; $zd_a7828_8 = file_get_contents($zd_81256_0); $zd_d4075_10 = json_decode($zd_a7828_8, true); $zd_fa94b_12 = array('installed', 'enable'); foreach ($zd_d4075_10 as $zd_b4718_14=>$zd_3ab4b_15) { if(!in_array($zd_b4718_14, $zd_fa94b_12)) { if(is_array($zd_3ab4b_15)) $zd_3ab4b_15 = json_encode($zd_3ab4b_15); $zd_5a3a9_21 = md5($zd_5a3a9_21.$zd_3ab4b_15); } } $zd_d29a3_24 = md5($zd_cb6a8_3.$zd_5a3a9_21); return $zd_d29a3_24; } ?>