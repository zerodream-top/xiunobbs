
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_user_admin_response_phpinfo() { global $conf,$zd_message; if($zd_message['error']) { $zd_3180c_0 = array('code'=>$zd_message['error']); $zd_fe983_1 = json_encode($zd_3180c_0); } else { $zd_fe983_1 = phpinfo(); } return $zd_fe983_1; } function zd_plugin_user_admin_response_clear_tmp() { global $conf,$zd_message; if($zd_message['error']) { $zd_24bf7_0 = array('code'=>$zd_message['error']); } else { rmdir_recusive($conf['tmp_path'], 1); $zd_24bf7_0 = array('code'=>0); } $zd_15873_2 = json_encode($zd_24bf7_0); return $zd_15873_2; } ?>