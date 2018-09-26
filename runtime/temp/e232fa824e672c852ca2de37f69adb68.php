<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"C:\phpStudy\PHPTutorial\WWW\ichat\public/../application/index\view\findgroup\addgroup.html";i:1530504315;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>laychat-v3.0 - 创建群组</title>
    <link rel="stylesheet" href="/static/common/layui/css/layui.css">
</head>
<body>
<div class="main layui-clear" style="margin-top:15px">
    <div class="layui-form layui-form-pane" style="width: 70%;margin: 0 auto">
        <div class="layui-form-item">
            <label for="group_name" class="layui-form-label">群名称</label>
            <div class="layui-input-block">
                <input type="text" id="group_name" name="group_name" class="layui-input" >
            </div>
        </div>
        <input type="hidden" id="group_avatar"/>
        <div class="layui-form-item">
            <label for="group_name" class="layui-form-label">群头像</label>
            <div class="layui-input-block">
                <input name="avatar" class="layui-upload-file" type="file" id="avatar"/>
                <span style="margin-left: 5px" id="upimg">

                </span>
            </div>
        </div>
        <div class="layui-form-item" style="float:right">
            <button class="layui-btn" id="sub">提交</button>
        </div>
        <div class="layui-form-item fly-form-app">
            注：上传的图片只能是png、jpg，且大小为100kb以内<br/>
        </div>
    </div>
</div>
<script src="/static/common/layui/layui.js"></script>
<script src="/static/common/jquery.min.js"></script>
<script type="text/javascript">
    var add_group_url = "<?php echo url('findgroup/addgroup'); ?>";
    var up_img_url = "<?php echo url('Findgroup/upGroupAvatar'); ?>";
</script>
<script src="/static/common/js/group.js"></script>
</body>
</html>