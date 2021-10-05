
<?php exit;

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 if($search) { if($conf['url_rewrite_on']) $pagination = pagination(url("plugin-$action-$cateid-{page}").'?search='.xn_urlencode(trim($search)), $total, $page, $pagesize); else $pagination = pagination(url("plugin-$action-$cateid-{page}").'&search='.xn_urlencode(trim($search)), $total, $page, $pagesize); } ?>