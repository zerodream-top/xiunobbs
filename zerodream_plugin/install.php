
<?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Forbidden'); function install_db() { global $db; $tablepre = $db->tablepre; $sql = "CREATE TABLE IF NOT EXISTS {$tablepre}zerodream_kv (
        k char(32) NOT NULL default '',
        v mediumtext NOT NULL,
        expiry int(11) unsigned NOT NULL default '0',
        PRIMARY KEY(k)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci"; $r = db_exec($sql); $r === FALSE AND message(-1, '创建 zerodream_kv 表结构失败'); } function install_dir() { $filename = APP_PATH.'data/'; if(!is_dir($filename)) mkdir($filename); $filename = APP_PATH.'data/zerodream_plugin/'; if(!is_dir($filename)) mkdir($filename); $filename = APP_PATH.'data/zerodream_plugin/cache/'; if(!is_dir($filename)) mkdir($filename); $filename = APP_PATH.'data/zerodream_plugin/check/'; if(!is_dir($filename)) mkdir($filename); $filename = APP_PATH.'data/zerodream_plugin/download/'; if(!is_dir($filename)) mkdir($filename); $filename = APP_PATH.'data/zerodream_plugin/tmp/'; if(!is_dir($filename)) mkdir($filename); } function install_data() { $zd_kv_zerodream_plugin = zd_kv_get('zerodream_plugin'); if(empty($zd_kv_zerodream_plugin)) { $zd_kv_zerodream_plugin['key'] = ''; $zd_kv_zerodream_plugin['interface'] = 'zerodream'; zd_kv_set('zerodream_plugin', $zd_kv_zerodream_plugin); } } function install_init() { $explode = explode('/', ADMIN_PATH); $count = count($explode); $admin = $explode[$count-2]; $oldname = APP_PATH.'plugin/zerodream_plugin/overwrite/admin'; $newname = APP_PATH."plugin/zerodream_plugin/overwrite/$admin"; rename($oldname, $newname); } function install_rmdir() { global $conf; rmdir_recusive($conf['tmp_path'], 1); } if(!defined('DEFINED_ZERODREAM_PLUGIN_ZERODREAM_FUNCTION')) include _include(APP_PATH.'plugin/zerodream_plugin/model/zerodream.func.php'); install_db(); install_dir(); install_data(); install_init(); install_rmdir(); ?>