
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_user_check() { global $_check; $zd_3532a_0 = zd_kv_get('zerodream_plugin'); $zd_41015_1 = $zd_3532a_0['key']; $zd_a7c0f_3 = md5('zd_plugin_user_'.$zd_41015_1); if($zd_a7c0f_3!=$_check) zd_plugin_user_message($zd_98e69_6='b02_01', $zd_d4a1f_7); } function zd_plugin_user_message($zd_73d74_0, $zd_b67a7_1) { global $zd_message; if($zd_message['error']) return; $zd_message['error'] = $zd_73d74_0; $zd_message['type'] = $zd_b67a7_1; } ?>