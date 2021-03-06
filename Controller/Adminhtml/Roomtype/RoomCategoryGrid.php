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

 * @author   	CedCommerce Magento Core Team <Ced_MagentoCoreTeam@cedcommerce.com>

 * @copyright   Copyright CedCommerce (http://cedcommerce.com/)

 * @license      http://cedcommerce.com/license-agreement.txt

 */

namespace Ced\Booking\Controller\Adminhtml\Roomtype;



use Magento\Backend\App\Action\Context;

use Magento\Framework\View\Result\PageFactory;

use Magento\Backend\App\Action;



class RoomCategoryGrid extends \Magento\Backend\App\Action

{

	/**

     * @var \Magento\Framework\View\Result\PageFactory

     */

    protected $resultPageFactory;

	/**

     * $_objectManager

     *

     * @var \Magento\Framework\App\ObjectManager $objectManager

     */

    protected $_objectManager;



	public function __construct(

		\Magento\Backend\App\Action\Context $context,

		\Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {



    	parent::__construct($context);

    	$this->resultPageFactory = $resultPageFactory;

    	$this->_objectManager =  $context->getObjectManager();

    }

	

	/**

	 * Index action

	 *

	 * @return void

	 */

	public function execute()
	{

			$resultPage = $this->resultPageFactory->create();

			$resultPage->setActiveMenu('Ced_Booking::booking_room_category');

			$resultPage->addBreadcrumb(__('Add  Room Type'), __('Create Room Category'));

			$resultPage->getConfig()->getTitle()->prepend(__('Create Room Category'));

			return $resultPage;

		
	}

	protected function _isAllowed()

	{

		return $this->_authorization->isAllowed('Ced_Booking::booking_room_category');

	}

}