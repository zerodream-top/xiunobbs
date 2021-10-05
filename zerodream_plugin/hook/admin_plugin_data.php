
<?php exit;

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 include _include(APP_PATH.'plugin/zerodream_plugin/admin/model/zd_plugin.func.php'); $zd_kv_zerodream_plugin = zd_kv_get('zerodream_plugin'); $interface = $zd_kv_zerodream_plugin['interface']; if($interface=='xiuno') { unset($menu['plugin']['tab']['zerodream_plugin_plugin']); unset($menu['plugin']['tab']['zerodream_plugin_template']); unset($menu['plugin']['tab']['zerodream_plugin_cloud']); $menu['plugin']['tab']['official_free'] = array('url'=>url('plugin-official_free'), 'text'=>lang('admin_plugin_official_free_list')); $menu['plugin']['tab']['official_fee'] = array('url'=>url('plugin-official_fee'), 'text'=>lang('admin_plugin_official_fee_list')); } ?>