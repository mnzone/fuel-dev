
<?php
/**
 * 文章管理
 *
 * Created by PhpStorm.
 * User: ray
 * Date: 17-2-15
 * Time: 下午11:18
 */


class Controller_Article extends Controller_BaseController
{

    public function before(){
        parent::before();
        \View::set_global([
            'controller_name' => '文章'
        ]);
    }

    /**
     * 新闻列表
     */
    public function action_index(){

        $params = [
            'action_name' => "动态新闻",
            'title' => '新闻列表'
        ];

        \View::set_global($params);
        $this->template->content = \View::forge("default/Article/index");
    }

    /**
     * 关于我们
     */
    public function action_About(){

        $params = [
            'action_name' => "招聘信息",
            'title' => '招聘信息'
        ];

        \View::set_global($params);
        $this->template->content = \View::forge("default/Article/About");
    }

    /**
     * 自定义文章页(依据类型显示 标题 eg:养老保险，失业保险，工伤保险...)
     */
    public function action_CustomArticle(){

        $params = [
            'action_name' => "",
            'title' => ''
        ];

        \View::set_global($params);
        $this->template->content = \View::forge("default/Article/CustomArticle");
    }

    /**
     * 协议
     */
    public function action_Protocol(){

        $params = [
            'action_name' => "协议",
            'title' => '协议'
        ];

        \View::set_global($params);
        $this->template->content = \View::forge("default/Article/Protocol");
    }

}