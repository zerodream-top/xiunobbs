
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Access Denied.'); // hook index_inc_start.php $sid = sess_start(); $_SERVER['lang'] = $lang = include _include(APP_PATH."lang/$conf[lang]/bbs.php"); $grouplist = group_list_cache(); $uid = intval(_SESSION('uid')); empty($uid) AND $uid = user_token_get() AND $_SESSION['uid'] = $uid; $user = user_read($uid); $gid = empty($user) ? 0 : intval($user['gid']); $group = isset($grouplist[$gid]) ? $grouplist[$gid] : $grouplist[0]; $fid = 0; $forumlist = forum_list_cache(); $forumlist_show = forum_list_access_filter($forumlist, $gid); $forumarr = arrlist_key_values($forumlist_show, 'fid', 'name'); $header = array( 'title'=>$conf['sitename'], 'mobile_title'=>'', 'mobile_link'=>'./', 'keywords'=>'', 'description'=>strip_tags($conf['sitebrief']), 'navs'=>array(), ); $runtime = runtime_init(); check_runlevel(); $route = param(0, 'index'); // hook index_inc_data.php // hook index_inc_route_before.php if(!defined('SKIP_ROUTE')) { switch ($route) { // hook index_route_case_start.php case 'index': include _include(APP_PATH.'route/index.php'); break; case 'thread': include _include(APP_PATH.'route/thread.php'); break; case 'forum': include _include(APP_PATH.'route/forum.php'); break; case 'user': include _include(APP_PATH.'route/user.php'); break; case 'my': include _include(APP_PATH.'route/my.php'); break; case 'attach': include _include(APP_PATH.'route/attach.php'); break; case 'post': include _include(APP_PATH.'route/post.php'); break; case 'mod': include _include(APP_PATH.'route/mod.php'); break; case 'browser': include _include(APP_PATH.'route/browser.php'); break; // hook index_route_case_end.php default: // hook index_route_case_default.php include _include(APP_PATH.'route/index.php'); break; } } // hook index_inc_route_after.php // hook index_inc_end.php ?>