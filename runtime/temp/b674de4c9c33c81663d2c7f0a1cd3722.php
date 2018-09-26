<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"C:\phpStudy\PHPTutorial\WWW\ichat\public/../application/index\view\findgroup\index.html";i:1530856242;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>查找/添加群组</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/static/common/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/common/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/static/common/css/animate.min.css" rel="stylesheet">
    <link href="/static/common/css/style.min.css?v=4.1.0" rel="stylesheet">
    <link href="/static/common/layui/css/layui.css" rel="stylesheet"  media="all">
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="col-sm-12">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> 找人</a>
                </li>
                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">找群</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <form class="form-horizontal m-t" id="userForm" method="post">
                                        <input type="hidden" name="sex" id="sex"/><!--性别-->
                                        <input type="hidden" name="age" id="age"/><!--年龄-->
                                        <input type="hidden" name="pid" id="pid"/><!--省份id-->
                                        <input type="hidden" name="cid" id="cid"/><!--城市id-->
                                        <input type="hidden" name="aid" id="aid"/><!--区id-->
                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                <div class="input-group col-sm-12">
                                                    <input type="text" class="form-control" name="user_name" placeholder="请输入昵称" id="user_name" >
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <button data-toggle="dropdown" class="btn btn-white dropdown-toggle col-sm-12" type="button" aria-expanded="false">
                                                    <span id="csex">选择性别</span>
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="javascript:chsex(0);">不限</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:chsex(1);">男</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:chsex(-1);">女</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-2">
                                                <button data-toggle="dropdown" class="btn btn-white dropdown-toggle col-sm-12" type="button" aria-expanded="false">
                                                    <span id="cage">选择年龄</span>
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="javascript:chage('0-0');">不限</a>
                                                    </li>
                                                    <?php if(!empty($age)): if(is_array($age) || $age instanceof \think\Collection || $age instanceof \think\Paginator): if( count($age)==0 ) : echo "" ;else: foreach($age as $key=>$vo): ?>
                                                    <li>
                                                        <a href="javascript:chage('<?php echo $key; ?>');"><?php echo $vo; ?></a>
                                                    </li>
                                                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                                </ul>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-white col-sm-12" type="button" id="charea">
                                                        <span id="ssq">选择地区</span>
                                                        <span class="caret"></span>
                                                    </button>
                                                </div>
                                            </div>
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-primary" id="search">搜索</button>
                                            </span>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 推荐好友 -->
                    <div class="row">
                        <div class="col-sm-3"><label id="s_u_title">好友推荐</label></div>
                    </div>
                    <div class="row" id="s_u_data">
                        <?php if(!empty($user)): if(is_array($user) || $user instanceof \think\Collection || $user instanceof \think\Paginator): if( count($user)==0 ) : echo "" ;else: foreach($user as $key=>$vo): ?>
                        <div class="col-sm-3">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5><?php echo $vo['user_name']; ?></h5>
                                    <span style="margin-left: 10px"><i class="layui-icon" <?php if($vo['sex'] == 1): ?>style="color:#7CA3D2 "<?php else: ?>style="color:#FDA357"<?php endif; ?>>&#xe612;</i></span>
                                    <span style="margin-left: 10px"><?php echo $vo['age']; ?>岁</span>
                                </div>
                                <div class="ibox-content">
                                    <div style="margin: 0 auto">
                                        <img src="<?php echo $vo['avatar']; ?>" width="50px" height="50px"/>
                                        <span style="font-size: 10px;width:104px;overflow: hidden;display: inline-block"><?php echo $vo['area']; ?></span>
                                    </div>

                                    <div style="margin:10px 50px"><button class="btn btn-primary" type="button" data-uid="<?php echo $vo['id']; ?>" onclick="addFriend(this)">加好友</button></div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </div>
                </div>
                <div id="tab-2" class="tab-pane">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <form class="form-horizontal m-t" id="commentForm" method="post" action="">
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="search_txt" placeholder="输入群组名称" id="search_txt">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-primary" id="find">搜索</button>
                                                    </span>
                                                                    &nbsp;&nbsp;&nbsp;
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-w-m btn-warning" id="addGroup">创建群组</button>
                                                    </span>
                                                                    &nbsp;&nbsp;&nbsp;
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-w-m btn-primary" id="myGroup">我的群组</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 最近新建的分组 -->
                    <div class="row">
                        <div class="col-sm-3"><label id="search_title">最近新添加的群组</label></div>
                    </div>
                    <div class="row" id="search_data">
                        <?php if(!empty($group)): if(is_array($group) || $group instanceof \think\Collection || $group instanceof \think\Paginator): if( count($group)==0 ) : echo "" ;else: foreach($group as $key=>$vo): ?>
                        <div class="col-sm-3">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5><?php echo $vo['group_name']; ?></h5>
                                </div>
                                <div class="ibox-content">
                                    <div style="margin: 0 auto">
                                        <img src="<?php echo $vo['avatar']; ?>" width="50px" height="50px" style="margin-left:50px"/>
                                    </div>
                                    <div style="margin:10px 50px"><button class="btn btn-primary" type="button" data-id="<?php echo $vo['id']; ?>" data-owner="<?php echo $vo['owner_id']; ?>" onclick="joinGroup(this)">加入</button></div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 选择省市区 -->
<div class="wrapper wrapper-content animated" id="show" style="display: none">
    <div class="row">
        <div class="col-sm-12">
            <select class="form-control m-b" id="p">
                <option value="0" data-id="0">不限区域</option>
                <?php if(is_array($province) || $province instanceof \think\Collection || $province instanceof \think\Paginator): if( count($province)==0 ) : echo "" ;else: foreach($province as $key=>$vo): ?>
                <option value="<?php echo $vo['area_name']; ?>" data-id="<?php echo $vo['id']; ?>"><?php echo $vo['area_name']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <select class="form-control m-b" id="c" disabled>
                <option value="0" data-id="0">请选择城市</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <select class="form-control m-b" id="a" disabled>
                <option value="0" data-id="0">请选择区</option>
            </select>
        </div>
    </div>
    <div class="col-sm-4 col-sm-offset-4" style="margin-bottom: 10px">
        <button class="btn btn-primary" type="submit" id="makesure">确认</button>
    </div>
</div>
<input type="hidden" id="pname"/>
<input type="hidden" id="cname"/>
<input type="hidden" id="aname"/>

<script src="/static/common/jquery.min.js"></script>
<script src="/static/common/bootstrap.min.js?v=3.3.6"></script>
<script src="/static/common/layui/layui.js"></script>
<script type="text/javascript">
    var area_url = "<?php echo url('findgroup/getArea'); ?>";
    var search_user_url = "<?php echo url('finduser/index'); ?>";
    var search_group_url = "<?php echo url('findgroup/search'); ?>";
    var add_group_url = "<?php echo url('findgroup/addgroup'); ?>";
    var my_group_url = "<?php echo url('findgroup/myGroup'); ?>";
    var join_group_url = "<?php echo url('findgroup/joinGroup'); ?>";
    var check_group_url = "<?php echo url('findgroup/checkGroupAuth'); ?>";
    var apply_friend_url = "<?php echo url('msgbox/applyFriend'); ?>";
    var apply_group_url = "<?php echo url('findgroup/applyGroup'); ?>";
</script>
<script src="/static/common/js/find.js"></script>
</body>
</html>