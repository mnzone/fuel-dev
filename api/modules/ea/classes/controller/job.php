<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 17-2-16
 * Time: 上午9:37
 */

namespace ea;


class Controller_Job extends Controller_BaseController
{

    public function before(){
        parent::before();
    }

    public function post_save(){

        $data = \Input::post();
        $id = 0;
        $job = Model_Job::forge();
        if($id){
            $job = Model_Job::find($id);
        }

        $job->set($data);

        if($job->save()){
            $this->result = ['status' => 'succ', 'msg' => "", 'errcode' => 0];
        }

        $this->response($this->result, 200);
    }

    public function get_list(){
        $this->result = ['status' => 'succ', 'msg' => 'ok', 'errcode' => 0];

        $result = Model_Job::query()->get();
        $this->result['data'] = $result;
        $this->response($this->result, 200);
    }

    public function delete_job(){
        $this->result = ['status' => 'err', 'msg' => 'delete job'];
        $this->response($this->result, 200);
    }

    public function put_save(){
        $this->result = ['status' => 'err', 'msg' => 'put save'];
        $this->response($this->result, 200);
    }

    public function patch_save(){
        $this->result = ['status' => 'err', 'msg' => 'patch save'];
        $this->response($this->result, 200);
    }
}