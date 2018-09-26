<?php
namespace app\admin\controller;

class Group extends Base
{

	public function index()
    {
        $where = '1=1';
        $groupName = input('param.group_name');
        if(!empty($groupName)){
            $where .= ' and group_name = "' . $groupName . '"';
        }

        $list = db('chatgroup')->where($where)->order('addtime desc')->paginate(10);
        $this->assign([
            'list' => $list,
            'gname' => empty($groupName) ? '' : $groupName,
            'total' => $list->total(),
            'status' => config('group_status')
        ]);

        return $this->fetch();
    }
    //群组设置
    public function editGroup()
    {
        if(request()->isPost()){

            $data = input('post.');
            writeConfig($data);
            return json(['code' => 1, 'data' => '', 'msg' => '配置成功']);
        }

        $config = readConfig();
        empty($config) && $config = ['make' => 1, 'maxgroup' => 10, 'maxjoin' => 20, 'pass' => -1];

        $this->assign([
            'config' => $config
        ]);

        return $this->fetch();
    }
    //审核群组
    public function pass()
    {
        if(request()->isAjax()){

            $id = input('post.id');
            $status = input('post.status');
            $flag = db('chatgroup')->where('id', $id)->setField('status', $status);

            if(false === $flag){
                return json(['code' => -1, 'data' => '', 'msg' => '审核失败']);
            }

            return json(['code' => 1, 'data' => '', 'msg' => '审核成功']);
        }
    }
}