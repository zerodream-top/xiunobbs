
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_conf() { global $zd_plugin_conf; $zd_plugin_conf['cache_time'] = 10*24*60*60; } function zd_plugin_url_record_put($url_record) { $zd_e1896_0 = '../data/zerodream_plugin/url_record.json'; $zd_3ef15_1 = json_encode($url_record); file_put_contents($zd_e1896_0, $zd_3ef15_1); } function zd_plugin_url_record_get() { static $zd_22b7a_0 = array(); if(empty($zd_22b7a_0)) { $zd_30391_2 = '../data/zerodream_plugin/url_record.json'; $zd_f4148_3 = file_get_contents($zd_30391_2); $zd_22b7a_0 = json_decode($zd_f4148_3, true); } return $zd_22b7a_0; } function zd_plugin_zerodream_plugin_dir_existence() { if(!is_dir('../data/')) return false; if(!is_dir('../data/zerodream_plugin/')) return false; if(!is_dir('../data/zerodream_plugin/cache/')) return false; if(!is_dir('../data/zerodream_plugin/check/')) return false; if(!is_dir('../data/zerodream_plugin/download/')) return false; if(!is_dir('../data/zerodream_plugin/tmp/')) return false; else return true; } function zd_plugin_zerodream_plugin_md5_file() { $zd_4ad1a_0 = '../plugin/zerodream_plugin'; $zd_3f0f2_1 = array($zd_4ad1a_0.'/conf.json'); $zd_0c0f8_3 = zd_md5_file($zd_4ad1a_0, $zd_3f0f2_1); $zd_4ad1a_0 = $zd_4ad1a_0.'/conf.json'; $zd_05f14_8 = file_get_contents($zd_4ad1a_0); $zd_3a776_10 = json_decode($zd_05f14_8, true); $zd_faaf5_12 = array('installed', 'enable'); $zd_8f82f_13 = ''; foreach($zd_3a776_10 as $zd_7af3b_15=>$zd_ff01b_16) { if(!in_array($zd_7af3b_15, $zd_faaf5_12)) { if(is_array($zd_ff01b_16)) $zd_ff01b_16 = json_encode($zd_ff01b_16); $zd_8f82f_13 = md5($zd_8f82f_13.$zd_ff01b_16); } } $zd_c9f18_25 = md5($zd_0c0f8_3.$zd_8f82f_13); return $zd_c9f18_25; } ?>