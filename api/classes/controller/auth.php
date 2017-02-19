<?php

/**
 * Created by PhpStorm.
 * User: ray
 * Date: 17-2-19
 * Time: 下午8:15
 */
class Controller_Auth extends Controller_BaseController
{

    public function post_index(){

    }

    public function post_token(){
        $data = [
            'user_id' => 1
        ];

        $expires = 7200;

        $reresh_token_key = md5(\Str::random('alnum', 32));
        $access_token_key = md5(\Str::random('alpha', 32));
        \Cache::set($access_token_key, serialize($data), $expires);
        \Cache::set($reresh_token_key, serialize($data), $expires + 1000);

        $this->result = [
            'status' => 'succ',
            'errcode' => 0,
            'msg' => 'ok',
            'data' => [
                'access_token' => base64_encode($access_token_key),     // 获取到的凭证
                'expires_in' => $expires,                               // 凭证有效时间，单位：秒
                'refresh_token' => base64_encode($access_token_key)     // 用户刷新access_token
            ]
        ];
        $this->response($this->result, 200);
    }
}