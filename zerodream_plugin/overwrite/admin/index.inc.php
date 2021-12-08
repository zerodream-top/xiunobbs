
<?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Access Denied.'); // hook admin_index_inc_start.php // hook admin_index_menu_before.php // hook admin_index_menu_after.php if(DEBUG < 3) { if($gid != 1) { setcookie('bbs_sid', '', $time - 86400); http_location(url('../user-login')); } admin_token_check(); } $route = param(0, 'index'); // hook admin_index_inc_data.php switch ($route) { // hook admin_index_route_case_start.php case 'index': include _include(ADMIN_PATH.'route/index.php'); break; case 'setting': include _include(ADMIN_PATH.'route/setting.php'); break; case 'forum': include _include(ADMIN_PATH.'route/forum.php'); break; case 'friendlink': include _include(ADMIN_PATH.'route/friendlink.php'); break; case 'group': include _include(ADMIN_PATH.'route/group.php'); break; case 'other': include _include(ADMIN_PATH.'route/other.php'); break; case 'user': include _include(ADMIN_PATH.'route/user.php'); break; case 'thread': include _include(ADMIN_PATH.'route/thread.php'); break; case 'plugin': include _include(ADMIN_PATH.'route/plugin.php'); break; // hook admin_index_route_case_end.php default: // hook admin_index_route_case_default.php include _include(ADMIN_PATH.'route/index.php'); break; } // hook admin_index_inc_end.php ?>
