
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_check_response_phpinfo() { global $conf,$zd_message; if($zd_message['error']) { $zd_e5dc0_0 = array('code'=>$zd_message['error']); $zd_d76a0_1 = json_encode($zd_e5dc0_0); } else { $zd_d76a0_1 = phpinfo(); } return $zd_d76a0_1; } function zd_plugin_check_response_clear_tmp() { global $conf,$zd_message; if($zd_message['error']) { $zd_4655b_0 = array('code'=>$zd_message['error']); } else { rmdir_recusive($conf['tmp_path'], 1); $zd_4655b_0 = array('code'=>0); } $zd_93626_2 = json_encode($zd_4655b_0); return $zd_93626_2; } ?>