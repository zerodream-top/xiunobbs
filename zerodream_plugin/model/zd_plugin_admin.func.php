
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_check_response_phpinfo() { global $conf,$zd_message; if($zd_message['error']) { $zd_59e52_0 = array('code'=>$zd_message['error']); $zd_ef3a0_1 = json_encode($zd_59e52_0); } else { $zd_ef3a0_1 = phpinfo(); } return $zd_ef3a0_1; } function zd_plugin_check_response_clear_tmp() { global $conf,$zd_message; if($zd_message['error']) { $zd_2c022_0 = array('code'=>$zd_message['error']); } else { rmdir_recusive($conf['tmp_path'], 1); $zd_2c022_0 = array('code'=>0); } $zd_55e4b_2 = json_encode($zd_2c022_0); return $zd_55e4b_2; } ?>