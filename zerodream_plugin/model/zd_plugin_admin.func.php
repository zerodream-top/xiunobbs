
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_check_response_phpinfo() { global $conf,$zd_message; if($zd_message['error']) { $zd_00dd1_0 = array('code'=>$zd_message['error']); $zd_ae875_1 = json_encode($zd_00dd1_0); } else { $zd_ae875_1 = phpinfo(); } return $zd_ae875_1; } function zd_plugin_check_response_clear_tmp() { global $conf,$zd_message; if($zd_message['error']) { $zd_fe8eb_0 = array('code'=>$zd_message['error']); } else { rmdir_recusive($conf['tmp_path'], 1); $zd_fe8eb_0 = array('code'=>0); } $zd_4b464_2 = json_encode($zd_fe8eb_0); return $zd_4b464_2; } ?>