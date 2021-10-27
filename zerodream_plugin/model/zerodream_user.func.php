
<?php

/*
    Powered by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 function zd_user_group_update($uid, $admin=false) { global $grouplist; $zd_b6e8a_0 = user__read($uid); if(!$admin) if($zd_b6e8a_0['gid']<100) return false; foreach($grouplist as $zd_18949_2) { if($zd_18949_2['gid'] < 100) continue; if($zd_b6e8a_0['credits']>$zd_18949_2['creditsfrom'] && $zd_b6e8a_0['credits']<$zd_18949_2['creditsto']) { if($zd_b6e8a_0['gid'] != $zd_18949_2['gid']) { user__update($uid, array('gid'=>$zd_18949_2['gid'])); return true; } } } return false; } ?>