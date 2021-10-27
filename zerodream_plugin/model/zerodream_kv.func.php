
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_kv__get($k) { $zd_d1150_0 = db_find_one('zerodream_kv', array('k'=>$k)); return $zd_d1150_0 ? xn_json_decode($zd_d1150_0['v']) : NULL; } function zd_kv_get($k) { static $zd_2cdf5_0 = array(); strlen($k) > 32 AND $k = md5($k); if(!isset($zd_2cdf5_0[$k])) $zd_2cdf5_0[$k] = zd_kv__get($k); return $zd_2cdf5_0[$k]; } function zd_kv_set($k, $v, $life = 0) { strlen($k) > 32 AND $k = md5($k); $zd_c96f9_0 = array('k'=>$k, 'v'=>xn_json_encode($v)); $zd_0cda2_1 = db_replace('zerodream_kv', $zd_c96f9_0); return $zd_0cda2_1; } function zd_kv_delete($k) { strlen($k) > 32 AND $k = md5($k); $zd_648d6_0 = db_delete('zerodream_kv', array('k'=>$k)); return $zd_648d6_0; } ?>