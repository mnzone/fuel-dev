<?php
/**
 * 职位数据模型
 *
 * Created by PhpStorm.
 *
 * User: ray
 * Date: 17-2-16
 * Time: 下午1:46
 * @package    api
 * @version    1.0
 * @author     Ray
 * @license    MIT License
 * @copyright  2010 - 2014 PMonkey Team
 * @link       http://mnzone.cn
 */

namespace ea;

class Model_JobCandidate extends Model_BaseModel
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'jobs_candidates';

    protected static $_primary_key = array('id');

    /**
     * @var array	defined observers
     */
    protected static $_observers = array(
        'Orm\\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'property' => 'created_at',
            'mysql_timestamp' => false
        ),
        'Orm\\Observer_UpdatedAt' => array(
            'events' => array('before_update'),
            'property' => 'updated_at',
            'mysql_timestamp' => false
        )
    );

    public static function update_one($data, $id){
        // 单资源更新
        $candidate = Model_JobCandidate::find($id);

        if( ! $candidate){
            return null;
        }

        $candidate->set($data);

        return $candidate->save() ? $candidate : false;
    }

    /**
     * 批量更新某些资源的某些属性
     *
     * @param $data     待更新的属性Array
     * @param $ids      待更新的资源ID Array
     * @return array
     */
    public static function update_more($data, $ids){

        // 获取完整数据表名
        $table = \DB::table_prefix('jobs_candidates');
        $row = \DB::update($table)
            ->set($data)
            ->where('id', 'in', $ids)
            ->execute();

        return $row;
    }
}