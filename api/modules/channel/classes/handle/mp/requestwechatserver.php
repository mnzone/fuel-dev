<?php
/**
 * Created by PhpStorm.
 * User: Ray
 * Date: 2016/12/30
 * Time: 上午12:20
 */

namespace handle\mp;


class RequestWechatServer
{
    private $api_domain = 'https://api.weixin.qq.com/cgi-bin';
    private $file_domain = 'https://file.api.weixin.qq.com/cgi-bin';

    /**
     * 获取微信服务器IP地址
     *
     * @param $access_token     微信服务器访问时需要的令牌
     * @return array
     */
    public function get_mp_server_ip($access_token){
        $url = "{$this->api_domain}/getcallbackip?access_token={$access_token}";

        $result = \handle\common\UrlTool::request_get($url);
        $result = json_decode($result->body);
        return $result;
    }

    /**
     * 拉取用户基本信息
     *
     * @param $access_token     微信服务器访问时需要的令牌
     * @param $openid           微信用户OPENID
     * @return array
     */
    public function getUserInfo($access_token, $openid){
        $url = "{$this->api_domain}/user/info?access_token={$access_token}&openid={$openid}&lang=zh_CN";

        return [];
    }

    /**
     * 批量拉取用户基本信息,最多支持100个
     *
     * @param $access_token     微信服务器访问时需要的令牌
     * @param $openids          需要拉取的用户OPENID列表
     *
     * $openids取值样例：
     * {
     *   "user_list": [
     *   {
     *   "openid": "otvxTs4dckWG7imySrJd6jSi0CWE",
     *   "lang": "zh-CN"
     *   },
     *   {
     *   "openid": "otvxTs_JZ6SEiP0imdhpi50fuSZg",
     *   "lang": "zh-CN"
     *   }
     *   ]
     *   }
     */
    public function getUsersInfo($access_token, $openids){
        $url = "{$this->api_domain}/user/info/batchget?access_token={$access_token}";
        return [];
    }

    /**
     * 拉取用户列表
     *
     * @param $access_token
     * @param $next_openid
     * @return array
     */
    public function getUsers($access_token, $next_openid){
        $url = "{$this->api_domain}/user/get?access_token={$access_token}&next_openid={$next_openid}";
        return [];
    }

    /**
     * 上传临时素材
     *
     * @param $access_token     Token
     * @param $file             素材文件
     * @param $type             素材类型
     * @return array
     */
    public function upload_media($access_token, $file, $type){
        $url = "{$this->api_domain}/media/upload?access_token={$access_token}&type={$type}";

        if(class_exists('\CURLFile')){
            $data = [
                'media' => new \CURLFile($file)
            ];
        }else{
            $data = [
                'media' => "@{$file}"
            ];
        }

        $result = \handle\common\UrlTool::request_post($url, ['form-data' => $data]);

        $result = json_decode($result->body);

        return isset($result->media_id) ? $result->media_id : $result->errcode;
    }

    /**
     * 上传图文消息内的图片获取URL【订阅号与服务号认证后均可用】
     *
     * @param $access_token     Token
     * @param $file             图片数据
     * @return mixed
     */
    public function upload_news_image($access_token, $file){

        if(class_exists('\CURLFile')){
            $data = [
                'media' => new \CURLFile($file)
            ];
        }else{
            $data = [
                'media' => "@{$file}"
            ];
        }

        $url = "{$this->api_domain}/media/uploadimg?access_token={$access_token}";
        $result = \handle\common\UrlTool::request_post($url, ['form-data' => $data]);

        $result = json_decode($result->body);

        return $result->url;
    }

    /**
     * 上传图文消息内的图片获取URL【订阅号与服务号认证后均可用】
     *
     * @param $access_token     Token
     * @param $data             图文内容
     */
    public function upload_news($access_token, $data){
        $url = "{$this->api_domain}/media/uploadnews?access_token={$access_token}";
        $result = \handle\common\UrlTool::request_post($url, $data);

        $result = json_decode($result->body);

        return isset($result->media_id) ? $result->media_id : $result->errcode;
    }

    /**
     * 群发视频专用上传
     *
     * @param $access_token     Token
     * @param $media_id         上传下载多媒体文件
     * @return mixed
     */
    public function upload_video($access_token, $media_id){

        $url = "{$this->file_domain}/media/uploadvideo?access_token={$access_token}";

        $data = [
            'media_id' => $media_id,
            'title' => '群发',
            'description' => '群发图文消息'
        ];

        $result = \handle\common\UrlTool::request_post($url, $data);

        $result = json_decode($result->body);

        return isset($result->media_id) ? $result->media_id : $result->errcode;
    }

    /**
     * 根据标签进行群发【订阅号与服务号认证后均可用】
     *
     * @param $access_token     Token
     * @param $tag              用户标签
     * @param $content          群发内容
     * @return mixed
     *
     * $content取值：
     *  ["mpnews" => ["media_id" => "CONTENT"], "msgtype" => "mpnews", "send_ignore_reprint" => 0]
     *  ["text" => ["content" => "CONTENT"], "msgtype" => "text"]
     *  ["voice" => ["media_id" => "CONTENT"], "msgtype" => "voice"]
     *  ["image" => ["media_id" => "CONTENT"], "msgtype" => "image"]
     *  ["mpvideo" => ["media_id" => "CONTENT"], "msgtype" => "mpvideo"] #此处视频的media_id需通过独立接口上传
     *  ["wxcard" => ["card_id" => "CONTENT"], "msgtype" => "wxcard"]
     */
    public function mass_send_all($access_token, $tag, $content){
        $url = "{$this->api_domain}/message/mass/sendall?access_token={$access_token}";

        $data = [
            'filter' => [
                'is_to_all' => false,
                'tag_id' => $tag
            ]
        ];

        $data = array_merge($data, $content);

        $result = \handle\common\UrlTool::request_post($url, $data);

        $result = json_decode($result->body);

        return isset($result->media_id) ? $result->media_id : $result->errcode;
    }

    /**
     * 根据OpenID列表群发【订阅号不可用，服务号认证后可用】
     *
     * @param $access_token
     * @param $openids
     * @param $content
     * @return mixed
     *
     * $content取值：
     *  ["mpnews" => ["media_id" => "CONTENT"], "msgtype" => "mpnews", "send_ignore_reprint" => 0]
     *  ["text" => ["content" => "CONTENT"], "msgtype" => "text"]
     *  ["voice" => ["media_id" => "CONTENT"], "msgtype" => "voice"]
     *  ["image" => ["media_id" => "CONTENT"], "msgtype" => "image"]
     *  ["mpvideo" => ["media_id" => "CONTENT"], "msgtype" => "mpvideo"] #此处视频的media_id需通过独立接口上传
     *  ["wxcard" => ["card_id" => "CONTENT"], "msgtype" => "wxcard"]
     */
    public function mass_send($access_token, $openids, $content){
        $url = "{$this->api_domain}/message/mass/send?access_token={$access_token}";

        $data = [
            'touser' => $openids,
        ];

        $data = array_merge($data, $content);

        $result = \handle\common\UrlTool::request_post($url, $data);

        $result = json_decode($result->body);

        return isset($result->media_id) ? $result->media_id : $result->errcode;
    }

    /**
     * 删除群发【订阅号与服务号认证后均可用】
     *
     * @param $access_token         Token
     * @param $msg_id               群发消息ID
     */
    public function mass_delete($access_token, $msg_id){
        $url = "{$this->api_domain}/message/mass/delete?access_token={$access_token}";

        $data = [
            'msg_id' => $msg_id,
        ];

        $result = \handle\common\UrlTool::request_post($url, $data);

        $result = json_decode($result->body);

        return $result->errcode === 0;
    }

    /**
     * 预览接口【订阅号与服务号认证后均可用】
     *
     * @param $access_token         Token
     * @param $to_user              预览人OPENID
     * @param $content              预览内容
     * @return bool
     *
     * $content取值：
     *  ["mpnews" => ["media_id" => "CONTENT"], "msgtype" => "mpnews", "send_ignore_reprint" => 0]
     *  ["text" => ["content" => "CONTENT"], "msgtype" => "text"]
     *  ["voice" => ["media_id" => "CONTENT"], "msgtype" => "voice"]
     *  ["image" => ["media_id" => "CONTENT"], "msgtype" => "image"]
     *  ["mpvideo" => ["media_id" => "CONTENT"], "msgtype" => "mpvideo"] #此处视频的media_id需通过独立接口上传
     *  ["wxcard" => ["card_id" => "CONTENT", "card_ext" => ["code" => "", "openid" => "", "timestamp" => "", "signature" => ""]], "msgtype" => "wxcard"]
     */
    public function mass_preview($access_token, $to_user, $content){
        $url = "{$this->api_domain}/message/mass/preview?access_token={$access_token}";

        $data = [
            'touser' => $to_user,
        ];

        $data = array_merge($data, $content);

        $result = \handle\common\UrlTool::request_post($url, $data);

        $result = json_decode($result->body);

        return $result->errcode === 0;
    }


    public function mass_get($access_token, $msg_id){
        $url = "{$this->api_domain}/message/mass/get?access_token={$access_token}";

        $data = [
            'msg_id' => $msg_id,
        ];

        $result = \handle\common\UrlTool::request_post($url, $data);

        $result = json_decode($result->body);

        return isset($result->errcode) ? $result->errcode : $result->msg_status;
    }
}