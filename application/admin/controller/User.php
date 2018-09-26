<?php
namespace app\admin\controller;

class User extends Base
{
    //用户列表
    public function index()
    {
        $where = '1=1';
        $userName = input('param.user_name');
        if(!empty($userName)){
            $where .= ' and user_name = "' . $userName . '"';
        }

        $list = db('chatuser')->where($where)->paginate(10);
        $this->assign([
            'list' => $list,
            'uname' => empty($userName) ? '' : $userName,
            'total' => $list->total(),
            'sex' => ['1' => '男', '-1' => '女']
        ]);

        return $this->fetch();
    }

}