<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 17-2-16
 * Time: 上午9:36
 */

namespace ea;


abstract class Controller_BaseController extends \Controller_BaseController
{
    public function before(){
        parent::before();
        $this->SetUser();
    }

    public function SetUser(){
        if( !$this->user){
            \Auth::force_login(1);
            $this->user = \Model_User::find(6);
        }
    }
}