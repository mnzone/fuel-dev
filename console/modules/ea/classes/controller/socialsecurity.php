<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 17-2-18
 * Time: 下午5:21
 */

namespace ea;

class Controller_SocialSecurity extends Controller_BaseController
{

    public function before(){
        parent::before();
        \View::set_global([
            'controller_name' => '社保业务'
        ]);
    }

    /**
     * 社保申请查询
     */
    public function action_apply(){

        $params = [
            'action_name' => "报名管理",
            'title' => '报名列表'
        ];

        \View::set_global($params);
        $this->template->content = \View::forge("{$this->theme}/socialsecurity/apply");
    }
}