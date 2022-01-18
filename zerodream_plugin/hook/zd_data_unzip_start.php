
<?php exit;

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 $zd_data_unzip_str = '__zerodream_data_zip__'; $zd_data_unzip_strlen = strlen($zd_data_unzip_str); $zd_data_unzip_substr = substr($data, 0, $zd_data_unzip_strlen); if($zd_data_unzip_str!=$zd_data_unzip_substr) return false; $data = str_replace($zd_data_unzip_str, 'PK', $data); ?>