
<?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Access Denied.'); // hook forum_start.php $fid = param(1, 0); $page = param(2, 1); $orderby = param('orderby'); $extra = array(); // hook forum_data.php $active = 'default'; !in_array($orderby, array('tid', 'lastpid')) AND $orderby = 'lastpid'; $extra['orderby'] = $orderby; $forum = forum_read($fid); empty($forum) AND message(3, lang('forum_not_exists')); forum_access_user($fid, $gid, 'allowread') OR message(-1, lang('insufficient_visit_forum_privilege')); $pagesize = $conf['pagesize']; // hook forum_top_list_before.php $toplist = $page == 1 ? thread_top_find($fid) : array(); // hook forum_top_list_after.php $thread_list_from_default = 1; // hook forum_thread_list_before.php if($thread_list_from_default) { $pagination = pagination(url("forum-$fid-{page}", $extra), $forum['threads'], $page, $pagesize); $threadlist = thread_find_by_fid($fid, $page, $pagesize, $orderby); } foreach($threadlist as $_tid=>$_thread) { $post_first = reset(post__find(array('tid'=>$_tid,'isfirst'=>1))); // hook forum_thread_list_foreach.php } // hook forum_thread_list_after.php $header['title'] = $forum['seo_title'] ? $forum['seo_title'] : $forum['name'].'-'.$conf['sitename']; $header['mobile_title'] = $forum['name']; $header['mobile_link'] = url("forum-$fid"); $header['keywords'] = ''; $header['description'] = $forum['brief']; $_SESSION['fid'] = $fid; // hook forum_end.php include _include(APP_PATH.'view/htm/forum.htm'); ?>