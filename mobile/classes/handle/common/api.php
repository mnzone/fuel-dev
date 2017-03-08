<?php

/**
 * Created by PhpStorm.
 * User: ray
 * Date: 17-3-6
 * Time: 下午3:01
 */
namespace handle\common;

class API
{
    /**
     * 获取数据服务器访问凭证
     *
     * @param $user_id  用户ID
     * @return bool 返回凭证
     */
    public static function get_access_token($user_id){
        $key = "DATA_API_ACCESS_TOKEN_{$user_id}";
        $access_token = \handle\common\CacheTools::get_value($key);
        if( ! $access_token){
            $token = self::request('/auth/token', 'POST', ['user_id' => $user_id]);
            \Cache::set($key, $token->data->access_token, $token->expires_in);
            $access_token = $token->data->access_token;
        }
        return $access_token;
    }

    public static function request($url, $method = 'GET', $data = []){

        $host = \handle\common\CacheTools::get_value('data_api_host');
        if( ! $host){
            return false;
        }

        # 获取访问凭证
        $token = self::get_access_token(\Auth::get_user()->id);

        # 判断使用何种间隔符
        $span = strpos($url, '?') !== false ? '&' : '?';
        $url = "{$host}{$url}{$span}access_token={$token}";

        $uri = "{$host}{$url}";
        $result = \handle\common\UrlTool::request($uri,
            $method,
            $data,
            false,
            [
                'CURLOPT_REFERER' => \Config::get('base_url')
            ],
            [
                'Accept' => 'application/json;charset=utf-8;version=1'
            ]);

        return json_decode($result->body);
    }
}