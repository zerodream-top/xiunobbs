
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function install_db() { global $db; $zd_6d509_0 = $db->tablepre; $zd_ddfcb_1 = "CREATE TABLE IF NOT EXISTS {$zd_6d509_0}zerodream_kv (
        k char(32) NOT NULL default '',
        v mediumtext NOT NULL,
        expiry int(11) unsigned NOT NULL default '0',
        PRIMARY KEY(k)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci"; $zd_7cead_3 = db_exec($zd_ddfcb_1); $zd_7cead_3 === FALSE AND message(-1, '创建 zerodream_kv 表结构失败'); } function install_dir() { $zd_933f4_0 = '../data/'; if(!is_dir($zd_933f4_0)) mkdir($zd_933f4_0); $zd_933f4_0 = '../data/zerodream_plugin/'; if(!is_dir($zd_933f4_0)) mkdir($zd_933f4_0); $zd_933f4_0 = '../data/zerodream_plugin/cache/'; if(!is_dir($zd_933f4_0)) mkdir($zd_933f4_0); $zd_933f4_0 = '../data/zerodream_plugin/check/'; if(!is_dir($zd_933f4_0)) mkdir($zd_933f4_0); $zd_933f4_0 = '../data/zerodream_plugin/download/'; if(!is_dir($zd_933f4_0)) mkdir($zd_933f4_0); $zd_933f4_0 = '../data/zerodream_plugin/tmp/'; if(!is_dir($zd_933f4_0)) mkdir($zd_933f4_0); } function install_data() { $zd_a8cb1_0 = zd_kv_get('zerodream_plugin'); if(empty($zd_a8cb1_0)) { $zd_a8cb1_0['key'] = ''; $zd_a8cb1_0['interface'] = 'zerodream'; zd_kv_set('zerodream_plugin', $zd_a8cb1_0); } } function install_init() { $zd_2985e_0 = explode('/', ADMIN_PATH); $zd_88d5c_1 = count($zd_2985e_0); $zd_3bea6_3 = $zd_2985e_0[$zd_88d5c_1-2]; $zd_40abd_6 = ADMIN_PATH.'../plugin/zerodream_plugin/overwrite/admin'; $zd_e766f_7 = ADMIN_PATH."../plugin/zerodream_plugin/overwrite/$zd_3bea6_3"; rename($zd_40abd_6, $zd_e766f_7); } function install_rmdir() { global $conf; rmdir_recusive($conf['tmp_path'], 1); } ?>