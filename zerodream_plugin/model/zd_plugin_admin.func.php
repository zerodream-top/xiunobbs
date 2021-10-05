
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_check_response_phpinfo() { global $conf,$zd_message; if($zd_message['error']) { $zd_30b8e0 = array('code'=>$zd_message['error']); $zd_ac0871 = json_encode($zd_30b8e0); } else { $zd_ac0871 = phpinfo(); } return $zd_ac0871; } function zd_plugin_check_response_clear_tmp() { global $conf,$zd_message; if($zd_message['error']) { $zd_c50b10 = array('code'=>$zd_message['error']); } else { rmdir_recusive($conf['tmp_path'], 1); $zd_c50b10 = array('code'=>0); } $zd_31b512 = json_encode($zd_c50b10); return $zd_31b512; } ?>