
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_kv__get($zd_351ab_0) { $zd_e803c_1 = db_find_one('zerodream_kv', array('k'=>$zd_351ab_0)); return $zd_e803c_1 ? xn_json_decode($zd_e803c_1['v']) : NULL; } function zd_kv_get($zd_e81d3_0) { static $zd_fd91b_1 = array(); strlen($zd_e81d3_0) > 32 AND $zd_e81d3_0 = md5($zd_e81d3_0); if(!isset($zd_fd91b_1[$zd_e81d3_0])) $zd_fd91b_1[$zd_e81d3_0] = zd_kv__get($zd_e81d3_0); return $zd_fd91b_1[$zd_e81d3_0]; } function zd_kv_set($zd_8d112_0, $zd_24e20_1, $zd_8c51b_2 = 0) { strlen($zd_8d112_0) > 32 AND $zd_8d112_0 = md5($zd_8d112_0); $zd_55f6f_6 = array('k'=>$zd_8d112_0, 'v'=>xn_json_encode($zd_24e20_1)); $zd_66f33_9 = db_replace('zerodream_kv', $zd_55f6f_6); return $zd_66f33_9; } function zd_kv_delete($zd_a14f6_0) { strlen($zd_a14f6_0) > 32 AND $zd_a14f6_0 = md5($zd_a14f6_0); $zd_43bc4_4 = db_delete('zerodream_kv', array('k'=>$zd_a14f6_0)); return $zd_43bc4_4; } ?>