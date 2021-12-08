
<?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/

 !defined('DEBUG') AND exit('Access Denied.'); if($method == 'GET') { $zd_uniqid = zd_uniqid($prefix=''); $zd_kv_zerodream_plugin = zd_kv_get('zerodream_plugin'); $zd_plugin_setting['key'] = $zd_kv_zerodream_plugin['key']; if(isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']=='on' || (isset($_SERVER['HTTP_X_FORWARDED_PROTO'])&&$_SERVER['HTTP_X_FORWARDED_PROTO']=='https')) $scheme = 'https'; else $scheme = 'http'; $host = $_SERVER['HTTP_HOST']; $apply_url = xn_urlencode("$scheme://$host/"); $zd_plugin_setting['key_apply_url'] = ZERODREAM_URL."zd_plugin-user-key_apply-$zd_uniqid-$apply_url.htm"; $zd_plugin_setting['key_query_url'] = url("../zd_plugin_user-key_query"); include _include(ADMIN_PATH.'view/htm/header.inc.htm');?>

<div class="row">
    <div class="col-12">
        
        <div class="row" style="margin-right:0;margin-left:0;">
            <div class="col-md-6 text-left" style="overflow:auto;padding-right:0;padding-left:0;">
                <div class="btn-group mb-3" role="group">
                    <?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/
 echo admin_tab_active($menu['plugin']['tab'], $action);?>
                    <a role="button" class="btn btn-secondary active" href="">插件设置</a>
                </div>
            </div>
            <div class="col-md-6 text-right" style="overflow:auto;padding-right:0;padding-left:0;">
                <div class="btn-group mb-3" role="group">
                    <a role="button" class="btn btn-dark" href="https://www.zerodream.top/xiuno.htm" target="_blank">零梦</a>
                    <a role="button" class="btn btn-dark" href="<?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/
 echo url(ZERODREAM_URL_THREAD.$plugins[$dir]['zd_tid']);?>" target="_blank">帮助</a>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h4 class="text-center"><?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/
 echo $plugins[$dir]['name'];?></h4>
                <!-- <div><?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/
 echo $dir;?></div> -->
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-10 mx-auto">

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

<div class="row">
    <div class="col-lg-8 mx-auto">
        
        <form action="<?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/
 echo url("plugin-setting-$dir");?>" method="post" id="form">
            <div class="form-group">
                <div class="alert alert-warning">
                    <a href="https://www.zerodream.top/" target="_blank" style="color:#7d6828;">
                        零梦网站：www.zerodream.top
                    </a>
                </div>
            </div>
            <div id="key" class="form-group">
                <div class="mb-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text" style="width:80px;display:block;">
                                key
                            </div>
                        </div>
                        <input id="key_input" class="form-control" type="text" name="key" value="<?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/
 echo $zd_plugin_setting['key'];?>" placeholder="key" 
                            style="width:60%;background-color:white;">
                        <!--<textarea id="key_input" class="form-control" type="text" name="key" placeholder="key"><?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/
 echo $zd_plugin_setting['key'];?></textarea>-->
                    </div>
                </div>
                <div class="row mb-2" style="margin-right:0;margin-left:0;justify-content:center;">
                    <div class="mr-2">
                        <a role="button" class="btn btn-primary" id="key_apply" href="<?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/
 echo $zd_plugin_setting['key_apply_url'];?>" onclick="zd_key_apply();" target="_blank">
                            申请 key
                        </a>
                    </div>
                    <div class="mr-2">
                        <a role="button" class="btn btn-primary" href="javascript:void(0);" onclick="zd_key_copy()">
                            复制 key
                        </a>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" id="submit" data-loading-text="<?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/
 echo lang('submiting');?>...">
                    <?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/
 echo lang('confirm');?>
                </button>
            </div>
        </form>
        
        <div class="form-group">
            <a role="button" class="btn btn-secondary btn-block mt-3" href="javascript:history.back();">
                <?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/
 echo lang('back');?>
            </a>
        </div>
        
    </div>
</div>

                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/
 include _include(ADMIN_PATH.'view/htm/footer.inc.htm');?>

<script>
    $('#nav li.nav-item-plugin').addClass('active');
</script>

<!-- 百度统计 -->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?45e9d898567de3fa705b5f16d62582c3";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

<!-- 友盟统计 -->
<script>$.require('https://s4.cnzz.com/z_stat.php?id=1277872193&web_id=1277872193');</script>

<script>
    var jform = $("#form");
    var jsubmit = $("#submit");
    var referer = location.href;
    jform.on('submit', function(){
        jform.reset();
        jsubmit.button('loading');
        var postdata = jform.serialize();
        $.xpost(jform.attr('action'), postdata, function(code, message) {
            if(code == 0) {
                $.alert(message);
                jsubmit.button(message).delay(1000).location();
            } else {
                $.alert(message);
                jsubmit.button('reset');
            }
        });
        return false;
    });
</script>

<script>
    var key_apply = $('#key_apply');
    function zd_key_apply() {
        key_apply.button('loading');
        _zd_key_apply();
    }
    function _zd_key_apply() {
        var post_url = '<?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/
 echo $zd_plugin_setting['key_query_url'];?>';
        var post_data = {'apply_id':'<?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/
 echo $zd_uniqid;?>', 'apply_url':'<?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/
 echo $apply_url;?>'};
        $.xpost(post_url, post_data, function(code, message) {
            if(code==0) {
                $.alert(message);
                key_apply.button(message).delay(3000).location('<?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/
 echo url('plugin-zerodream_plugin_cloud-index');?>');
            } else if(code==1) {
                $.alert(message);
                key_apply.button(message).delay(3000).location();
            } else if(code==2) {
                setTimeout('_zd_key_apply();', 3000);
            } else if(code==3) {
                $.alert(message);
                key_apply.button(message).delay(3000).location();
            }
        });
    }
</script>

<script>
    function zd_key_copy() {
        var key_input = document.getElementById("key_input");
        key_input.select(); // 选择对象
        document.execCommand("copy"); // 执行浏览器复制命令
        $.alert("复制成功");
    }
</script>

<!-- 提前访问，更快的加载速度 -->
<script>
    var url = '<?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/
 echo url('plugin-zerodream_plugin_plugin');?>';
	$.ajax({
		type: 'GET',
		url: url,
		dataType: 'html',
		timeout: 6000000,
		success: function(r) {}
	});
</script><?php

/*
    Powered by ZeroDream
    Optimized by ZeroDream
	https://www.zerodream.top/xiuno.htm
	
	修改文件将有禁止使用帐户风险
*/
  } else { $key = param('key'); $zd_kv_zerodream_plugin = zd_kv_get('zerodream_plugin'); $zd_kv_zerodream_plugin['key'] = $key; zd_kv_set('zerodream_plugin', $zd_kv_zerodream_plugin); message(0, '修改成功'); } ?>