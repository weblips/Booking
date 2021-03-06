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
 * @author   	CedCommerce Core Team <connect@cedcommerce.com >
 * @copyright   Copyright CedCommerce (http://cedcommerce.com/)
 * @license      http://cedcommerce.com/license-agreement.txt
 */

namespace Ced\Booking\Controller\Booking;

use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;

class BookRoom extends \Magento\Framework\App\Action\Action
{
    /**
     * @param resultPageFactory
     */
    protected $resultPageFactory;
    
    /**
     * @param resultRedirectFactory
     */
    
    protected $resultRedirectFactory;
    
    /**
     * @param resultForwardFactory
     */
    
    protected $resultForwardFactory;
    
    /**
     * @param resultRedirect
     */
    
    protected $resultRedirect;
    protected $_coreRegistry;
    
    /**
     * @param Magento\Framework\App\Action\Context $context
     * @param Magento\Framework\View\Result\PageFactory
     * @param Magento\Backend\Model\View\Result\Redirect
     * @param Magento\Framework\Controller\Result\ForwardFactory
     */
    public function __construct(\Magento\Framework\App\Action\Context $context,
    		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
    		\Magento\Backend\Model\View\Result\Redirect $resultRedirectFactory,
    		\Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory,
            \Magento\Framework\Registry $coreRegistry,
            JsonFactory $resultJsonFactory
    		)
    {
    	parent::__construct($context);
    	$this->_objectManager = $context->getObjectManager();
    	$this->resultPageFactory = $resultPageFactory;
    	$this->resultForwardFactory= $resultForwardFactory;
        $this->_resultJsonFactory = $resultJsonFactory;
        $this->_coreRegistry = $coreRegistry;
    }
    
    /**
     * @param execute
     */
    public function execute()
    {
    	$resultPage = $this->resultPageFactory->create();
        $room_id = $this->getRequest()->getParam('room_id');

        $productId = $this->getRequest()->getParam('product_id');
        $product = $this->_objectManager->create('Magento\Catalog\Model\Product')->load($productId);
        $this->_coreRegistry->register("product", $product);


        $template = $resultPage->getLayout()->createBlock('Ced\Booking\Block\BookingPopup')
                   ->setData(['room_id'=>$room_id])
                   ->setTemplate('Ced_Booking::product/view/booking_popup.phtml')
                   ->toHtml();
        $resultJson =  $this->_resultJsonFactory->create();
        $response = ['template'=>$template];
        return $resultJson->setData($response);

    }
}
