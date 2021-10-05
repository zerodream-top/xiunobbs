
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function xn_search_keyword_safe($zd_5d2b80) { $zd_5d2b80 = str_replace(array('\'', '\\', '"', '%', '<', '>', '`', '*', '&', '#'), '', $zd_5d2b80); $zd_5d2b80 = preg_replace('#\s+#', ' ', $zd_5d2b80); $zd_5d2b80 = trim($zd_5d2b80); return $zd_5d2b80; } ?>