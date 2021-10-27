
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_user_group_update($uid, $admin=false) { global $grouplist; $zd_b3992_0 = user__read($uid); if(!$admin) if($zd_b3992_0['gid']<100) return false; foreach($grouplist as $zd_1d31a_2) { if($zd_1d31a_2['gid'] < 100) continue; if($zd_b3992_0['credits']>$zd_1d31a_2['creditsfrom'] && $zd_b3992_0['credits']<$zd_1d31a_2['creditsto']) { if($zd_b3992_0['gid'] != $zd_1d31a_2['gid']) { user__update($uid, array('gid'=>$zd_1d31a_2['gid'])); return true; } } } return false; } ?>