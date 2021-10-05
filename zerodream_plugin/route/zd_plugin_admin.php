
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Access Denied.'); $type = param(2); $_check = param(3); include _include(APP_PATH.'plugin/zerodream_plugin/model/zd_plugin_admin.func.php'); if($type=='phpinfo') { zd_plugin_user_check(); echo zd_plugin_check_response_phpinfo(); } elseif($type=='clear_tmp') { zd_plugin_user_check(); echo zd_plugin_check_response_clear_tmp(); } ?>