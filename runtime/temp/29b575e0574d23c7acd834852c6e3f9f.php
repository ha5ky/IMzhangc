<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"C:\phpStudy\PHPTutorial\WWW\ichat\public/../application/index\view\msgbox\index.html";i:1530608283;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>消息盒子</title>
    <link rel="stylesheet" href="/static/common/layui/css/layui.css">
    <style>
        .layim-msgbox{margin: 15px;}
        .layim-msgbox li{position: relative; margin-bottom: 10px; padding: 0 130px 10px 60px; padding-bottom: 10px; line-height: 22px; border-bottom: 1px dotted #e2e2e2;}
        .layim-msgbox .layim-msgbox-tips{margin: 0; padding: 10px 0; border: none; text-align: center; color: #999;}
        .layim-msgbox .layim-msgbox-system{padding: 0 10px 10px 10px;}
        .layim-msgbox li p span{padding-left: 5px; color: #999;}
        .layim-msgbox li p em{font-style: normal; color: #FF5722;}

        .layim-msgbox-avatar{position: absolute; left: 0; top: 0; width: 50px; height: 50px;}
        .layim-msgbox-user{padding-top: 5px;}
        .layim-msgbox-content{margin-top: 3px;}
        .layim-msgbox .layui-btn-small{padding: 0 15px; margin-left: 5px;}
        .layim-msgbox-btn{position: absolute; right: 0; top: 12px; color: #999;}
    </style>
</head>
<body>

<ul class="layim-msgbox" id="LAY_view"></ul>

<textarea title="消息模版" id="LAY_tpl" style="display:none;">
{{# layui.each(d.data, function(index, item){
  if(item.from){ }}
    <li data-uid="{{ item.from }}" data-fromGroup="{{ item.from_group }}" data-id="{{ item.id }}">
        <a href="javascript:;">
            <img src="{{ item.user.avatar }}" class="layui-circle layim-msgbox-avatar">
        </a>
        <p class="layim-msgbox-user">
            <a href="javascript:;">{{ item.user.username||'' }}</a>
            <span>{{ item.time }}</span>
        </p>
        <p class="layim-msgbox-content">
            {{ item.content }}
            <span>{{ item.remark ? '附言: '+item.remark : '' }}</span>
        </p>
        {{#  if(item.agree == 0){ }}
        <p class="layim-msgbox-btn">
            <button class="layui-btn layui-btn-small" data-type="agree">同意</button>
            <button class="layui-btn layui-btn-small layui-btn-primary" data-type="refuse">拒绝</button>
        </p>
        {{# } else if(item.agree == 1){ }}
        <p class="layim-msgbox-btn">
            已同意
        </p>
        {{# } else { }}
        <p class="layim-msgbox-btn">
            <em>已拒绝</em>
        </p>
        {{#  } }}
    </li>
  {{# } else { }}
    <li class="layim-msgbox-system">
        <p><em>系统：</em>{{ item.content }}<span>{{ item.time }}</span></p>
    </li>
  {{# }
}); }}
</textarea>
<script src="/static/common/layui/layui.js"></script>
<script type="text/javascript">
    var socket = new WebSocket('ws://127.0.0.1:8282');

    layui.use(['layim', 'flow'], function(){
        var layim = layui.layim
                ,layer = layui.layer
                ,laytpl = layui.laytpl
                ,$ = layui.jquery
                ,flow = layui.flow;

        var cache = {}; //用于临时记录请求到的数据

        //请求消息
        var renderMsg = function(page, callback){

            //获取消息盒子
            $.post('getmsg', {
                page: page || 1
            }, function(res){
                if(res.code != 0){
                    return layer.msg(res.msg);
                }

                //记录来源用户信息
                layui.each(res.data, function(index, item){
                    cache[item.from] = item.user;
                });

                callback && callback(res.data, res.pages);
            });
        };

        //消息信息流
        flow.load({
            elem: '#LAY_view' //流加载容器
            ,isAuto: false
            ,end: '<li class="layim-msgbox-tips">暂无更多新消息</li>'
            ,done: function(page, next){ //加载下一页
                renderMsg(page, function(data, pages){
                    var html = laytpl(LAY_tpl.value).render({
                        data: data
                        ,page: page
                    });
                    next(html, page < pages);
                });
            }
        });

         //打开页面即把消息标记为已读
         $.post('read', {read: 2}, function(){});

        //操作
        var active = {
            //同意
            agree: function(othis){
                var li = othis.parents('li')
                        ,uid = li.data('uid')
                        ,from_group = li.data('fromgroup')
                        ,user = cache[uid]
                        ,id = li.data('id');

                //选择分组
                parent.layui.layim.setFriendGroup({
                    type: 'friend'
                    ,username: user.username
                    ,avatar: user.avatar
                    ,group: parent.layui.layim.cache().friend //获取好友分组数据
                    ,submit: function(group, index){
                        //同意接口
                        $.post('agreeFriend', {
                             uid: uid //对方用户ID
                             , from_group: from_group //对方设定的好友分组
                             , group: group //我设定的好友分组
                             , id : id
                         }, function(res){
                                 if(res.code != 0){
                                    return layer.msg(res.msg);
                                 }

                                 //将好友追加到主面板
                                 parent.layui.layim.addList({
                                     type: 'friend'
                                     , avatar: user.avatar //好友头像
                                     , username: user.username //好友昵称
                                     , groupid: group //所在的分组id
                                     , id: uid //好友ID
                                     , sign: user.sign //好友签名
                                 });
                                //通知对方将我加入好友列表
                                var data = '{"type":"addFriend", "toid":"' + uid + '", "id":"<?php echo $uid; ?>", "username":"<?php echo $username; ?>", "avatar":"<?php echo $avatar; ?>", "sign":"<?php echo $sign; ?>", "groupid":"' + from_group + '"}';
                                socket.send(data);

                                parent.layer.close(index);
                                othis.parent().html('已同意');
                             });
                        }
                });
            }

            //拒绝
            ,refuse: function(othis){
                var li = othis.parents('li')
                        , uid = li.data('uid')
                        , id = li.data('id');

                layer.confirm('确定拒绝吗？', function(index){
                    $.post('refuseFriend', {
                        uid : uid, //对方用户ID
                        id : id
                    }, function(res){
                        if(res.code != 0){
                            return layer.msg(res.msg);
                        }
                        layer.close(index);
                        othis.parent().html('<em>已拒绝</em>');
                    });
                });
            }
        };

        $('body').on('click', '.layui-btn', function(){
            var othis = $(this), type = othis.data('type');
            active[type] ? active[type].call(this, othis) : '';
        });
    });
</script>
</body>
</html>