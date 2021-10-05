
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_conf() { global $zd_plugin_conf; $zd_plugin_conf['cache_time'] = 10*24*60*60; } function zd_plugin_url_record_put($url_record) { $zd_b9bbe_0 = '../data/zerodream_plugin/url_record.json'; $zd_fa3da_1 = json_encode($url_record); file_put_contents($zd_b9bbe_0, $zd_fa3da_1); } function zd_plugin_url_record_get() { static $zd_3a0ce_0 = array(); if(empty($zd_3a0ce_0)) { $zd_4167b_2 = '../data/zerodream_plugin/url_record.json'; $zd_190ef_3 = file_get_contents($zd_4167b_2); $zd_3a0ce_0 = json_decode($zd_190ef_3, true); } return $zd_3a0ce_0; } function zd_plugin_zerodream_plugin_dir_existence() { if(!is_dir('../data/')) return false; if(!is_dir('../data/zerodream_plugin/')) return false; if(!is_dir('../data/zerodream_plugin/cache/')) return false; if(!is_dir('../data/zerodream_plugin/check/')) return false; if(!is_dir('../data/zerodream_plugin/download/')) return false; if(!is_dir('../data/zerodream_plugin/tmp/')) return false; else return true; } function zd_plugin_zerodream_plugin_md5_file() { $zd_2c4a9_0 = '../plugin/zerodream_plugin'; $zd_9d968_1 = array($zd_2c4a9_0.'/conf.json'); $zd_937e6_3 = zd_md5_file($zd_2c4a9_0, $zd_9d968_1); $zd_2c4a9_0 = $zd_2c4a9_0.'/conf.json'; $zd_dc973_8 = file_get_contents($zd_2c4a9_0); $zd_f0048_10 = json_decode($zd_dc973_8, true); $zd_74e0e_12 = array('installed', 'enable'); foreach ($zd_f0048_10 as $zd_aff81_14=>$zd_eb4c9_15) { if(!in_array($zd_aff81_14, $zd_74e0e_12)) { if(is_array($zd_eb4c9_15)) $zd_eb4c9_15 = json_encode($zd_eb4c9_15); $zd_366c8_21 = md5($zd_366c8_21.$zd_eb4c9_15); } } $zd_ad334_24 = md5($zd_937e6_3.$zd_366c8_21); return $zd_ad334_24; } ?>