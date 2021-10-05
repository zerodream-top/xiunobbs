
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Access Denied.'); $dir = param('dir'); $name = param('name'); $version = param('version'); $bbs_version = param('bbs_version'); $brief = param('brief'); $hook = param('hook'); $overwrite = param('overwrite'); if(empty($dir)) message('dir', '目录名称不能为空'); if(!preg_match('/^\w+$/', $dir)) message('dir', '目录名称只能由数字、字母、下划线组成'); if(empty($name)) message('name', '插件名称不能为空'); if(empty($version)) message('version', '版本号(version)不能为空'); if(empty($bbs_version)) message('bbs_version', '版本号(bbs_version)不能为空'); if(empty($brief)) message('brief', '插件介绍不能为空'); $plugin_conf = [ 'name'=>$name, 'brief'=>$brief, 'version'=>$version, 'bbs_version'=>$bbs_version, 'installed'=>0, 'enable'=>0, 'hooks_rank'=>[], 'overwrites_rank'=>[], 'dependencies'=>[] ]; if(!is_dir(APP_PATH.'plugin/'.$dir)){ mkdir(APP_PATH.'plugin/'.$dir); } if($hook == 'on'){ if(!is_dir(APP_PATH.'plugin/'.$dir.'/hook')){ mkdir(APP_PATH.'plugin/'.$dir.'/hook'); } } if($overwrite == 'on'){ if(!is_dir(APP_PATH.'plugin/'.$dir.'/overwrite')){ mkdir(APP_PATH.'plugin/'.$dir.'/overwrite'); } } file_put_contents(APP_PATH.'plugin/'.$dir.'/conf.json',xn_json_encode($plugin_conf)); message(0, '新建成功'); ?>