<?php
namespace Mehul\Contacts\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\NotFoundException;
use Mehul\Contacts\Block\ContactsView;

class View extends \Magento\Framework\App\Action\Action
{
    /**
     * @var ContactsView
     */
    protected $_contactsview;

    /**
     * @param Context $context
     * @param ContactsView $contactsview
     */
    public function __construct(
        Context $context,
        ContactsView $contactsview
    ) {
        $this->_contactsview = $contactsview;
        parent::__construct($context);
    }

    /**
     * Execute action
     */
    public function execute()
    {
        if (!$this->_contactsview->getSingleData()) {
            throw new NotFoundException(__('Parameter is incorrect.'));
        }

        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->renderLayout();
    }
}
