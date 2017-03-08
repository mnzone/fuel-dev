
<?php
/**
 * 招聘管理
 *
 * Created by PhpStorm.
 * User: ray
 * Date: 17-2-15
 * Time: 下午11:18
 */


class Controller_Recruit extends Controller_BaseController
{

    public function before(){
        parent::before();
        \View::set_global([
            'controller_name' => '招聘管理'
        ]);
    }

    /**
     * 招聘管理
     */
    public function action_RecruitList(){

        $params = [
            'action_name' => "招聘管理",
            'title' => '招聘列表'
        ];

        \View::set_global($params);
        $this->template->content = \View::forge("default/Recruit/RecruitList");
    }

    /**
     * 招聘信息
     */
    public function action_RecruitView(){
        $id = \Input::get("id",0);
        if($id == 0){
            //找不到数据
        }

        $params = [
            'action_name' => "招聘信息",
            'title' => '招聘信息'
        ];

        \View::set_global($params);
        $this->template->content = \View::forge("default/Recruit/RecruitView");
    }

}