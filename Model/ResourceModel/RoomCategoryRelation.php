<?php

/**
 * CedCommerce
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the 
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
  * http://cedcommerce.com/license-agreement.txt
 *
 * @category    Ced
 * @package     Ced_Booking
 * @author      CedCommerce Core Team <connect@cedcommerce.com >
 * @copyright   Copyright CedCommerce (http://cedcommerce.com/)
 * @license      http://cedcommerce.com/license-agreement.txt
 */



namespace Ced\Booking\Model\ResourceModel;



class RoomCategoryRelation extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb

{

	protected function _construct()

	{

		//ced_booking_roomtypes is table and roomtype_id is primary key of this table

		$this->_init('ced_booking_room_type_category_relation', 'id');

	}

	

}

