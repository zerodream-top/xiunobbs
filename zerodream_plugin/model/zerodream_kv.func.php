
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_kv__get($k) { $zd_5cec8_0 = db_find_one('zerodream_kv', array('k'=>$k)); return $zd_5cec8_0 ? xn_json_decode($zd_5cec8_0['v']) : NULL; } function zd_kv_get($k) { static $zd_e5a8b_0 = array(); strlen($k) > 32 AND $k = md5($k); if(!isset($zd_e5a8b_0[$k])) $zd_e5a8b_0[$k] = zd_kv__get($k); return $zd_e5a8b_0[$k]; } function zd_kv_set($k, $v, $life = 0) { strlen($k) > 32 AND $k = md5($k); $zd_f0048_0 = array('k'=>$k, 'v'=>xn_json_encode($v)); $zd_6b1f2_1 = db_replace('zerodream_kv', $zd_f0048_0); return $zd_6b1f2_1; } function zd_kv_delete($k) { strlen($k) > 32 AND $k = md5($k); $zd_1910e_0 = db_delete('zerodream_kv', array('k'=>$k)); return $zd_1910e_0; } ?>