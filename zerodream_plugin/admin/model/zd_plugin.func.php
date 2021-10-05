
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_conf() { global $zd_plugin_conf; $zd_plugin_conf['cache_time'] = 10*24*60*60; } function zd_plugin_url_record_put($zd_eb3fd_0) { $zd_09fa6_1 = '../data/zerodream_plugin/url_record.json'; $zd_730d5_2 = json_encode($zd_eb3fd_0); file_put_contents($zd_09fa6_1, $zd_730d5_2); } function zd_plugin_url_record_get() { static $zd_4c566_0 = array(); if(empty($zd_4c566_0)) { $zd_30e94_2 = '../data/zerodream_plugin/url_record.json'; $zd_62542_3 = file_get_contents($zd_30e94_2); $zd_4c566_0 = json_decode($zd_62542_3, true); } return $zd_4c566_0; } function zd_plugin_zerodream_plugin_dir_existence() { if(!is_dir('../data/')) return false; if(!is_dir('../data/zerodream_plugin/')) return false; if(!is_dir('../data/zerodream_plugin/cache/')) return false; if(!is_dir('../data/zerodream_plugin/check/')) return false; if(!is_dir('../data/zerodream_plugin/download/')) return false; if(!is_dir('../data/zerodream_plugin/tmp/')) return false; else return true; } function zd_plugin_zerodream_plugin_md5_file() { $zd_53ced_0 = '../plugin/zerodream_plugin'; $zd_80ac1_1 = array($zd_53ced_0.'/conf.json'); $zd_2f51c_3 = zd_md5_file($zd_53ced_0, $zd_80ac1_1); $zd_53ced_0 = $zd_53ced_0.'/conf.json'; $zd_e2c7f_8 = file_get_contents($zd_53ced_0); $zd_3f513_10 = json_decode($zd_e2c7f_8, true); $zd_3da49_12 = array('installed', 'enable'); foreach ($zd_3f513_10 as $zd_23110_14=>$zd_5b8e8_15) { if(!in_array($zd_23110_14, $zd_3da49_12)) { if(is_array($zd_5b8e8_15)) $zd_5b8e8_15 = json_encode($zd_5b8e8_15); $zd_e89f5_21 = md5($zd_e89f5_21.$zd_5b8e8_15); } } $zd_958b8_24 = md5($zd_2f51c_3.$zd_e89f5_21); return $zd_958b8_24; } ?>