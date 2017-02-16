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

class Model_Job extends \Orm\Model
{
    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'jobs';

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