
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function xn_search_keyword_safe($zd_6ad34_0) { $zd_6ad34_0 = str_replace(array('\'', '\\', '"', '%', '<', '>', '`', '*', '&', '#'), '', $zd_6ad34_0); $zd_6ad34_0 = preg_replace('#\s+#', ' ', $zd_6ad34_0); $zd_6ad34_0 = trim($zd_6ad34_0); return $zd_6ad34_0; } ?>