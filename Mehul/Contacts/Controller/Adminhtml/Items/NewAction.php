<?php
namespace Mehul\Contacts\Controller\Adminhtml\Items;

class NewAction extends \Mehul\Contacts\Controller\Adminhtml\Items
{
    /**
     * Perform New Contact
     */
    public function execute()
    {
        $this->_forward('edit');
    }
}
