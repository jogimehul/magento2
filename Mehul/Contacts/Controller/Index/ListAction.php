<?php
namespace Mehul\Contacts\Controller\Index;

class ListAction extends \Magento\Framework\App\Action\Action
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
