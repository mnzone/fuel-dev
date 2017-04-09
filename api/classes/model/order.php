<?php
/**
 * 订单数据模型
 * 
 * @package    apps
 * @version    1.0
 * @author     Ray
 * @license    MIT License
 * @copyright  2010 - 2014 PMonkey Team
 * @link       http://wangxiaolei.cn
 */

class Model_Order extends \Orm\Model
{

	/**
	 * @var  string  table name to overwrite assumption
	 */
	protected static $_table_name = 'orders';

	protected static $_primary_key = array('id');

	/**
	 * @var array	has_one relationships
	 */
	protected static $_has_one = array(
		/*'transport' => array(
			'model_to' => 'Model_OrderTransport',
			'key_from' => 'id',
			'key_to'   => 'order_id',
			'cascade_delete' => false,
		)*/
	);

	/**
	 * @var array	belongs_to relationships
	 */
	protected static $_belongs_to = array(
		'buyer' => array(
			'model_to' => 'Auth\\Model\\Auth_User',
			'key_from' => 'user_id',
			'key_to'   => 'id',
		),
		'seller' => array(
			'model_to' => 'Model_Seller',
			'key_from' => 'from_id',
			'key_to'   => 'id',
			'cascade_delete' => false,
		),
	);

	/**
	 * @var array	has_many relationships
	 */
	protected static $_has_many = array(
		'details' => array(
			'model_to' => 'Model_OrderDetail',
			'key_from' => 'id',
			'key_to'   => 'order_id',
		),
		'rates' => array(
			'model_to' => 'Model_OrderRate',
			'key_from' => 'id',
			'key_to'   => 'order_id',
		),
		'trades' => array(
			'model_to' => 'Model_OrderTrade',
			'key_from' => 'id',
			'key_to'   => 'order_id',
		),
		'transports' => array(
			'model_to' => 'Model_OrderTransport',
			'key_from' => 'id',
			'key_to'   => 'order_id'
		),
	);

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
		),
		'Orm\\Observer_Typing' => array(
			'events' => array('after_load', 'before_save', 'after_save')
		),
		'Orm\\Observer_Self' => array(
			'events' => array('before_insert'),
			'property' => 'user_id'
		),
	);

	/**
	 * @var array	many_many relationships
	 */
	/*protected static $_many_many = array(
		'roles' => array(
			'key_from' => 'id',
			'model_to' => 'Model\\Auth_Role',
			'key_to' => 'id',
			'table_through' => null,
			'key_through_from' => 'group_id',
			'key_through_to' => 'role_id',
		),
		'permissions' => array(
			'key_from' => 'id',
			'model_to' => 'Model\\Auth_Permission',
			'key_to' => 'id',
			'table_through' => null,
			'key_through_from' => 'group_id',
			'key_through_to' => 'perms_id',
		),
	);*/

	public static $_maps = array(
		'type' => array(
			'NONE' => '无类型',
			'SELL' => '销售单',
			'PURCHASE' => '进货单',
			'DELIVER' => '出库单',
			'STORAGE' => '入库单',
			'RETURNED' => '退货单',
			'BARTER' => '换货单',
			'INVOICE' => '发货单',
			'BOOK' => '预约单',
			'REFUND' => '退款',
			'RECHARGE' => '充值',
			'TAKEAWAY' => '外卖单',
		),
		'status' => array(
			'NONE' => '无状态',
			'WAIT_PAYMENT' => '待支付',
			'PAYMENT_ERROR' => '支付失败',
			'PAYMENT_SUCCESS' => '支付完成',
			'SELLER_CANCEL' => '商户取消',
			'USER_CANCEL' => '用户取消',
			'WAIT_SURE' => '待确认',
			'SURE' => '确认',
			'WAIT_SHIPPED' => '待发货',
            'SHIPPED' => '已发货',
            'FORRECEIVABLES' =>  '待收款',
            'REFUNDMENT' =>  '退款中',
			'RECEIVED' => '已签收',
			'CHECKED' => '核对完成',
			'SYSTEM_STOP' => '系统中止',
			'FINISH' => '已完成'
		),
		'payment' => array(
			'NONE' => '未指定',
			'alipay' => '支付宝',
			'tenpay' => '财付通',
			'bank' => '网银',
			'paypal' => '贝宝(Paypal)',
			'card' => '游戏点卡/手机充值卡',
			'balance' => '会员帐户余额',
			'offline' => '现金',
			'peerpay' => '代付'
		)
	);

	/**
	 * before_insert observer event method
	 */
	public function _event_before_insert()
	{
		// assign the user id that lasted updated this record
		$this->user_id = ($this->user_id = \Auth::get_user_id()) ? $this->user_id[1] : 0;
	}

	/**
	 * before_update observer event method
	 */
	public function _event_before_update()
	{
		$this->_event_before_insert();
	}
}
