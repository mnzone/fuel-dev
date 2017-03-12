<?php
/**
 * Created by PhpStorm.
 * User: Ray
 * Date: 2017/3/12
 * Time: 下午10:34
 */

namespace ea;


class Controller_News extends Controller_BaseController
{
    /**
     *  POST数据
     */
    public function post_index(){

        $data = \Input::post();

        if( ! $data){
            return $this->result = ['status' => 'err', 'msg' => '缺少参数', 'errcode' => 100];
        }

        $job = Model_Article::forge($data);

        if($job->save()){
            $this->result = ['status' => 'succ', 'msg' => "", 'errcode' => 0];
        }

        $this->response($this->result, 200);
    }

    /**
     * 新闻列表接口
     */
    public function get_index(){

        $news = \Model_Article::query()
            ->select('id', 'title', 'created_at')
            ->get();

        $items = [];
        foreach ($news as $item){
            array_push($items, $item->to_array());
        }

        $this->result = [
            'status' => 'succ',
            'msg' => '',
            'data' => $items
        ];
        $this->response($this->result, 200);
    }

    public function get_item($id = 0){
        $news = \Model_Article::find($id);

        if(! $news){
            return $this->result = [
                'status' => 'err',
                'msg' => '资源不存在'
            ];
        }

        return $this->result = [
            'status' => 'succ',
            'msg' => '',
            'data' => $news
        ];
    }
}