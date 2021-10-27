
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Forbidden'); include _include(ADMIN_PATH.'../plugin/zerodream_plugin/install.func.php'); if(!defined('DEFINED_ZERODREAM_PLUGIN_ZERODREAM_FUNCTION')) include _include(ADMIN_PATH.'../plugin/zerodream_plugin/model/zerodream.func.php'); install_db(); install_dir(); install_data(); install_init(); install_rmdir(); ?>