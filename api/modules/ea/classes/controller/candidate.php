<?php
/**
 * 职位申请人列表
 * Created by PhpStorm.
 * User: ray
 * Date: 17-2-18
 * Time: 下午9:40
 */

namespace ea;


class Controller_Candidate extends Controller_BaseController
{
    /**
     *
     */
    public function before(){
        parent::before();

    }

    /**
     * 保存一个新资源
     * @param $data
     */
    private function save($data){

        if( ! $data){
            $this->result = ['status' => 'err', 'msg' => "缺少参数", 'errcode' => 100];
            return;
        }

        if(isset($data['id'])){
            unset($data['id']);
        }

        $job = Model_JobCandidate::forge($data);

        if($job->save()){
            $this->result = [
                'status' => 'succ',
                'msg' => "ok",
                'errcode' => 0
            ];
        }
    }

    private function update($data){
        if(\Input::get('id', false)){
            $candidate = \Model_JobCandidate::update_one($data, \Input::get('id'));
            if(is_null($candidate)){
                $this->result['msg'] = '资源不存在，无法更新';
            }else if($candidate === false){
                $this->result['msg'] = '资源更新失败';
            }else{
                $this->result = [
                    'status' => 'succ',
                    'msg' => 0,
                    'errcode' => 0,
                    'data' => $candidate
                ];
            }
        }else if(\Input::get('ids', false)){
            $row = \Model_JobCandidate::update_more($data, explode(",", \Input::get('ids')));
            if($row > 0){
                $this->result = [
                    'status' => 'succ',
                    'msg' => "update {$row} records",
                    'errcode' => 0
                ];
            }
        }else{
            // 数据不合法
            $this->result = ['status' => 'err', 'msg' => '缺少必要参数'];
        }
    }

    /**
     *  POST数据
     */
    public function post_index(){

        $data = \Input::post();
        $this->save($data);
        $this->response($this->result, 200);
    }

    public function delete_index(){

        if(\Input::get('id', false)){

            $candidate = \Model_JobCandidate::update_one([
                'is_deleted' => 1
            ], \Input::get('id'));

            if(is_null($candidate)){
                $this->result['msg'] = '资源不存在，无法删除';
            }else if($candidate === false){
                $this->result['msg'] = '资源删除失败';
            }else{
                $this->result = [
                    'status' => 'succ',
                    'msg' => 0,
                    'errcode' => 0
                ];
            }
        }else if(\Input::get('ids', false)){
            $row = \Model_JobCandidate::update_more([
                'is_deleted' => 1
            ], explode(",", \Input::get('ids')));
            if($row > 0){
                $this->result = [
                    'status' => 'succ',
                    'msg' => "deleted {$row} records",
                    'errcode' => 0
                ];
            }
        }else{
            // 数据不合法
            $this->result = ['status' => 'err', 'msg' => '缺少必要参数'];
        }
        $this->response($this->result, 200);
    }

    public function get_list(){
        $this->result = ['status' => 'succ', 'msg' => 'ok', 'errcode' => 0];

        $query = Model_JobCandidate::query()
            ->where([
                'is_deleted' => 0
            ])
            ->order_by(['updated_at' => 'desc', 'id' => 'desc', 'created_at' => 'desc']);

        list($result, $pagination) = Model_JobCandidate::get_pagination($query);

        $items = [];
        foreach ($result as $item){
            array_push($items, $item->to_array());
        }

        $this->result = [
            'status' => 'succ',
            'msg' => '',
            'errcode' => 0,
            'data' => $items,
            'total_page' => $pagination->__get('total_pages'),
            'current_page' => $pagination->__get('current_page') ? $pagination->__get('current_page') : 1
        ];

        $this->response($this->result, 200);
    }

    /**
     * 更新完整资源
     * @return array
     */
    public function put_index(){

        $this->update(\Input::put());

        $this->response($this->result, 200);
    }

    /**
     * 更新资源的部分属性
     */
    public function patch_index(){

        $this->update(\Input::patch());

        $this->response($this->result, 200);
    }
}