<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"C:\PHPTutorial\WWW\ichat\public/../application/index\view\chatuser\index.html";i:1530461678;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>laychat-v3.0 - 修改个人资料</title>
    <link rel="stylesheet" href="/static/common/layui/css/layui.css">
</head>
<body>
<div class="main layui-clear" style="padding: 15px">
    <div class="layui-form layui-form-pane">
        <div id="user_info">
            <div class="layui-form-item">
                <label for="user_name" class="layui-form-label">用户名</label>
                <div class="layui-input-inline">
                    <input type="text" id="user_name" name="user_name" autocomplete="off"
                           class="layui-input" value="<?php echo $user['user_name']; ?>">
                </div>
                <input type="hidden" id="user_avatar" name="user_avatar"/>
                <div class="site-demo-upload" style="float: right">
                    <img id="LAY_demo_upload" src="<?php echo $user['avatar']; ?>" width="110px" height="110px">
                    <div class="site-demo-upbar">
                        <input name="avatar" class="layui-upload-file" id="avatar" type="file">
                    </div>
                </div>
            </div>

            <blockquote class="layui-elem-quote">
                修改密码
            </blockquote>
            <div class="layui-form-item">
                <label for="pwd" class="layui-form-label">旧密码</label>
                <div class="layui-input-inline">
                    <input type="password" id="oldpwd" name="oldpwd" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="pwd" class="layui-form-label">新密码</label>
                <div class="layui-input-inline">
                    <input type="password" id="pwd" name="pwd" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">6到16个字符</div>
            </div>
            <div class="layui-form-item">
                <label for="repwd" class="layui-form-label">重复新密码</label>
                <div class="layui-input-inline">
                    <input type="password" id="repwd" name="repwd" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">6到16个字符</div>
            </div>
            <div class="layui-form-item fly-form-app">
                注：密码改后下次登录用
            </div>

            <blockquote class="layui-elem-quote">
                个人信息
            </blockquote>
            <div class="layui-form-item">
                <label for="repwd" class="layui-form-label">性别</label>
                <div class="layui-input-block">
                    <input name="sex" value="1" title="男" <?php if($user['sex'] == 1): ?>checked=""<?php endif; ?> type="radio">
                    <input name="sex" value="-1" title="女" <?php if($user['sex'] == -1): ?>checked=""<?php endif; ?> type="radio">
                </div>
            </div>

            <div class="layui-form-item">
                <label for="repwd" class="layui-form-label">年龄</label>
                <div class="layui-input-inline">
                    <input name="age" lay-verify="number" autocomplete="off" class="layui-input" type="number"
                           value="<?php echo $user['age']; ?>" id="age">
                </div>
                <div class="layui-form-mid layui-word-aux">只能是数字</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">居住地区</label>
                <div class="layui-input-inline">
                    <select name="province" lay-filter="province">
                        <option value="">请选择省</option>
                    </select>
                </div>
                <div class="layui-input-inline">
                    <select name="city" lay-filter="city">
                        <option value="">请选择市</option>
                    </select>
                </div>
                <div class="layui-input-inline">
                    <select name="area" lay-filter="area">
                        <option value="">请选择县/区</option>
                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <button class="layui-btn" id="btn">确认提交</button>
            </div>
        </div>
    </div>
</div>
<script src="/static/common/layui/layui.js"></script>
<script src="/static/common/jquery.min.js"></script>
<script src="/static/common/layui/lay/modules/cityselect.js"></script>
<script type="text/javascript">
    var p_code = '<?php echo $user['pid']; ?>';
    var c_code = '<?php echo $user['cid']; ?>';
    var a_code = '<?php echo $user['aid']; ?>';
    var do_change_url = "<?php echo url('chatuser/doChange'); ?>";
    var up_avatar_url = "<?php echo url('chatuser/upavatar'); ?>";
</script>
<script type="text/javascript" src="/static/common/js/user.js"></script>
</body>
</html>