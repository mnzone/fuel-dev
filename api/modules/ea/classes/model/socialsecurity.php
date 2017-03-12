<?php
/**
 * Created by PhpStorm.
 * User: Ray
 * Date: 2017/3/12
 * Time: 下午10:29
 */

namespace ea;


class Model_SocialSecurity extends Model_BaseModel
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'social_security';

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
}