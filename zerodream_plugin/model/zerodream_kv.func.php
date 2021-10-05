
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_kv__get($zd_312100) { $zd_5c35e1 = db_find_one('zerodream_kv', array('k'=>$zd_312100)); return $zd_5c35e1 ? xn_json_decode($zd_5c35e1['v']) : NULL; } function zd_kv_get($zd_54c020) { static $zd_9dc3c1 = array(); strlen($zd_54c020) > 32 AND $zd_54c020 = md5($zd_54c020); if(!isset($zd_9dc3c1[$zd_54c020])) $zd_9dc3c1[$zd_54c020] = zd_kv__get($zd_54c020); return $zd_9dc3c1[$zd_54c020]; } function zd_kv_set($zd_ce3190, $zd_dc5ab1, $zd_09e5d2 = 0) { strlen($zd_ce3190) > 32 AND $zd_ce3190 = md5($zd_ce3190); $zd_1338a6 = array('k'=>$zd_ce3190, 'v'=>xn_json_encode($zd_dc5ab1)); $zd_f09129 = db_replace('zerodream_kv', $zd_1338a6); return $zd_f09129; } function zd_kv_delete($zd_071fc0) { strlen($zd_071fc0) > 32 AND $zd_071fc0 = md5($zd_071fc0); $zd_f35334 = db_delete('zerodream_kv', array('k'=>$zd_071fc0)); return $zd_f35334; } ?>