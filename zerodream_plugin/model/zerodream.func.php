
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 define('DEFINED_ZERODREAM_PLUGIN_ZERODREAM_FUNCTION', true); include _include(zd_path('plugin/zerodream_plugin/model/zerodream_kv.func.php')); include _include(zd_path('plugin/zerodream_plugin/model/zerodream_user.func.php')); include _include(zd_path('plugin/zerodream_plugin/model/zerodream_xiuno.func.php')); function zd_path($path) { if(defined('ZD_PATH')) return ADMIN_PATH.'../'.$path; else return APP_PATH.$path; } function zd_url_rewrite() { global $conf; if(!$conf['url_rewrite_on']) $zd_fdbe7_0 = '?'; return $zd_fdbe7_0; } function zd_check_plugin($plugin) { $zd_ecf7b_0 = zd_path("plugin/$plugin/conf.json"); if(!is_file($zd_ecf7b_0)) return false; $zd_6f64e_2 = file_get_contents($zd_ecf7b_0); $zd_3dc2c_4 = json_decode($zd_6f64e_2, true); if($zd_3dc2c_4['installed'] && $zd_3dc2c_4['enable']) $zd_2a3b8_8 = true; else $zd_2a3b8_8 = false; return $zd_2a3b8_8; } function zd_uniqid($prefix='') { $zd_c10da_0 = $prefix.md5(uniqid(mt_rand(),true)); return $zd_c10da_0; } function zd_curl($url, $data=null, $array=array()) { if(!isset($array['method'])) $array['method'] = 'GET'; $zd_b839f_0 = curl_init(); $zd_dcba3_1 = array( CURLOPT_URL => $url, CURLOPT_CUSTOMREQUEST => $array['method'], CURLOPT_POSTFIELDS => $data, CURLOPT_RETURNTRANSFER => true, CURLOPT_SSL_VERIFYPEER => false, CURLOPT_SSL_VERIFYHOST => false, CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_0, CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4, CURLOPT_HTTPHEADER => array( "Expect: ", "Accept: application/json", "Content-Type: application/json; charset=utf-8", "Content-Length: ".strlen($data), ), ); curl_setopt_array($zd_b839f_0, $zd_dcba3_1); $zd_4d0da_4['data'] = curl_exec($zd_b839f_0); $zd_4d0da_4['error'] = curl_error($zd_b839f_0); if(!empty($array['getinfo'])) $zd_4d0da_4['info'] = curl_getinfo($zd_b839f_0); curl_close($zd_b839f_0); return $zd_4d0da_4; } function zd_request_uri() { if(isset($_SERVER['REQUEST_URI'])) $zd_c55c4_0 = $_SERVER['REQUEST_URI']; elseif(isset($_SERVER['argv'])) $zd_c55c4_0 = $_SERVER['PHP_SELF'].'?'.$_SERVER['argv'][0]; else $zd_c55c4_0 = $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']; return $zd_c55c4_0; } function zd_remove_extension($name_str) { $zd_8e3c1_0 = explode(".", $name_str); $zd_10042_1 = count($zd_8e3c1_0); if($zd_10042_1 == 1) { $zd_9eb46_4 = $name_str; } else { foreach($zd_8e3c1_0 as $zd_a4fcd_6=>$zd_1910f_7) { if($zd_a4fcd_6!=($zd_10042_1-1)) if($zd_9eb46_4) $zd_9eb46_4 .= '.'.$zd_1910f_7; else $zd_9eb46_4 = $zd_1910f_7; } } return $zd_9eb46_4; } function zd_deldir($path) { $zd_c7d34_0 = opendir($path); while($zd_f6b5e_1=readdir($zd_c7d34_0)) { if($zd_f6b5e_1!="." && $zd_f6b5e_1!="..") { $zd_eefb8_5 = $path."/".$zd_f6b5e_1; if(is_dir($zd_eefb8_5)) zd_deldir($zd_eefb8_5); else unlink($zd_eefb8_5); } } closedir($zd_c7d34_0); if(rmdir($path)) return true; else return false; } function zd_md5_file($filename, $exclude_filename) { global $zd_md5_file; $zd_bc7e9_0 = $filename; _zd_md5_file($zd_bc7e9_0, $exclude_filename); $zd_24a20_2 = $zd_md5_file['md5_file_zerodream_plugin']; unset($zd_md5_file); $zd_a7ac5_3 = ''; foreach($zd_24a20_2 as $zd_c84f3_5=>$zd_b632a_6) $zd_a7ac5_3 = md5($zd_a7ac5_3.$zd_b632a_6); return $zd_a7ac5_3; } function _zd_md5_file($directory, $exclude_filename) { global $zd_md5_file; $zd_b72ad_0 = scandir($directory); foreach($zd_b72ad_0 as $zd_fe9b8_2=>$zd_bb85d_3) { if($zd_bb85d_3!="." && $zd_bb85d_3!="..") { $zd_41b00_6 = $directory.'/'.$zd_bb85d_3; if(is_dir($zd_41b00_6)) { if(!in_array($zd_41b00_6, $exclude_filename)) _zd_md5_file($zd_41b00_6, $exclude_filename); } elseif(is_file($zd_41b00_6)) { if(!in_array($zd_41b00_6, $exclude_filename)) $zd_md5_file['md5_file_zerodream_plugin'][] = md5_file($zd_41b00_6); } } } } function zd_data_put($zd_data) { $zd_ef5f9_0 = zd_path('data/zerodream_plugin/zd_data.json'); $zd_e2837_1 = json_encode($zd_data); file_put_contents($zd_ef5f9_0, $zd_e2837_1); zd_data_get($zd_2019b_4=true); } function zd_data_get($reacquire=false) { static $zd_e2e0e_0 = array(); if(empty($zd_e2e0e_0) || $reacquire) { $zd_1369c_2 = zd_path('data/zerodream_plugin/zd_data.json'); $zd_27f79_3 = file_get_contents($zd_1369c_2); $zd_e2e0e_0 = json_decode($zd_27f79_3, true); } return $zd_e2e0e_0; } function zd_data_zip($name, $data) { // hook zd_data_zip_start.php $zd_3e37d_0 = zd_path('data/zerodream_plugin/tmp/zd_data_zip/'); if(!is_dir($zd_3e37d_0)) mkdir($zd_3e37d_0); $zd_cc932_3 = $name.'_'; $zd_cc284_4 = zd_uniqid($zd_cc932_3); $zd_3e37d_0 = $zd_3e37d_0."$zd_cc284_4/"; if(!is_dir($zd_3e37d_0)) mkdir($zd_3e37d_0); $zd_ab53e_11 = $zd_3e37d_0."$name/"; if(!is_dir($zd_ab53e_11)) mkdir($zd_ab53e_11); foreach($data as $zd_71550_15=>$zd_6e16a_16) file_put_contents($zd_ab53e_11.$zd_71550_15, $zd_6e16a_16); $zd_0e388_20 = "$zd_3e37d_0/$name.zip"; $zd_daa1f_22 = $zd_ab53e_11; zd_zip($zd_0e388_20, $zd_daa1f_22); $zd_e4b04_26 = $zd_0e388_20; $zd_5e82a_28 = file_get_contents($zd_e4b04_26); zd_deldir($zd_3e37d_0); // hook zd_data_zip_end.php return $zd_5e82a_28; } function zd_data_unzip($name, $data) { // hook zd_data_unzip_start.php $zd_f5640_0 = zd_path('data/zerodream_plugin/tmp/zd_data_unzip/'); if(!is_dir($zd_f5640_0)) mkdir($zd_f5640_0); $zd_3b09e_3 = $name.'_'; $zd_9bf64_4 = zd_uniqid($zd_3b09e_3); $zd_f5640_0 = $zd_f5640_0."$zd_9bf64_4/"; if(!is_dir($zd_f5640_0)) mkdir($zd_f5640_0); $zd_1d8dc_11 = $zd_f5640_0.$name.'.zip'; file_put_contents($zd_1d8dc_11, $data); $zd_3ba62_14 = $zd_1d8dc_11; $zd_dbbfe_16 = $zd_f5640_0; zd_unzip($zd_3ba62_14, $zd_dbbfe_16); $zd_38146_20 = $zd_f5640_0."$name/"; $zd_9c3bc_22 = scandir($zd_38146_20); foreach($zd_9c3bc_22 as $zd_17e79_25=>$zd_17287_26) if($zd_17287_26!='.' && $zd_17287_26!='..') $zd_3280a_29[$zd_17287_26] = file_get_contents($zd_38146_20.$zd_17287_26); zd_deldir($zd_f5640_0); // hook zd_data_unzip_end.php return $zd_3280a_29; } function zd_byte_conversion($byte, $precision) { if($byte>=1024**4) $zd_a1b9f_0 = round($byte/1024**4, $precision).' T'; elseif($byte>=1024**3) $zd_a1b9f_0 = round($byte/1024**3, $precision).' G'; elseif($byte>=1024**2) $zd_a1b9f_0 = round($byte/1024**2, $precision).' M'; elseif($byte>=1024**1) $zd_a1b9f_0 = round($byte/1024**1, $precision).' K'; elseif($byte>=1024**0) $zd_a1b9f_0 = round($byte/1024**0, $precision).' B'; else return false; return $zd_a1b9f_0; } function zd_zip($zipfile, $extdir) { if(class_exists('ZipArchive')) { $zd_105c5_0 = pathinfo($extdir); $zd_8702d_1 = $zd_105c5_0['dirname']; $zd_b5789_3 = $zd_105c5_0['basename']; xn_unlink($zipfile); $zd_eceba_5 = new ZipArchive(); $zd_eceba_5->open($zipfile, ZIPARCHIVE::CREATE); $zd_eceba_5->addEmptyDir($zd_b5789_3); zd_dir_to_zip($zd_eceba_5, $extdir, strlen("$zd_8702d_1/")); $zd_eceba_5->close(); } else { xn_unlink($zipfile); include_once XIUNOPHP_PATH.'xn_zip_old.func.php'; xn_zip_old($zipfile, $extdir); } } function zd_dir_to_zip($z, $zippath, $prelen = 0) { substr($zippath, -1) != '/' AND $zippath .= '/'; $zd_8db93_0 = glob($zippath."*"); foreach($zd_8db93_0 as $zd_2ec98_2) { $zd_ba0ef_3 = substr($zd_2ec98_2, $prelen); if(is_file($zd_2ec98_2)) { $z->addFile($zd_2ec98_2, $zd_ba0ef_3); } elseif(is_dir($zd_2ec98_2)) { $z->addEmptyDir($zd_ba0ef_3); zd_dir_to_zip($z, $zd_2ec98_2, $prelen); } } } function zd_unzip($zipfile, $extdir) { if(class_exists('ZipArchive')) { $zd_cc1c4_0 = new ZipArchive; if($zd_cc1c4_0->open($zipfile) === TRUE) { $zd_cc1c4_0->extractTo($extdir); $zd_cc1c4_0->close(); } } else { include_once XIUNOPHP_PATH.'xn_zip_old.func.php'; xn_unzip_old($zipfile, $extdir); } $extdirlast = substr(strrchr(substr($extdir, 0, -1), '/'), 1); $extdirp = substr(substr($extdir, 0, -1), 0, strpos($extdir, '/') + 1); if(is_dir($extdir.$extdirlast)) { $extdirtmp = substr($extdir, 0, -1).'__xn__tmp__dir__/'; rename(substr($extdir, 0, -1), substr($extdirtmp, 0, -1)); rename($extdirtmp.$extdirlast, substr($extdir, 0, -1)); } } ?>