
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_user_key_query_request() { global $apply_key,$zd_curl_data; $zd_30bc0_0 = ZERODREAM_URL."zd_plugin-user-key_query-$apply_key.htm"; $zd_c6556_1 = zd_curl($zd_30bc0_0, $zd_130ed_3=null, $zd_04a02_4=array('method'=>'POST')); $zd_curl_data = $zd_c6556_1['data']; $zd_79264_6 = $zd_c6556_1['error']; if($zd_79264_6) message(-1, "curl_error: $zd_79264_6"); elseif(empty($zd_curl_data)) message(-1, '数据不存在'); } function zd_plugin_user_key_query_response() { global $zd_curl_data; $zd_3b3d2_0 = $zd_curl_data; $zd_17821_1 = json_decode($zd_3b3d2_0, true); $zd_34b1a_3 = $zd_17821_1['code']; if($zd_34b1a_3=='0') { $zd_63140_6 = $zd_17821_1['zd_key']; $zd_d2218_8 = zd_kv_get('zerodream_plugin'); $zd_d2218_8['key'] = $zd_63140_6; zd_kv_set('zerodream_plugin', $zd_d2218_8); message(0, '申请成功'); } elseif($zd_34b1a_3=='1') { $zd_29fa6_13 = $zd_17821_1['state']; if($zd_29fa6_13===0) message(2, '申请失败'); elseif($zd_29fa6_13===1) message(2, '取消申请'); elseif($zd_29fa6_13===2) message(1, '申请已创建'); } elseif($zd_34b1a_3=='2') { message(1, '申请未创建'); } } ?>