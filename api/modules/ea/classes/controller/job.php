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

    /**
     *
     */
    public function before(){
        parent::before();

    }

    private function save($data, $id = 0){

        $job = Model_Job::forge();
        if($id){
            $job = Model_Job::find($id);
        }

        if( ! $data){
            $this->result = ['status' => 'err', 'msg' => "缺少参数", 'errcode' => 100];
            return;
        }
        $job->set($data);

        if($job->save()){
            $this->result = ['status' => 'succ', 'msg' => "", 'errcode' => 0];
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
        $params = \Input::delete();

        if( (! isset($params['id']) || ! $params['id']) && ! $params['ids']){
            $this->result['msg'] = '缺少必要参数';
            $this->result['errcode'] = 100;
            return $this->response($this->result, 200);
        }

        if($params['ids']){
            // 是否批量更新
            $table = \DB::table_prefix('jobs');
            $row = \DB::update($table)
                ->set([
                    'is_deleted' => 1
                ])
                ->where('id', 'in', explode(",", $params['ids']))
                ->execute();
            $this->result = ['status' => 'succ', 'msg' => "update {$row} records", 'errcode' => 0];
        }else{
            $job = \ea\Model_Job::find($params['id']);
            $job->is_deleted = 1;
            if( ! $job->save()){
                $this->result['msg'] = '操作失败';
                $this->result['errcode'] = 111;
                return $this->response($this->result, 200);
            }

            $this->result = ['status' => 'succ', 'msg' => '', 'errcode' => 0];
        }
        $this->response($this->result, 200);
    }

    public function get_index(){
        $this->get_list();
    }

    public function get_list(){
        $this->result = ['status' => 'succ', 'msg' => 'ok', 'errcode' => 0];

        $query = Model_Job::query()
            ->select(['is_deleted' => false])
            ->where([
                'is_deleted' => 0
            ])
            ->order_by(['updated_at' => 'desc', 'id' => 'desc', 'created_at' => 'desc']);

        list($result, $pagination) = Model_Job::get_pagination($query);

        $items = [];
        foreach ($result as $value){
            $item = $value->to_array();
            $item['company'] = $value->company->to_array();
            array_push($items, $item);
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

    public function get_item(){
        $this->result = ['status' => 'succ', 'msg' => 'ok', 'errcode' => 0];
        $id = \Input::get("id",0);
        $item = Model_Job::query()
            ->select(['is_deleted' => false])
            ->where([
                'is_deleted' => 0,
                'id' => $id
            ])->get_one();

        $this->result = [
            'status' => 'succ',
            'msg' => '',
            'errcode' => 0,
            'data' => $item
        ];

        $this->response($this->result, 200);
    }

    public function put_index(){

        $id = \Input::get('id', false);
        $ids = \Input::get('ids', false);

        if( ! $id && ! $ids){
            return $this->result = ['status' => 'err', 'msg' => '缺少必要参数'];
        }

        if($ids){
            // 是否批量更新
            $table = \DB::table_prefix('jobs');
            $row = \DB::update($table)
                ->set([
                    'updated_at' => time()
                ])
                ->where('id', 'in', explode(",", $ids))
                ->execute();
            $this->result = ['status' => 'succ', 'msg' => "update {$row} records", 'errcode' => 0];
        }else{
            \Log::error('d');
            $this->save(\Input::put(), $id);
        }

        $this->response($this->result, 200);
    }

    public function patch_index(){
        $this->result = ['status' => 'err', 'msg' => 'patch save'];
        $this->response($this->result, 200);
    }


}