
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_user_check() { global $_check; $zd_832e3_0 = zd_kv_get('zerodream_plugin'); $zd_67957_1 = $zd_832e3_0['key']; $zd_5475b_3 = md5('zd_plugin_user_'.$zd_67957_1); if($zd_5475b_3!=$_check) zd_plugin_user_message($zd_d8769_6='b02_01', $zd_7bc37_7); } function zd_plugin_user_message($zd_0474c_0, $zd_ee05f_1) { global $zd_message; if($zd_message['error']) return; $zd_message['error'] = $zd_0474c_0; $zd_message['type'] = $zd_ee05f_1; } ?>