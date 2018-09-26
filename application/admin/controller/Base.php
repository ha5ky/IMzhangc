<?php
namespace app\admin\controller;

use think\Controller;

class Base extends Controller
{
    public function _initialize()
    {
        if(empty(cookie('username'))){

            $this->redirect(url('login/index'));
        }

        $this->assign([
            'username' => cookie('username')
        ]);
    }
}