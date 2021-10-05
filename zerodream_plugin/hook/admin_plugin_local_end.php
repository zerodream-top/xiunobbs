
<?php exit;

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 $search = param('search', ''); if($search) { $search = xn_search_keyword_safe(xn_urldecode(trim($search))); $cond = array('name'=>array('LIKE'=>$search)); $pluginlist = arrlist_cond_orderby($plugins, $cond, array('pluginid'=>-1), 1, 999); } $pugin_cate_html = "
<a role=\"button\" hreaf='#' class=\"btn btn-secondary\" style='color:#fff' data-toggle=\"modal\" data-target=\"#new_plugin\">新建插件</a>
<a role=\"button\" hreaf='#' class=\"btn btn-secondary\" style='color:#fff' data-toggle=\"modal\" data-target=\"#upload_plugin\">上传插件</a>"; ?>