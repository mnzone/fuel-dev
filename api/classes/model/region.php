<?php
/**
* 行政区域数据模型
* 
* @package 	  app
* @version    1.0
* @author     Ray 33705910@qq.com
* @license    MIT License
* @copyright  2013 - 2015 Ray
* @link       http://wangxiaolei.cn
*
* @package  app
* @extends  \Orm\Model
*/
class Model_Region extends \Orm\Model {

	protected static $_table_name = 'region';

	protected static $_primary_key = array('region_id');
	
	protected static $_properties = array(
		'region_id',
		'region_name',
		'region_code',
		'level_id',
		'father_id',
		'sort',
		'dr',
	);
}
?>