<?php

/**
 * Created by PhpStorm.
 * User: ray
 * Date: 17-2-16
 * Time: 上午9:36
 */
abstract class Controller_BaseController extends \Fuel\Core\Controller_Rest
{
    protected $cross_domain = false;
    protected $result = ['status' => 'err', 'msg' => '', 'errcode' => -1];

    public function before(){
        parent::before();

        if (\Fuel::$env !== Fuel::PRODUCTION) {
            return;
        }

        // 获取来源网站
        $from = parse_url(\Input::referrer());

        // 判断来源网站是否允许访问
        if( ! $from || ! isset($from['host']) || ! $this->get_allow_domain($from['host'])){
            $this->result = [
                'status' => 'err',
                'msg' => 'permission denied'
            ];

            $this->response($this->result, 404);
        }
    }

    public function after($response){

        //跨域访问
        if($this->cross_domain){
            // 数据json格式化
            $json = json_encode($this->result);

            // 生成跨域响应数据
            $callback = \Input::get('callback', false);
            $result = "{$callback}({$json})";
            die($result);
        }

        return parent::after($response);
    }

    /**
     * 判断来源网站是否有权访问
     *
     * @param $domain   来源网站域名
     * @return bool
     */
    protected function get_allow_domain($domain){

        $allows = [
            'console.fuel-dev.ray',
            'api.fuel-dev.ray',
            'mobile.fuel-dev.ray',
            'web.fuel-dev.ray'
        ];

        $host = parse_url(\Config::get('base_url'))['host'];

        // 是否本机访问
        $this->cross_domain = ! (\Input::server('SERVER_ADDR') == \Input::real_ip()
            && $domain == $host);

        return $this->cross_domain && in_array($domain, $allows);
    }
}