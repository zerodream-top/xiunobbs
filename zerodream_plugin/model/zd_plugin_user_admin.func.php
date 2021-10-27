
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_user_admin_response_phpinfo() { global $conf,$zd_message; if($zd_message['error']) { $zd_050ed_0 = array('code'=>$zd_message['error']); $zd_cbe3d_1 = json_encode($zd_050ed_0); } else { $zd_cbe3d_1 = phpinfo(); } return $zd_cbe3d_1; } function zd_plugin_user_admin_response_clear_tmp() { global $conf,$zd_message; if($zd_message['error']) { $zd_a804b_0 = array('code'=>$zd_message['error']); } else { rmdir_recusive($conf['tmp_path'], 1); $zd_a804b_0 = array('code'=>0); } $zd_4e402_2 = json_encode($zd_a804b_0); return $zd_4e402_2; } ?>