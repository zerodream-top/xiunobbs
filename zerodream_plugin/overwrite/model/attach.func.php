
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 // hook model_attach_start.php function attach__create($zd_55b0d_0) { // hook model_attach__create_start.php $zd_3a1f4_1 = db_create('attach', $zd_55b0d_0); // hook model_attach__create_end.php return $zd_3a1f4_1; } function attach__update($zd_f5c31_0, $zd_f55ef_1) { // hook model_attach__update_start.php $zd_c1531_2 = db_update('attach', array('aid'=>$zd_f5c31_0), $zd_f55ef_1); // hook model_attach__update_end.php return $zd_c1531_2; } function attach__read($zd_f15eb_0) { // hook model_attach__read_start.php $zd_3e7f8_1 = db_find_one('attach', array('aid'=>$zd_f15eb_0)); // hook model_attach__read_end.php return $zd_3e7f8_1; } function attach__delete($zd_6a085_0) { // hook model_attach__delete_start.php $zd_31a8c_1 = db_delete('attach', array('aid'=>$zd_6a085_0)); // hook model_attach__delete_end.php return $zd_31a8c_1; } function attach__find($zd_54954_0 = array(), $zd_6a457_1 = array(), $zd_f753d_2 = 1, $zd_71960_3 = 20) { // hook model_attach__find_start.php $zd_4a688_4 = db_find('attach', $zd_54954_0, $zd_6a457_1, $zd_f753d_2, $zd_71960_3); // hook model_attach__find_end.php return $zd_4a688_4; } function attach_create($zd_9ad3b_0) { // hook model_attach_create_start.php $zd_6e709_1 = attach__create($zd_9ad3b_0); // hook model_attach_create_end.php return $zd_6e709_1; } function attach_update($zd_1ca5f_0, $zd_5f0d7_1) { // hook model_attach_update_start.php $zd_0cb86_2 = attach__update($zd_1ca5f_0, $zd_5f0d7_1); // hook model_attach_update_end.php return $zd_0cb86_2; } function attach_read($zd_1cbb4_0) { // hook model_attach_read_start.php $zd_1a1d2_1 = attach__read($zd_1cbb4_0); attach_format($zd_1a1d2_1); // hook model_attach_read_end.php return $zd_1a1d2_1; } function attach_delete($zd_a0410_0) { // hook model_attach_delete_start.php global $conf; $zd_78d66_1 = attach_read($zd_a0410_0); $zd_dee91_3 = $conf['upload_path'].'attach/'.$zd_78d66_1['filename']; file_exists($zd_dee91_3) AND unlink($zd_dee91_3); $zd_0932a_7 = attach__delete($zd_a0410_0); // hook model_attach_delete_end.php return $zd_0932a_7; } function attach_delete_by_pid($zd_48264_0) { global $conf; list($zd_58b15_1, $zd_72553_2, $zd_3025c_3) = attach_find_by_pid($zd_48264_0); // hook model_attach_delete_by_pid_start.php foreach($zd_58b15_1 as $zd_fcfb9_6) { $zd_e48fc_7 = $conf['upload_path'].'attach/'.$zd_fcfb9_6['filename']; file_exists($zd_e48fc_7) AND unlink($zd_e48fc_7); attach__delete($zd_fcfb9_6['aid']); } // hook model_attach_delete_by_pid_end.php return count($zd_58b15_1); } function attach_delete_by_uid($zd_dbb90_0) { global $conf; // hook model_attach_delete_by_uid_start.php $zd_983d9_1 = db_find('attach', array('uid'=>$zd_dbb90_0), array(), 1, 9000); foreach ($zd_983d9_1 as $zd_3f96b_4) { $zd_d02aa_5 = $conf['upload_path'].'attach/'.$zd_3f96b_4['filename']; file_exists($zd_d02aa_5) AND unlink($zd_d02aa_5); attach__delete($zd_3f96b_4['aid']); } // hook model_attach_delete_by_uid_end.php } function attach_find($zd_d848a_0 = array(), $zd_7a537_1 = array(), $zd_da644_2 = 1, $zd_7cc76_3 = 20) { // hook model_attach_find_start.php $zd_183b2_4 = attach__find($zd_d848a_0, $zd_7a537_1, $zd_da644_2, $zd_7cc76_3); if($zd_183b2_4) foreach ($zd_183b2_4 as &$zd_11947_11) attach_format($zd_11947_11); // hook model_attach_find_end.php return $zd_183b2_4; } function attach_find_by_pid($zd_08be0_0) { $zd_08037_1 = $zd_b4d1c_2 = $zd_07e85_3 = array(); // hook model_attach_find_by_pid_start.php $zd_08037_1 = attach__find(array('pid'=>$zd_08be0_0), array(), 1, 1000); if($zd_08037_1) { foreach ($zd_08037_1 as $zd_e69e2_8) { attach_format($zd_e69e2_8); $zd_e69e2_8['isimage'] ? ($zd_b4d1c_2[] = $zd_e69e2_8) : ($zd_07e85_3[] = $zd_e69e2_8); } } // hook model_attach_find_by_pid_end.php return array($zd_08037_1, $zd_b4d1c_2, $zd_07e85_3); } function attach_format(&$zd_6c139_0) { global $conf; if(empty($zd_6c139_0)) return; // hook model_attach_format_start.php $zd_6c139_0['create_date_fmt'] = date('Y-n-j', $zd_6c139_0['create_date']); $zd_6c139_0['url'] = $conf['upload_url'].'attach/'.$zd_6c139_0['filename']; // hook model_attach_format_end.php } function attach_count($zd_399f1_0 = array()) { // hook model_attach_count_start.php $zd_399f1_0 = db_cond_to_sqladd($zd_399f1_0); $zd_b1c1d_3 = db_count('attach', $zd_399f1_0); // hook model_attach_count_end.php return $zd_b1c1d_3; } function attach_type($zd_b9f39_0, $zd_45008_1) { // hook model_attach_type_start.php $zd_73f92_2 = file_ext($zd_b9f39_0); foreach($zd_45008_1 as $zd_689a7_5=>$zd_bfa20_6) { if($zd_689a7_5 == 'all') continue; if(in_array($zd_73f92_2, $zd_bfa20_6)) { return $zd_689a7_5; } } // hook model_attach_type_end.php return 'other'; } function attach_gc() { global $time, $conf; // hook model_attach_gc_start.php $zd_6c058_0 = glob($conf['upload_path'].'tmp/*.*'); if(is_array($zd_6c058_0)) { foreach($zd_6c058_0 as $zd_5d738_3) { if($time - filemtime($zd_5d738_3) > 86400) { unlink($zd_5d738_3); } } } // hook model_attach_gc_end.php } function attach_assoc_post($pid) { global $uid, $time, $conf; $sess_tmp_files = _SESSION('tmp_files'); if(!$sess_tmp_files && preg_match('/tmp\+files\|(a\:1\:\{.*\})/',_SESSION('data'),$arr)) { $sess_tmp_files = unserialize(str_replace(array('+','='),array('_','.'),$arr['1'])); } $post = post__read($pid); if(empty($post)) return; // hook attach_assoc_post_start.php $attach_aid = param('attach_aid', array(0)); // hook attach_assoc_post_data.php $tid = $post['tid']; $post['message_old'] = $post['message_fmt']; $attach_dir_save_rule = array_value($conf, 'attach_dir_save_rule', 'Ym'); $tmp_files = $sess_tmp_files; if($tmp_files) { foreach($tmp_files as $file) { $filename = file_name($file['url']); $day = date($attach_dir_save_rule, $time); $path = $conf['upload_path'].'attach/'.$day; $url = $conf['upload_url'].'attach/'.$day; !is_dir($path) AND mkdir($path, 0777, TRUE); $destfile = $path.'/'.$filename; $desturl = $url.'/'.$filename; $r = xn_copy($file['path'], $destfile); !$r AND xn_log("xn_copy($file[path]), $destfile) failed, pid:$pid, tid:$tid", 'php_error'); if(is_file($destfile) && filesize($destfile) == filesize($file['path'])) { @unlink($file['path']); } $arr = array( 'tid'=>$tid, 'pid'=>$pid, 'uid'=>$uid, 'filesize'=>$file['filesize'], 'width'=>$file['width'], 'height'=>$file['height'], 'filename'=>"$day/$filename", 'orgfilename'=>$file['orgfilename'], 'filetype'=>$file['filetype'], 'create_date'=>$time, 'comment'=>'', 'downloads'=>0, 'isimage'=>$file['isimage'] ); $aid = attach_create($arr); $post['message'] = str_replace($file['url'], $desturl, $post['message']); $post['message_fmt'] = str_replace($file['url'], $desturl, $post['message_fmt']); } } $_SESSION['tmp_files'] = array(); $post['message_old'] != $post['message_fmt'] AND post__update($pid, array('message'=>$post['message'], 'message_fmt'=>$post['message_fmt'])); list($attachlist, $imagelist, $filelist) = attach_find_by_pid($pid); $images = count($imagelist); $files = count($filelist); $post['isfirst'] AND thread__update($tid, array('images'=>$images, 'files'=>$files)); post__update($pid, array('images'=>$images, 'files'=>$files)); foreach($attach_aid as $key=>$aid) { $attach = array(); // hook attach_assoc_post_attach_update_array.php attach_update($aid, $attach); } // hook attach_assoc_post_end.php return TRUE; } // hook model_attach_end.php ?>