<?php

/**
 * Created by PhpStorm.
 * User: ray
 * Date: 17-2-16
 * Time: 上午9:36
 */
abstract class Controller_BaseController extends \Fuel\Core\Controller_Rest
{
    protected $cross_domain = false;            // 判断是否跨域访问
    protected $result = [];                     // 返回数据结果统计格式
    protected $user = false;                    // 用户实体
    protected $store = false;                   // 商户门店实体
    protected $wechat = false;                  // 微信帐户实体
    protected $wechat_openid = false;           // 微信帐户OPENID实体
    protected $mp_account = false;              // 微信公众号实体
    protected $seller = false;                  // 商户实体
    protected $version = 1;                     // 客户端调用的版本号

    public function before(){
        parent::before();
        $this->result = ['status' => 'err', 'msg' => '', 'errcode' => -1];
    }

    public function after($response){
        /*
        //跨域访问
        if($this->cross_domain && \Input::get('callback', false)){
            // 数据json格式化
            $json = json_encode($this->result);

            // 生成跨域响应数据
            $callback = \Input::get('callback', false);
            $result = "{$callback}({$json})";
            die($result);
        }
        */

        return parent::after($response);
    }

    public function action_404(){
        $this->response([], 404);
    }

    /**
     * 访问鉴权
     * @return bool
     */
    public function auth(){

        $this->version = $this->get_api_verion();

        if($this->get_not_token_allowed()){
            return true;
        }

        if( ! \Input::get('access_token', false)) {
            return false;
        }

        $value = false;

        $key = base64_decode(\Input::get('access_token'));

        \handle\common\CacheTools::get_value($key);
        // 未找到访问凭证,拒绝访问
        if($value === false){
            return false;
        }

        $data = json_decode(json_encode(unserialize($value)));
        $this->user = \Model_User::find($data->user_id);

        if(isset($data->openid) && $data->openid){
            $this->wechat_openid = \Model_WechatOpenid::find($data->openid);
            $this->wechat = $this->wechat_openid->wechat;
            $this->mp_account = \Model_WXAccount::find($this->wechat_openid->openid);
            $this->seller = $this->wx_account->seller;
        }

        return true;
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

    /**
     * 允许没有token时的访问列表
     *
     * @return array
     */
    protected function get_not_token_allowed(){
        $allowed = [
            [
                'module' => 'api',
                'controllers' => [
                    'account' => [
                        'login', 'logout', 'register'
                    ]
                ]
            ],
            /* 该项配置必须是最后一项 */
            [
                'module' => false,
                'controllers' => [
                    'auth' => [
                        'token', 'refuulef'
                    ]
                ]
            ]
        ];

        $allow = false;
        foreach($allowed as $item){

            if(! $item['module']){
                $allow = $this->compare($item['controllers'], \Uri::segment(1, ''), \Uri::segment(2, ''));
                break;
            }else if($item['module'] == \Uri::segment(1, '')){
                $allow = ! $item['controllers'] || $this->compare($item['controllers'], \Uri::segment(2, ''), \Uri::segment(3, ''));
                break;
            }
        }

        return $allow;
    }

    /**
     * 迭代检测控制器，没有token时，是否允许访问
     *
     * @param $controllers
     * @param $controller
     * @param bool $method
     * @return bool
     */
    private function compare($controllers, $controller, $method = false){
        foreach ($controllers as $key => $value){
            if($key == $controller){
                if( ! $value){
                    return true;
                }

                //是否存在于数据中，存在则无需登录
                return in_array($method, $value);
            }
        }
        return false;
    }

    /**
     * 获取手机客户端调用API的版本号
     *
     * @return int|string
     */
    private function get_api_verion(){

        $value = 0;

        $accept = \Input::server('HTTP_ACCEPT');

        $index = strpos($accept, 'version=');
        if($index !== false){
            $value = substr($accept, $index + 8);
        }

        return $value;
    }
}