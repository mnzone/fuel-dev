<?php
/**
 * Created by PhpStorm.
 * User: Ray
 * Date: 2017/3/12
 * Time: 下午10:36
 */

namespace ea;


class Controller_User extends Controller_BaseController
{

    /**
     * 保存个人资料
     */
    public function post_index(){

    }

    /**
     * 修改个人资料
     *
     * @return array
     */
    public function put_index(){

        $data = \Input::post();

        $id = \Input::get('id', false);
        if( ! $id || ! $people = \Model_People::find(\Input::get('id'))){
            return $this->result = [
                'status' => 'err',
                'msg' => '缺少必要参数：id',
                'errcode' => 0
            ];
        }

        $people->set($data);

        if(! $people->save()){
            return $this->result = [
                'status' => 'err',
                'msg' => '保存参数失败',
                'errcode' => 0
            ];
        }

        return $this->result = [
            'status' => 'succ',
            'msg' => '',
            'errcode' => 0
        ];
    }

    /**
     * 修改密码
     */
    public function post_change_pwd(){
        $password = \Input::post('password');
        $new_password = \Input::post('newpwd');

        try{
            \Auth::change_password($password, $new_password);
            $this->result = [
                'status' => 'succ',
                'msg' => '',
                'errcode' => 0
            ];
        }catch (\SimpleUserUpdateException $e){
            $this->result['msg'] = $e->getMessage();
        }

        return $this->result;
    }

    /**
     * 修改银行卡
     */
    public function put_bank(){
        $data = \Input::post();

        $id = \Input::get('id', false);
        if( ! $id || ! $people = \Model_PeopleBank::find(\Input::get('id'))){
            return $this->result = [
                'status' => 'err',
                'msg' => '缺少必要参数：id',
                'errcode' => 0
            ];
        }

        $people->set($data);

        if(! $people->save()){
            return $this->result = [
                'status' => 'err',
                'msg' => '保存参数失败',
                'errcode' => 0
            ];
        }

        return $this->result = [
            'status' => 'succ',
            'msg' => '',
            'errcode' => 0
        ];
    }

    /**
     * 获取个人资料
     */
    public function get_item(){

        $people = \Model_People::find_one_by_parent_id($this->user->id);

        $item['real_name'] = "{$people->first_name}{$people->last_name}";
        $item['identity'] = $people->identity;
        $item['cellphone'] = $people->cellphone;
        $item['email'] = $people->email;

        $bank = current($people->banks);
        $item['account'] = $bank->account;
        $item['account_name'] = $bank->account_name;
        $item['bank_full_name'] = $bank->bank_full_name;

        return $this->result = [
            'status' => 'succ',
            'errcode' => 0,
            'msg' => '',
            'data' => $people
        ];
    }
}