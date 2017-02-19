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
    }

    public function action_404(){
        die('404');
    }
}