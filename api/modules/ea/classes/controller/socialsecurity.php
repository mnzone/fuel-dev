<?php
/**
 * Created by PhpStorm.
 * User: Ray
 * Date: 2017/3/12
 * Time: 下午10:23
 */

namespace ea;


class Controller_SocialSecurity extends Controller_BaseController
{
    /**
     *  POST数据
     */
    public function post_index(){

        $data = \Input::post();

        if( ! $data){
            return $this->result = ['status' => 'err', 'msg' => '缺少参数', 'errcode' => 100];
        }

        $job = Model_SocialSecurity::forge($data);

        if($job->save()){
            $this->result = ['status' => 'succ', 'msg' => "", 'errcode' => 0];
        }

        $this->response($this->result, 200);
    }

    public function get_index(){
        $type = \Input::get('type', 'social');

        $list = Model_SocialSecurity::query()
            ->where([
                'type' => $type
            ])
            ->get();

        $items = [];
        foreach ($list as $value) {
            $item = $value->to_array();
            array_push($items, $item);
        }

        $this->result = [
            'status' => 'succ',
            'msg' => '',
            'errcode' => 0,
            'data' => $items
        ];
        $this->response($this->result, 200);
    }
}