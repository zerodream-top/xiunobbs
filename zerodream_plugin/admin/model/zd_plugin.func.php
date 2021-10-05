
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_conf() { global $zd_plugin_conf; $zd_plugin_conf['cache_time'] = 10*24*60*60; } function zd_plugin_url_record_put($zd_96ba60) { $zd_993001 = '../data/zerodream_plugin/url_record.json'; $zd_f6c5b2 = json_encode($zd_96ba60); file_put_contents($zd_993001, $zd_f6c5b2); } function zd_plugin_url_record_get() { static $zd_9858c0 = array(); if(empty($zd_9858c0)) { $zd_020352 = '../data/zerodream_plugin/url_record.json'; $zd_5db873 = file_get_contents($zd_020352); $zd_9858c0 = json_decode($zd_5db873, true); } return $zd_9858c0; } function zd_plugin_zerodream_plugin_dir_existence() { if(!is_dir('../data/')) return false; if(!is_dir('../data/zerodream_plugin/')) return false; if(!is_dir('../data/zerodream_plugin/cache/')) return false; if(!is_dir('../data/zerodream_plugin/check/')) return false; if(!is_dir('../data/zerodream_plugin/download/')) return false; if(!is_dir('../data/zerodream_plugin/tmp/')) return false; else return true; } function zd_plugin_zerodream_plugin_md5_file() { $zd_254270 = '../plugin/zerodream_plugin'; $zd_f3c5a1 = array($zd_254270.'/conf.json'); $zd_570ef3 = zd_md5_file($zd_254270, $zd_f3c5a1); $zd_254270 = $zd_254270.'/conf.json'; $zd_17d168 = file_get_contents($zd_254270); $zd_d00d810 = json_decode($zd_17d168, true); $zd_a6fbd12 = array('installed', 'enable'); foreach ($zd_d00d810 as $zd_4456414=>$zd_6526b15) { if(!in_array($zd_4456414, $zd_a6fbd12)) { if(is_array($zd_6526b15)) $zd_6526b15 = json_encode($zd_6526b15); $zd_03d8b21 = md5($zd_03d8b21.$zd_6526b15); } } $zd_08f0b24 = md5($zd_570ef3.$zd_03d8b21); return $zd_08f0b24; } ?>