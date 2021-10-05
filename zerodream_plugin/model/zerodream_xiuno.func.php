
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function xn_search_keyword_safe($s) { $s = str_replace(array('\'', '\\', '"', '%', '<', '>', '`', '*', '&', '#'), '', $s); $s = preg_replace('#\s+#', ' ', $s); $s = trim($s); return $s; } ?>