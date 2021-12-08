
<?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_url_record_put($zd_f0244_0) { $zd_5fe41_1 = APP_PATH.'data/zerodream_plugin/url_record.json'; $zd_2079b_2 = json_encode($zd_f0244_0); file_put_contents($zd_5fe41_1, $zd_2079b_2); } function zd_plugin_url_record_get() { static $zd_831f7_0 = array(); if(empty($zd_831f7_0)) { $zd_3e5ba_2 = APP_PATH.'data/zerodream_plugin/url_record.json'; $zd_9fc0c_3 = file_get_contents($zd_3e5ba_2); $zd_831f7_0 = json_decode($zd_9fc0c_3, true); } return $zd_831f7_0; } function zd_plugin_zerodream_plugin_dir_existence() { if(!is_dir(APP_PATH.'data/')) return false; if(!is_dir(APP_PATH.'data/zerodream_plugin/')) return false; if(!is_dir(APP_PATH.'data/zerodream_plugin/cache/')) return false; if(!is_dir(APP_PATH.'data/zerodream_plugin/check/')) return false; if(!is_dir(APP_PATH.'data/zerodream_plugin/download/')) return false; if(!is_dir(APP_PATH.'data/zerodream_plugin/tmp/')) return false; else return true; } function zd_plugin_zerodream_plugin_md5_file() { $zd_e63fe_0 = APP_PATH.'plugin/zerodream_plugin'; $zd_66b49_1 = array($zd_e63fe_0.'/conf.json'); $zd_591d2_3 = zd_md5_file($zd_e63fe_0, $zd_66b49_1); $zd_e63fe_0 = $zd_e63fe_0.'/conf.json'; $zd_40db9_8 = file_get_contents($zd_e63fe_0); $zd_79d16_10 = json_decode($zd_40db9_8, true); $zd_0bde1_12 = array('installed', 'enable'); $zd_6561a_13 = ''; foreach($zd_79d16_10 as $zd_4fab0_15=>$zd_61a32_16) { if(!in_array($zd_4fab0_15, $zd_0bde1_12)) { if(is_array($zd_61a32_16)) $zd_61a32_16 = json_encode($zd_61a32_16); $zd_6561a_13 = md5($zd_6561a_13.$zd_61a32_16); } } $zd_bae2a_25 = md5($zd_591d2_3.$zd_6561a_13); return $zd_bae2a_25; } ?>