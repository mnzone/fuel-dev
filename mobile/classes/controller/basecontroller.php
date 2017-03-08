<?php

/**
 * Created by PhpStorm.
 * User: ray
 * Date: 17-2-16
 * Time: 上午9:36
 */
abstract class Controller_BaseController extends \Controller_Template
{

    public $template = 'template';
    public $theme = 'default';

    public function before(){
        parent::before();

        if( ! \handle\common\CacheTools::get_value('data_api_host')){
            \Cache::set('data_api_host', 'http://api.5ztx.com');
        }

        if( ! \Session::get('ACCESS_TOKEN', false)){
            $headers = [
                'Accept' => 'application/json;charset=utf-8;version=1'
            ];

            $result = \handle\common\UrlTool::request_post(\Cache::get('data_api_host') . '/auth/token', ['user_id' => 2], false, $headers);

            $token = json_decode($result->body);
            \Session::set('ACCESS_TOKEN', $token);
            \Session::set('access_token', $token->data->access_token);
        }

    }

    public function action_404(){
        die('404');
    }
}