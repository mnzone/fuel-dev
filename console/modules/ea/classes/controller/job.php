<?php
/**
 * 职位管理
 *
 * Created by PhpStorm.
 * User: ray
 * Date: 17-2-15
 * Time: 下午11:18
 */

namespace ea;


class Controller_Job extends Controller_BaseController
{

    public function before(){
        parent::before();
        \View::set_global([
            'controller_name' => '职位管理'
        ]);
    }

    /**
     * 查看所有职位
     */
    public function action_index(){

        $params = [
            'action_name' => "管理职位",
            'title' => '管理所有职位'
        ];

        \View::set_global($params);
        $this->template->content = \View::forge("{$this->theme}/job/index");
    }

    /**
     * 查看某个职位
     * @param int $id
     */
    public function action_view($id = 0){
        \View::set_global([
            'action_name' => "职位详情 —— XXX职位详细信息"
        ]);
    }

    /**
     * 发布职位
     */
    public function action_publish(){

        $params = [
            'action_name' => "发布新职位",
            'title' => '发布新职位'
        ];

        \View::set_global($params);
        $this->template->content = \View::forge("{$this->theme}/job/details");
    }

    /**
     * 保存或更新职位
     *
     * @param int $id   职位ID
     */
    public function action_save($id = 0){

    }

    /**
     * 删除职位
     *
     * @param int $id   职位ID
     */
    public function action_delete($id = 0){

    }

    /**
     * 查询某职位申请人列表
     *
     * @param int $job_id   职位ID
     */
    public function action_candidate($job_id = 0){

    }

}