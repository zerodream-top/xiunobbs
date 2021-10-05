
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_kv__get($zd_d091c_0) { $zd_0dedf_1 = db_find_one('zerodream_kv', array('k'=>$zd_d091c_0)); return $zd_0dedf_1 ? xn_json_decode($zd_0dedf_1['v']) : NULL; } function zd_kv_get($zd_4acfa_0) { static $zd_23282_1 = array(); strlen($zd_4acfa_0) > 32 AND $zd_4acfa_0 = md5($zd_4acfa_0); if(!isset($zd_23282_1[$zd_4acfa_0])) $zd_23282_1[$zd_4acfa_0] = zd_kv__get($zd_4acfa_0); return $zd_23282_1[$zd_4acfa_0]; } function zd_kv_set($zd_497a3_0, $zd_cca9c_1, $zd_96477_2 = 0) { strlen($zd_497a3_0) > 32 AND $zd_497a3_0 = md5($zd_497a3_0); $zd_2bdf5_6 = array('k'=>$zd_497a3_0, 'v'=>xn_json_encode($zd_cca9c_1)); $zd_f86fb_9 = db_replace('zerodream_kv', $zd_2bdf5_6); return $zd_f86fb_9; } function zd_kv_delete($zd_03f20_0) { strlen($zd_03f20_0) > 32 AND $zd_03f20_0 = md5($zd_03f20_0); $zd_bca4a_4 = db_delete('zerodream_kv', array('k'=>$zd_03f20_0)); return $zd_bca4a_4; } ?>