
<?php
/**
 * 社保服务
 *
 * Created by PhpStorm.
 * User: ray
 * Date: 17-2-15
 * Time: 下午11:18
 */


class Controller_Service extends Controller_BaseController
{

    public function before(){
        parent::before();
        \View::set_global([
            'controller_name' => '社保服务'
        ]);
    }

    /**
     * 个人中心
     */
    public function action_index(){

        $params = [
            'action_name' => "社保服务",
            'title' => '代缴社保服务'
        ];

        \View::set_global($params);
        $this->template->content = \View::forge("default/Service/index");
    }

    public function action_identityinfo(){
         $params = [
            'action_name' => "个人信息",
            'title' => '填写个人信息'
        ];

        \View::set_global($params);
        $this->template->content = \View::forge("default/Service/IdentityInfo");
    }

    //提交缴纳资料
    public function action_save(){
          \Response::redirect("/service/SocialSecurityNew");
    }

    //缴纳社保s  公积金
    public function action_SocialSecurityNew(){
        $params = [
            'action_name' => "个人信息",
            'title' => '填写个人信息'
        ];

        \View::set_global($params);
        $this->template->content = \View::forge("default/Service/SocialSecurityNew");
    }

    //验证 是否参过保
    public function action_CheckIdentityCode(){
        //$result="sfzcz";//身份证已存在
        //$result="nlg";//请登陆
        $result="ok";//

        //$result="";//
        die($result);
    }

    //  代办服务
    public function action_AgencyService(){
        $params = [
            'action_name' => "代办服务",
            'title' => '代办服务'
        ];

        \View::set_global($params);
        $this->template->content = \View::forge("default/Service/AgencyService");
    }

}