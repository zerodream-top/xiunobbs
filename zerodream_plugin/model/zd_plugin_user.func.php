
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_user_check() { global $_check; $zd_d58dd_0 = zd_kv_get('zerodream_plugin'); $zd_3feff_1 = $zd_d58dd_0['key']; $zd_dd9f3_3 = md5('zd_plugin_user_'.$zd_3feff_1); if($zd_dd9f3_3!=$_check) zd_plugin_user_message($zd_133e7_6='b02_01', $zd_69033_7); } function zd_plugin_user_message($error, $type) { global $zd_message; if($zd_message['error']) return; $zd_message['error'] = $error; $zd_message['type'] = $type; } ?>