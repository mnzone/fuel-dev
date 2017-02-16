<?php
/**
 * 职位申请人管理
 *
 * Created by PhpStorm.
 * User: ray
 * Date: 17-2-15
 * Time: 下午11:26
 */

namespace ea;


class Controller_Candidate extends Controller_BaseController
{
    public function before(){
        parent::before();
        \View::set_global([
            'controller_name' => '在线报名管理'
        ]);
    }

    /**
     * 查看所有职位
     */
    public function action_index(){

        $params = [
            'action_name' => "管理在线报名列表",
            'title' => '管理在线报名列表'
        ];

        \View::set_global($params);
        $this->template->content = \View::forge("{$this->theme}/candidate/index");
    }

    public function action_view(){

    }

    public function action_enroll(){

    }

    public function action_save($id = 0){

    }
}