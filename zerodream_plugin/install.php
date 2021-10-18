
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Forbidden'); if(!defined('DEFINED_ZERODREAM_FUNCTION')) include _include(ADMIN_PATH.'../plugin/zerodream_plugin/model/zerodream.func.php'); $tablepre = $db->tablepre; $sql = "CREATE TABLE IF NOT EXISTS {$tablepre}zerodream_kv (
    k char(32) NOT NULL default '',
    v mediumtext NOT NULL,
    expiry int(11) unsigned NOT NULL default '0',
    PRIMARY KEY(k)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci"; $r = db_exec($sql); $r === FALSE AND message(-1, '创建 zerodream_kv 表结构失败'); $zd_kv_zerodream_plugin = zd_kv_get('zerodream_plugin'); if(empty($zd_kv_zerodream_plugin)) { $zd_kv_zerodream_plugin['key'] = ''; $zd_kv_zerodream_plugin['interface'] = 'zerodream'; zd_kv_set('zerodream_plugin', $zd_kv_zerodream_plugin); } $filename = '../data/'; if(!is_dir($filename)) mkdir($filename); $filename = '../data/zerodream_plugin/'; if(!is_dir($filename)) mkdir($filename); $filename = '../data/zerodream_plugin/backup/'; if(!is_dir($filename)) mkdir($filename); $filename = '../data/zerodream_plugin/cache/'; if(!is_dir($filename)) mkdir($filename); $filename = '../data/zerodream_plugin/check/'; if(!is_dir($filename)) mkdir($filename); $filename = '../data/zerodream_plugin/download/'; if(!is_dir($filename)) mkdir($filename); $filename = '../data/zerodream_plugin/tmp/'; if(!is_dir($filename)) mkdir($filename); rmdir_recusive($conf['tmp_path'], 1); ?>