
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 $interface = param(2); $zd_kv_zerodream_plugin = zd_kv_get('zerodream_plugin'); $zd_kv_zerodream_plugin['interface'] = $interface; zd_kv_set('zerodream_plugin', $zd_kv_zerodream_plugin); message(0, jump('修改成功', url('plugin-local'), 3)); ?>