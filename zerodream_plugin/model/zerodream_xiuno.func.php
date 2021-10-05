
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function xn_search_keyword_safe($zd_9c89c_0) { $zd_9c89c_0 = str_replace(array('\'', '\\', '"', '%', '<', '>', '`', '*', '&', '#'), '', $zd_9c89c_0); $zd_9c89c_0 = preg_replace('#\s+#', ' ', $zd_9c89c_0); $zd_9c89c_0 = trim($zd_9c89c_0); return $zd_9c89c_0; } ?>