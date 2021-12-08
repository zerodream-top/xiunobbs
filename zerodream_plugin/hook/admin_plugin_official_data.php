
<?php exit;

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 $search = param('search', ''); if($search) { $search = _xn_search_keyword_safe(xn_urldecode(trim($search))); $cond += array('name'=>array('LIKE'=>$search)); } ?>