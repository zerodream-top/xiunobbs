
<?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Access Denied.'); $page = param(1, 1); // hook index_start.php // hook index_data.php $order = $conf['order_default']; $order != 'tid' AND $order = 'lastpid'; $pagesize = $conf['pagesize']; $active = 'default'; $thread_list_from_default = 1; // hook index_thread_list_before.php if($thread_list_from_default) { $fids = arrlist_values($forumlist_show, 'fid'); $threads = arrlist_sum($forumlist_show, 'threads'); $pagination = pagination(url("$route-{page}"), $threads, $page, $pagesize); // hook thread_find_by_fids_before.php $threadlist = thread_find_by_fids($fids, $page, $pagesize, $order, $threads); // hook thread_find_by_fids_after.php } // hook index_thread_list_after.php if($order == $conf['order_default'] && $page == 1) { $toplist3 = thread_top_find(0); $threadlist = $toplist3 + $threadlist; } thread_list_access_filter($threadlist, $gid); foreach($threadlist as $_tid=>$_thread) { $post_first = reset(post__find(array('tid'=>$_tid,'isfirst'=>1))); // hook index_thread_list_foreach.php } $header['title'] = $conf['sitename']; $header['keywords'] = ''; $header['description'] = $conf['sitebrief']; $_SESSION['fid'] = 0; // hook index_end.php include _include(APP_PATH.'view/htm/index.htm'); ?>