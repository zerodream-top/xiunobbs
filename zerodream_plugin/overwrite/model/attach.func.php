
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 // hook model_attach_start.php function attach__create($zd_9e6970) { // hook model_attach__create_start.php $zd_512191 = db_create('attach', $zd_9e6970); // hook model_attach__create_end.php return $zd_512191; } function attach__update($zd_cb6890, $zd_692d51) { // hook model_attach__update_start.php $zd_bebe72 = db_update('attach', array('aid'=>$zd_cb6890), $zd_692d51); // hook model_attach__update_end.php return $zd_bebe72; } function attach__read($zd_d930a0) { // hook model_attach__read_start.php $zd_96a091 = db_find_one('attach', array('aid'=>$zd_d930a0)); // hook model_attach__read_end.php return $zd_96a091; } function attach__delete($zd_059a90) { // hook model_attach__delete_start.php $zd_d4ea31 = db_delete('attach', array('aid'=>$zd_059a90)); // hook model_attach__delete_end.php return $zd_d4ea31; } function attach__find($zd_369190 = array(), $zd_8d42b1 = array(), $zd_c14892 = 1, $zd_64a483 = 20) { // hook model_attach__find_start.php $zd_370344 = db_find('attach', $zd_369190, $zd_8d42b1, $zd_c14892, $zd_64a483); // hook model_attach__find_end.php return $zd_370344; } function attach_create($zd_58adf0) { // hook model_attach_create_start.php $zd_5c0821 = attach__create($zd_58adf0); // hook model_attach_create_end.php return $zd_5c0821; } function attach_update($zd_3d3570, $zd_2618d1) { // hook model_attach_update_start.php $zd_2fd832 = attach__update($zd_3d3570, $zd_2618d1); // hook model_attach_update_end.php return $zd_2fd832; } function attach_read($zd_bf2c50) { // hook model_attach_read_start.php $zd_307171 = attach__read($zd_bf2c50); attach_format($zd_307171); // hook model_attach_read_end.php return $zd_307171; } function attach_delete($zd_368750) { // hook model_attach_delete_start.php global $conf; $zd_ab4931 = attach_read($zd_368750); $zd_1fe193 = $conf['upload_path'].'attach/'.$zd_ab4931['filename']; file_exists($zd_1fe193) AND unlink($zd_1fe193); $zd_44d3f7 = attach__delete($zd_368750); // hook model_attach_delete_end.php return $zd_44d3f7; } function attach_delete_by_pid($zd_7bbfb0) { global $conf; list($zd_35ade1, $zd_4adf82, $zd_35bec3) = attach_find_by_pid($zd_7bbfb0); // hook model_attach_delete_by_pid_start.php foreach($zd_35ade1 as $zd_4f24c6) { $zd_afe627 = $conf['upload_path'].'attach/'.$zd_4f24c6['filename']; file_exists($zd_afe627) AND unlink($zd_afe627); attach__delete($zd_4f24c6['aid']); } // hook model_attach_delete_by_pid_end.php return count($zd_35ade1); } function attach_delete_by_uid($zd_06bdd0) { global $conf; // hook model_attach_delete_by_uid_start.php $zd_c6dce1 = db_find('attach', array('uid'=>$zd_06bdd0), array(), 1, 9000); foreach ($zd_c6dce1 as $zd_44c1a4) { $zd_f983e5 = $conf['upload_path'].'attach/'.$zd_44c1a4['filename']; file_exists($zd_f983e5) AND unlink($zd_f983e5); attach__delete($zd_44c1a4['aid']); } // hook model_attach_delete_by_uid_end.php } function attach_find($zd_cd19b0 = array(), $zd_a67001 = array(), $zd_59baf2 = 1, $zd_a53933 = 20) { // hook model_attach_find_start.php $zd_82a394 = attach__find($zd_cd19b0, $zd_a67001, $zd_59baf2, $zd_a53933); if($zd_82a394) foreach ($zd_82a394 as &$zd_edecc11) attach_format($zd_edecc11); // hook model_attach_find_end.php return $zd_82a394; } function attach_find_by_pid($zd_2fbad0) { $zd_3f7391 = $zd_6d6572 = $zd_32f263 = array(); // hook model_attach_find_by_pid_start.php $zd_3f7391 = attach__find(array('pid'=>$zd_2fbad0), array(), 1, 1000); if($zd_3f7391) { foreach ($zd_3f7391 as $zd_92d148) { attach_format($zd_92d148); $zd_92d148['isimage'] ? ($zd_6d6572[] = $zd_92d148) : ($zd_32f263[] = $zd_92d148); } } // hook model_attach_find_by_pid_end.php return array($zd_3f7391, $zd_6d6572, $zd_32f263); } function attach_format(&$zd_1e44b0) { global $conf; if(empty($zd_1e44b0)) return; // hook model_attach_format_start.php $zd_1e44b0['create_date_fmt'] = date('Y-n-j', $zd_1e44b0['create_date']); $zd_1e44b0['url'] = $conf['upload_url'].'attach/'.$zd_1e44b0['filename']; // hook model_attach_format_end.php } function attach_count($zd_ff32e0 = array()) { // hook model_attach_count_start.php $zd_ff32e0 = db_cond_to_sqladd($zd_ff32e0); $zd_644353 = db_count('attach', $zd_ff32e0); // hook model_attach_count_end.php return $zd_644353; } function attach_type($zd_e1dfa0, $zd_cf9c61) { // hook model_attach_type_start.php $zd_c97fb2 = file_ext($zd_e1dfa0); foreach($zd_cf9c61 as $zd_e064e5=>$zd_a3a636) { if($zd_e064e5 == 'all') continue; if(in_array($zd_c97fb2, $zd_a3a636)) { return $zd_e064e5; } } // hook model_attach_type_end.php return 'other'; } function attach_gc() { global $time, $conf; // hook model_attach_gc_start.php $zd_a43460 = glob($conf['upload_path'].'tmp/*.*'); if(is_array($zd_a43460)) { foreach($zd_a43460 as $zd_9b17a3) { if($time - filemtime($zd_9b17a3) > 86400) { unlink($zd_9b17a3); } } } // hook model_attach_gc_end.php } function attach_assoc_post($pid) { global $uid, $time, $conf; $sess_tmp_files = _SESSION('tmp_files'); if(!$sess_tmp_files && preg_match('/tmp\+files\|(a\:1\:\{.*\})/',_SESSION('data'),$arr)) { $sess_tmp_files = unserialize(str_replace(array('+','='),array('_','.'),$arr['1'])); } $post = post__read($pid); if(empty($post)) return; // hook attach_assoc_post_start.php $attach_aid = param('attach_aid', array(0)); // hook attach_assoc_post_data.php $tid = $post['tid']; $post['message_old'] = $post['message_fmt']; $attach_dir_save_rule = array_value($conf, 'attach_dir_save_rule', 'Ym'); $tmp_files = $sess_tmp_files; if($tmp_files) { foreach($tmp_files as $file) { $filename = file_name($file['url']); $day = date($attach_dir_save_rule, $time); $path = $conf['upload_path'].'attach/'.$day; $url = $conf['upload_url'].'attach/'.$day; !is_dir($path) AND mkdir($path, 0777, TRUE); $destfile = $path.'/'.$filename; $desturl = $url.'/'.$filename; $r = xn_copy($file['path'], $destfile); !$r AND xn_log("xn_copy($file[path]), $destfile) failed, pid:$pid, tid:$tid", 'php_error'); if(is_file($destfile) && filesize($destfile) == filesize($file['path'])) { @unlink($file['path']); } $arr = array( 'tid'=>$tid, 'pid'=>$pid, 'uid'=>$uid, 'filesize'=>$file['filesize'], 'width'=>$file['width'], 'height'=>$file['height'], 'filename'=>"$day/$filename", 'orgfilename'=>$file['orgfilename'], 'filetype'=>$file['filetype'], 'create_date'=>$time, 'comment'=>'', 'downloads'=>0, 'isimage'=>$file['isimage'] ); $aid = attach_create($arr); $post['message'] = str_replace($file['url'], $desturl, $post['message']); $post['message_fmt'] = str_replace($file['url'], $desturl, $post['message_fmt']); } } $_SESSION['tmp_files'] = array(); $post['message_old'] != $post['message_fmt'] AND post__update($pid, array('message'=>$post['message'], 'message_fmt'=>$post['message_fmt'])); list($attachlist, $imagelist, $filelist) = attach_find_by_pid($pid); $images = count($imagelist); $files = count($filelist); $post['isfirst'] AND thread__update($tid, array('images'=>$images, 'files'=>$files)); post__update($pid, array('images'=>$images, 'files'=>$files)); foreach($attach_aid as $key=>$aid) { $attach = array(); // hook attach_assoc_post_attach_update_array.php attach_update($aid, $attach); } // hook attach_assoc_post_end.php return TRUE; } // hook model_attach_end.php ?>