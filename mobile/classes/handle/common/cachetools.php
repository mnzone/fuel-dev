<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 17-2-16
 * Time: 上午11:47
 */

namespace handle\common;


class CacheTools
{

    public static function get_value($key, $default = false){

        /*****    测试    ****/
        \Cache::set('data_api_host', 'http://api.fuel.ray');
        \Session::set('access_token', base64_encode(\Str::random('alnum', 16)));
        /*****   end  ****/
        $value = $default;
        try{
            $value = \Cache::get($key);
        }catch (\CacheNotFoundException $e){
            \Log::error("cache key '{$key}' is not found");
        }

        return $value;
    }
}