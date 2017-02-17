<?php

/**
 * Created by PhpStorm.
 * User: ray
 * Date: 17-2-17
 * Time: 下午4:41
 */
class Controller_CrossDomainProxy extends \Controller_BaseController
{
    public function action_index(){

        $url = \Input::get('remote', false);
        if( ! $url){
            die();
        }

        $url = base64_decode($url);
        $response = \handle\common\UrlTool::request($url, \Input::method(), $this->get_params());

        die($response->body);
    }

    private function get_params(){
        $values = false;
        switch (\Input::method()){
            case 'GET':
                $values = \Input::get();
                break;
            case 'POST':
                $values = \Input::post();
                break;
            case 'PUT':
                $values = \Input::put();
                break;
            case 'DELETE':
                $values = \Input::delete();
                break;
            case 'PATCH':
                $values = \Input::patch();
                break;
        }

        return $values;
    }
}