<?php
/**
 * Created by PhpStorm.
 * User: ray
 * Date: 17-2-18
 * Time: 下午10:36
 */

class Model_BaseModel extends \Orm\Model
{

    /**
     * 获取分页数据
     *
     * @param $query            查询对象
     * @param int $per_count    每页返回数据量
     * @return array
     */
    public static function get_pagination($query, $per_count = 10){
        //分页查询
        $count = $query->count();
        $config = array(
            'pagination_url' => "/ea/job/list.json",
            'total_items'    => $count,
            'per_page'       => $per_count,
            'uri_segment'    => 'start',
            'show_first'     => true,
            'show_last'      => true
        );

        $pagination = new \Pagination($config);

        $result = $query
            ->rows_offset($pagination->offset)
            ->rows_limit($pagination->per_page)
            ->get();

        return [$result, $pagination];
    }
}