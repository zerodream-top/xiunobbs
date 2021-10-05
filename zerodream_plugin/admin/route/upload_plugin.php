
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Access Denied.'); $file = $_FILES['file']; if($file["error"] > 0) { $message = 'error: '.$file["error"].'<br>'; message(-1, $message); } $zd_uniqid = zd_uniqid($prefix='upload_plugin_'); $filename = $file["tmp_name"]; $destination = APP_PATH."data/zerodream_plugin/tmp/$zd_uniqid.zip"; move_uploaded_file($filename, $destination); $zipfile = $destination; $extdir = APP_PATH."plugin/"; zd_unzip($zipfile, $extdir); unlink($zipfile); message(0, jump("上传成功", http_referer(), 3)); ?>