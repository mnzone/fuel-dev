<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 17-2-16
 * Time: 下午7:01
 */

namespace ea;

use PHPUnit\Framework\TestCase;

class Test_Controller_Job extends TestCase
{
    public function test_get_list(){

        $response = \Request::forge('ea/job/list')
            ->set_method('GET')
            ->execute()
            ->response();
        var_dump($response->body);
    }

    public function test_post_save(){

        $data = [
            'name' => \Str::random('alnum', 16),
            'company' => \Str::random('alnum', 26),
            'salary' => 1000,
            'working_place' => '北京',
            'job_category' => '全职',
            'experience' => '1-3年',
            'educationa' => '本科',
            'number' => 5,
            'category' => '软件工程师',
            'welfare_treatment' => '福利待遇',
            'job_requirement' => '任职要求',
            'job_duties' => '岗位职责'
        ];

        $response = \Request::forge('ea/job/save')
            ->set_method('POST')
            ->set_post($data, false)
            ->execute()
            ->response();

        var_dump($response);
    }
}
