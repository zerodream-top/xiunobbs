
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function install_db() { global $db; $zd_18e49_0 = $db->tablepre; $zd_df028_1 = "CREATE TABLE IF NOT EXISTS {$zd_18e49_0}zerodream_kv (
        k char(32) NOT NULL default '',
        v mediumtext NOT NULL,
        expiry int(11) unsigned NOT NULL default '0',
        PRIMARY KEY(k)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci"; $zd_4f5be_3 = db_exec($zd_df028_1); $zd_4f5be_3 === FALSE AND message(-1, '创建 zerodream_kv 表结构失败'); } function install_dir() { $zd_7c15e_0 = '../data/'; if(!is_dir($zd_7c15e_0)) mkdir($zd_7c15e_0); $zd_7c15e_0 = '../data/zerodream_plugin/'; if(!is_dir($zd_7c15e_0)) mkdir($zd_7c15e_0); $zd_7c15e_0 = '../data/zerodream_plugin/cache/'; if(!is_dir($zd_7c15e_0)) mkdir($zd_7c15e_0); $zd_7c15e_0 = '../data/zerodream_plugin/check/'; if(!is_dir($zd_7c15e_0)) mkdir($zd_7c15e_0); $zd_7c15e_0 = '../data/zerodream_plugin/download/'; if(!is_dir($zd_7c15e_0)) mkdir($zd_7c15e_0); $zd_7c15e_0 = '../data/zerodream_plugin/tmp/'; if(!is_dir($zd_7c15e_0)) mkdir($zd_7c15e_0); } function install_data() { $zd_6b583_0 = zd_kv_get('zerodream_plugin'); if(empty($zd_6b583_0)) { $zd_6b583_0['key'] = ''; $zd_6b583_0['interface'] = 'zerodream'; zd_kv_set('zerodream_plugin', $zd_6b583_0); } } function install_init() { $zd_830ee_0 = explode('/', ADMIN_PATH); $zd_129b1_1 = count($zd_830ee_0); $zd_a8dd9_3 = $zd_830ee_0[$zd_129b1_1-2]; $zd_8431b_6 = ADMIN_PATH.'../plugin/zerodream_plugin/overwrite/admin'; $zd_1a3d5_7 = ADMIN_PATH."../plugin/zerodream_plugin/overwrite/$zd_a8dd9_3"; rename($zd_8431b_6, $zd_1a3d5_7); } function install_rmdir() { rmdir_recusive($zd_262df_0['tmp_path'], 1); } ?>