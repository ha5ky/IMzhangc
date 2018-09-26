<?php
namespace app\admin\controller;

class Chat extends Base
{
    public function index()
    {
        if(request()->isPost()){

            $data = input('post.');
            $data['file_ext'] = trim($data['file_ext']);
            $data['img_ext'] = trim($data['img_ext']);

            writeCtConfig($data);
            return json(['code' => 1, 'data' => '', 'msg' => '配置成功']);
        }

        $config = readCtConfig();

        empty($config) &&
        $config = ['file_size' => 2, 'file_ext' => 'zip|rar', 'img_size' => 2, 'img_ext' => 'png|jpg|gif'];

        $this->assign([
            'config' => $config,
            'up_size' => ini_get('upload_max_filesize')
        ]);

        return $this->fetch();
    }
}