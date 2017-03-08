<?php
/**
 * Created by PhpStorm.
 * User: Ray
 * Date: 2017/3/8
 * Time: 下午11:56
 */

namespace ea;


class Model_Company extends Model_BaseModel
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'jobs_company';

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


    protected static $_has_many = array(
        'jobs' => array(
            'key_from' => 'id',
            'model_to' => 'Model_Job',
            'key_to' => 'company_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );
}