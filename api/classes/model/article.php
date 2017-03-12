<?php
/**
 * 文章数据模型
 *
 * @package    apps
 * @version    1.0
 * @author     Ray
 * @license    MIT License
 * @copyright  2010 - 2014 PMonkey Team
 * @link       http://wangxiaolei.cn
 */

class Model_Article extends Model_BaseModel
{

    private static $thumbnail = '';

    /**
     * @var  string  table name to overwrite assumption
     */
    protected static $_table_name = 'articles';

    protected static $_primary_key = array('id');

    /**
     * @var array   defined observers
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

    /**
     * @var array	belongs_to relationships
     */
    protected static $_belongs_to = array(
        'user' => array(
            'model_to' => 'Model_People',
            'key_from' => 'user_id',
            'key_to'   => 'user_id',
        ),
        'seller' => array(
            'model_to' => 'Model_Seller',
            'key_from' => 'seller_id',
            'key_to'   => 'id',
        ),
        'category' => array(
            'model_to' => 'Model_Category',
            'key_from' => 'category_id',
            'key_to'   => 'id',
        ),
    );

    /**
     * @var array   has_many relationships
     */
    protected static $_has_many = array(
        'attachments' => array(
            'model_to' => 'Model_ArticleAttachment',
            'key_from' => 'id',
            'key_to'   => 'article_id'
        ),
        'ads' => array(
            'model_to' => 'Model_ArticleAd',
            'key_from' => 'id',
            'key_to'   => 'article_id'
        )
    );
}
