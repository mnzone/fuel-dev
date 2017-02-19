
<?php
/**
 * 个人中心
 *
 * Created by PhpStorm.
 * User: ray
 * Date: 17-2-15
 * Time: 下午11:18
 */


class Controller_PersonalCenter extends Controller_BaseController
{

    public function before(){
        parent::before();
        \View::set_global([
            'controller_name' => '个人中心'
        ]);
    }

    /**
     * 个人中心
     */
    public function action_index(){

        $params = [
            'action_name' => "个人中心",
            'title' => '个人中心'
        ];

        \View::set_global($params);
        $this->template->content = \View::forge("default/PersonalCenter/index");
    }

    //我的资料
    public function action_MyProfile(){
        $params = [
            'action_name' => "我的资料",
            'title' => '我的资料'
        ];

        \View::set_global($params);
        $this->template->content = \View::forge("default/PersonalCenter/MyProfile");
    }

    //修改密码
    public function action_ChangePassword(){
        $params = [
            'action_name' => "修改密码",
            'title' => '修改密码'
        ];

        \View::set_global($params);
        $this->template->content = \View::forge("default/PersonalCenter/ChangePassword");   
    }

    //意见反馈
    public function action_mFeedback(){
        $params = [
            'action_name' => "意见反馈",
            'title' => '意见反馈'
        ];

        \View::set_global($params);
        $this->template->content = \View::forge("default/PersonalCenter/mFeedback");
    }

}