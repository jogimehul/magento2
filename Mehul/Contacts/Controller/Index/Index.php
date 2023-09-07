<?php
namespace Mehul\Contacts\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * Execute action
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->renderLayout();
    }
}
