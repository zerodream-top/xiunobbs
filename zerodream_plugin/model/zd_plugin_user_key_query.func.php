
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_plugin_user_key_query_request() { global $apply_key,$zd_curl_data; $zd_8f2ee_0 = ZERODREAM_URL."zd_plugin-user-key_query-$apply_key.htm"; $zd_43a31_1 = zd_curl($zd_8f2ee_0, $zd_38969_3=null, $zd_3590c_4=array('method'=>'POST')); $zd_curl_data = $zd_43a31_1['data']; $zd_ababf_6 = $zd_43a31_1['error']; if($zd_ababf_6) message(-1, "curl_error: $zd_ababf_6"); elseif(empty($zd_curl_data)) message(-1, '数据不存在'); } function zd_plugin_user_key_query_response() { global $zd_curl_data; $zd_b01fa_0 = $zd_curl_data; $zd_5d6f6_1 = json_decode($zd_b01fa_0, true); $zd_d4d75_3 = $zd_5d6f6_1['code']; if($zd_d4d75_3=='0') { $zd_9f378_6 = $zd_5d6f6_1['zd_key']; $zd_d5d4b_8 = zd_kv_get('zerodream_plugin'); $zd_d5d4b_8['key'] = $zd_9f378_6; zd_kv_set('zerodream_plugin', $zd_d5d4b_8); message(0, '申请成功'); } elseif($zd_d4d75_3=='1') { $zd_4e50e_13 = $zd_5d6f6_1['state']; if($zd_4e50e_13===0) message(2, '申请失败'); elseif($zd_4e50e_13===1) message(2, '取消申请'); elseif($zd_4e50e_13===2) message(1, '申请已创建'); } elseif($zd_d4d75_3=='2') { message(1, '申请未创建'); } } ?>