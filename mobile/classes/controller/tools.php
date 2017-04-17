<?php

/**
 * Created by PhpStorm.
 * User: ray
 * Date: 17-2-16
 * Time: 上午11:53
 */
class Controller_Tools extends \Controller_BaseController
{

    public function before(){
        parent::before();
    }

    public function action_clean(){
        \Cache::delete_all();
    }

    public function action_init_cache(){
        \Cache::set('data_api_host', 'http://api.ayzhongjie.com');
        \Session::set('access_token', base64_encode(\Str::random('alnum', 16)));

        $this->template->content = "初始化完成...";
    }

}