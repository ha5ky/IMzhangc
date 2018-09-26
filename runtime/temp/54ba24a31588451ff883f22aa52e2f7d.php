<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"C:\phpStudy\PHPTutorial\WWW\ichat\public/../application/index\view\index\index.html";i:1530523314;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laychat-v3.0</title>
    <link rel="stylesheet" href="/static/common/layui/css/layui.css" media="all">
    <style>.layui-layim-user{cursor: pointer}</style>
    <script src="/static/common/jquery.min.js"></script>
    <script src="/static/common/RecordRTC.js"></script>
</head>
<body>
<input type="hidden" id="audio_src"/>
<!-- audio box -->
<div class="wrapper wrapper-content animated" id="audio_box" style="display: none;margin-top: 10px">
    <div class="row">
        <span id="tips" style="margin-left:26%; color:red;"></span>
        <div class="col-sm-12" style="text-align: center;margin-top:10px">
            <img src="/static/common/images/audio.png" width="100px" height="100px" id="a_pic"/>
        </div>
    </div>
    <div class="col-sm-4 col-sm-offset-4" style="margin:10px 0px 0px 20px">
        <button class="layui-btn layui-btn-small" id="say">开始说话</button>
        <button class="layui-btn layui-btn-small layui-btn-danger layui-btn-disabled" id="over—say">结束发送</button>
    </div>
</div>
<!-- audio box -->
<script type="text/javascript">
    var my_events;
    var user_list_url = "<?php echo url('index/index/getList'); ?>";
    var member_list_url = "<?php echo url('index/index/getMembers'); ?>";
    var upload_img_url = "<?php echo url('index/upload/uploadimg'); ?>";
    var upload_file_url = "<?php echo url('index/upload/uploadFile'); ?>";
    var msg_box_url = "<?php echo url('index/Msgbox/index'); ?>";
    var find_url = "<?php echo url('index/findgroup/index'); ?>";
    var chatlog_url = "<?php echo url('index/Chatlog/index'); ?>";
    var change_sign_url = "<?php echo url('index/chatuser/changeSign'); ?>";
    var chat_user_url = "<?php echo url('index/chatuser/index'); ?>";
    var save_audio_url = "<?php echo url('index/tools/saveAudio'); ?>";
    var get_noread_url = "<?php echo url('index/msgbox/getNoRead'); ?>";
    var uid = "<?php echo $uinfo['id']; ?>";
    var uname = "<?php echo $uinfo['username']; ?>";
    var avatar = "<?php echo $uinfo['avatar']; ?>";
    var sign = "<?php echo $uinfo['sign']; ?>";
    var join_group_url = "<?php echo url('index/findgroup/joinDetail'); ?>";
</script>
<script src="/static/common/layui/layui.js"></script>
<script type="text/javascript" src="/static/common/js/audio.js"></script>
<script type="text/javascript" src="/static/common/js/main.js"></script>
</body>
</html>