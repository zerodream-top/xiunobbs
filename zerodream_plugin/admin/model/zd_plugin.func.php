
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_conf() { global $zd_plugin_conf; $zd_plugin_conf['cache_time'] = 10*24*60*60; } function zd_plugin_url_record_put($url_record) { $zd_41201_0 = '../data/zerodream_plugin/url_record.json'; $zd_515ca_1 = json_encode($url_record); file_put_contents($zd_41201_0, $zd_515ca_1); } function zd_plugin_url_record_get() { static $zd_15c1c_0 = array(); if(empty($zd_15c1c_0)) { $zd_8a7a6_2 = '../data/zerodream_plugin/url_record.json'; $zd_d0aae_3 = file_get_contents($zd_8a7a6_2); $zd_15c1c_0 = json_decode($zd_d0aae_3, true); } return $zd_15c1c_0; } function zd_plugin_zerodream_plugin_dir_existence() { if(!is_dir('../data/')) return false; if(!is_dir('../data/zerodream_plugin/')) return false; if(!is_dir('../data/zerodream_plugin/cache/')) return false; if(!is_dir('../data/zerodream_plugin/check/')) return false; if(!is_dir('../data/zerodream_plugin/download/')) return false; if(!is_dir('../data/zerodream_plugin/tmp/')) return false; else return true; } function zd_plugin_zerodream_plugin_md5_file() { $zd_0cac7_0 = '../plugin/zerodream_plugin'; $zd_7e9fc_1 = array($zd_0cac7_0.'/conf.json'); $zd_21b80_3 = zd_md5_file($zd_0cac7_0, $zd_7e9fc_1); $zd_0cac7_0 = $zd_0cac7_0.'/conf.json'; $zd_e2880_8 = file_get_contents($zd_0cac7_0); $zd_45ac5_10 = json_decode($zd_e2880_8, true); $zd_bc4c8_12 = array('installed', 'enable'); foreach ($zd_45ac5_10 as $zd_aa4e3_14=>$zd_bb9f4_15) { if(!in_array($zd_aa4e3_14, $zd_bc4c8_12)) { if(is_array($zd_bb9f4_15)) $zd_bb9f4_15 = json_encode($zd_bb9f4_15); $zd_03198_21 = md5($zd_03198_21.$zd_bb9f4_15); } } $zd_3a9a4_24 = md5($zd_21b80_3.$zd_03198_21); return $zd_3a9a4_24; } ?>