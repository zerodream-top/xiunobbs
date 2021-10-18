
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_kv__get($k) { $zd_0cd25_0 = db_find_one('zerodream_kv', array('k'=>$k)); return $zd_0cd25_0 ? xn_json_decode($zd_0cd25_0['v']) : NULL; } function zd_kv_get($k) { static $zd_f0526_0 = array(); strlen($k) > 32 AND $k = md5($k); if(!isset($zd_f0526_0[$k])) $zd_f0526_0[$k] = zd_kv__get($k); return $zd_f0526_0[$k]; } function zd_kv_set($k, $v, $life = 0) { strlen($k) > 32 AND $k = md5($k); $zd_0655d_0 = array('k'=>$k, 'v'=>xn_json_encode($v)); $zd_0fc58_1 = db_replace('zerodream_kv', $zd_0655d_0); return $zd_0fc58_1; } function zd_kv_delete($k) { strlen($k) > 32 AND $k = md5($k); $zd_6ea59_0 = db_delete('zerodream_kv', array('k'=>$k)); return $zd_6ea59_0; } ?>