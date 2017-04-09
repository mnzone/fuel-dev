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

    public function before(){
        parent::before();
        parent::SetUser();
    }

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
        $data = \Input::put();
        if(!$data){
            $this->result = [
                'status' => 'error',
                'errcode' => 10,
                'msg' => '参数为空',
            ];
            $this->response($this->result, 200);
            return;
        }
        $people = \Model_People::query()->where(array('user_id' => $this->user->id))->get_one();
        $bank = \Model_PeopleBank::query()->where(array('parent_id' => $people->parent_id))->get_one();
        $p1 = $people;
        $p1['last_name'] = $data['real_name'];
        $p1['identity'] = $data['identity'];
        $p1['cellphone'] = $data['cellphone'];
        $p1['email'] = $data['email'];
        //$p1['HKType'] = $data['HKType'];
        $p1['address'] = $data['address'];
        $b = $bank;
        $b['account'] = $data['account'];
        $b['bank_full_name'] = $data['bank_full_name'];
        $b['bank_id'] = $data['bank_id'];
        if($people->save($p1) && $bank->save($b)){
            $this->result = [
                'status' => 'succ',
                'errcode' => 0,
                'msg' => ''
            ];
            $this->response($this->result, 200);
            return;
        }
        $this->result = [
            'status' => 'error',
            'errcode' => 11,
            'msg' => '保存失败'
        ];
        $this->response($this->result, 200);
        return;

    /*        die;
    if($people->save()){

    }
    if($bank->save()){

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
        ];*/
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
        //$people = \Model_People::find_one_by_parent_id($this->user->id);
        $people = \Model_People::query()->where(array('user_id' => $this->user->id))->get_one();
        $item['real_name'] = "{$people->first_name}{$people->last_name}";
        $item['identity'] = $people->identity;
        $item['cellphone'] = $people->cellphone;
        $item['email'] = $people->email;
        $item['HKType'] = $people->HKType;
        $item['address'] = $people->address;
        $bank = \Model_PeopleBank::query()
                                   ->where(array("parent_id" => $people->parent_id))
                                   ->get_one();
        $item['account'] = $bank->account;
        $item['account_name'] = $bank->account_name;
        $item['bank_full_name'] = $bank->bank_full_name;
        $item['bank_name'] = $bank->bank->name;
        $item['bank_id'] = $bank->bank_id;

        $this->result = [
            'status' => 'succ',
            'errcode' => 0,
            'msg' => '',
            'data' => $item
        ];
        $this->response($this->result, 200);
    }
}