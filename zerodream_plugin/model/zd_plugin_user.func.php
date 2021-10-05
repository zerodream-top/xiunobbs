
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_user_check() { global $_check; $zd_fe983_0 = zd_kv_get('zerodream_plugin'); $zd_51f4c_1 = $zd_fe983_0['key']; $zd_f2c09_3 = md5('zd_plugin_user_'.$zd_51f4c_1); if($zd_f2c09_3!=$_check) zd_plugin_user_message($zd_d7c4a_6='b02_01', $zd_1732d_7); } function zd_plugin_user_message($error, $type) { global $zd_message; if($zd_message['error']) return; $zd_message['error'] = $error; $zd_message['type'] = $type; } ?>