
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_user_check() { global $_check; $zd_ba8480 = zd_kv_get('zerodream_plugin'); $zd_071ce1 = $zd_ba8480['key']; $zd_d8f7c3 = md5('zd_plugin_user_'.$zd_071ce1); if($zd_d8f7c3!=$_check) zd_plugin_user_message($zd_77dbb6='b02_01', $zd_62afe7); } function zd_plugin_user_message($zd_05e1c0, $zd_d0fa51) { global $zd_message; if($zd_message['error']) return; $zd_message['error'] = $zd_05e1c0; $zd_message['type'] = $zd_d0fa51; } ?>