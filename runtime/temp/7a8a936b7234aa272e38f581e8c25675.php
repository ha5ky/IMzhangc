<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"C:\PHPTutorial\WWW\ichat\public/../application/index\view\login\index.html";i:1530447203;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Laychat-v3.0 - 登录</title>
    <link href="/static/common/layui/css/layui.css" rel="stylesheet">
    <link href="/static/common/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/common/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/static/common/css/animate.min.css" rel="stylesheet">
    <link href="/static/common/css/style.min.css" rel="stylesheet">
    <link href="/static/common/css/login.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>
        if(window.top!==window.self){window.top.location=window.location};
    </script>

</head>
<body class="signin">
    <div class="signinpanel">
        <div class="row">
            <div class="col-sm-7">
                <div class="signin-info">
                    <div class="logopanel m-b">
                        <h1>[ Laychat-v3.0 ]</h1>
                    </div>
                    <div class="m-b"></div>
                    <h4>欢迎使用 <strong>Laychat-v3.0</strong></h4>
                    <strong>还没有账号？ <a href="<?php echo url('login/register'); ?>" target="_blank">立即注册&raquo;</a></strong>
                </div>
            </div>
            <div class="col-sm-5">
                <form method="post" action="<?php echo url('login/dologin'); ?>" id="login_form">
                    <h4 class="no-margins">登录：</h4>
                    <p class="m-t-md">登录到Laychat-v3.0聊天页面</p>
                    <input type="text" class="form-control uname" placeholder="用户名" name="user_name" required/>
                    <input type="password" class="form-control pword m-b" placeholder="密码" name="pwd" required/>
                    <button class="btn btn-success btn-block" id="login_btn">登录</button>
                </form>
            </div>
        </div>
        <div class="signup-footer">
            <div class="pull-left">
                &copy; 2017 All Rights Reserved. Laychat-v3.0
            </div>
        </div>
    </div>
    <script src="/static/common/jquery.min.js"></script>
    <script src="/static/common/bootstrap.min.js?v=3.3.6"></script>
    <script src="/static/common/layui/layui.js"></script>
    <script src="/static/common/jquery.form.js"></script>
    <script type="text/javascript">
        $(function(){
            var options = {
                beforeSubmit:showStart,
                success:showSuccess
            };
            $('#login_form').submit(function(){
                $(this).ajaxSubmit(options);
                return false;
            });

            function showStart(){
                layui.use(['layer'], function(){
                    var layer = layui.layer;
                    layer.ready(function(){
                        layer.load(0, {shade:false, time:100});
                    });
                });
                return true;
            }

            function showSuccess(data){
                layui.use(['layer'], function(){
                    var layer = layui.layer;
                    layer.ready(function(){
                        if( 1 == data.code ){
                            layer.msg(data.msg, {'time' : 2000});
                            window.location.href = data.data;
                        }else{
                            layer.msg(data.msg, {'time' : 2000});
                        }
                    });
                });
            }
        });
    </script>
</body>
</html>