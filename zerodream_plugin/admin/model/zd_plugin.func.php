
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_conf() { global $zd_plugin_conf; $zd_plugin_conf['cache_time'] = 10*24*60*60; } function zd_plugin_url_record_put($url_record) { $zd_9012e_0 = '../data/zerodream_plugin/url_record.json'; $zd_c38ea_1 = json_encode($url_record); file_put_contents($zd_9012e_0, $zd_c38ea_1); } function zd_plugin_url_record_get() { static $zd_5d8be_0 = array(); if(empty($zd_5d8be_0)) { $zd_b929c_2 = '../data/zerodream_plugin/url_record.json'; $zd_fd31a_3 = file_get_contents($zd_b929c_2); $zd_5d8be_0 = json_decode($zd_fd31a_3, true); } return $zd_5d8be_0; } function zd_plugin_zerodream_plugin_dir_existence() { if(!is_dir('../data/')) return false; if(!is_dir('../data/zerodream_plugin/')) return false; if(!is_dir('../data/zerodream_plugin/cache/')) return false; if(!is_dir('../data/zerodream_plugin/check/')) return false; if(!is_dir('../data/zerodream_plugin/download/')) return false; if(!is_dir('../data/zerodream_plugin/tmp/')) return false; else return true; } function zd_plugin_zerodream_plugin_md5_file() { $zd_d3fae_0 = '../plugin/zerodream_plugin'; $zd_b240b_1 = array($zd_d3fae_0.'/conf.json'); $zd_c3428_3 = zd_md5_file($zd_d3fae_0, $zd_b240b_1); $zd_d3fae_0 = $zd_d3fae_0.'/conf.json'; $zd_b30c5_8 = file_get_contents($zd_d3fae_0); $zd_5d181_10 = json_decode($zd_b30c5_8, true); $zd_646de_12 = array('installed', 'enable'); $zd_2bd6b_13 = ''; foreach($zd_5d181_10 as $zd_7aba6_15=>$zd_150f2_16) { if(!in_array($zd_7aba6_15, $zd_646de_12)) { if(is_array($zd_150f2_16)) $zd_150f2_16 = json_encode($zd_150f2_16); $zd_2bd6b_13 = md5($zd_2bd6b_13.$zd_150f2_16); } } $zd_6855d_25 = md5($zd_c3428_3.$zd_2bd6b_13); return $zd_6855d_25; } ?>