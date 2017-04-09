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
        $news = \Model_Node::query()
            //->select('id', 'title', 'created_at')
            ->order_by(array("id"=>"desc"))->limit(10)->get();

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
        $id = $id == 0 ? \Input::get('id',0) : $id;
        $news =  \Input::get('id',0);//\Model_Node::find($id);
        if(! $news){
            $this->result = [
                'status' => 'err',
                'msg' => '资源不存在',
                'tt'=>$news
            ];
            $this->response($this->result, 200);
            return;
        }

        $this->result = [
            'status' => 'succ',
            'msg' => '',
            'data' => $news
        ];
        $this->response($this->result, 200);
    }
}