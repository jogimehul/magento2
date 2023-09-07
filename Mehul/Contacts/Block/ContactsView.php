<?php

namespace Mehul\Contacts\Block;

use Magento\Framework\View\Element\Template\Context;
use Mehul\Contacts\Model\ContactsFactory;
use Magento\Cms\Model\Template\FilterProvider;

/**
 * Contacts View block
 */
class ContactsView extends \Magento\Framework\View\Element\Template
{
    /**
     * @var ContactsFactory
     */
    protected $_contacts;

    /**
     * Initialize Controller
     *
     * @param Context $context
     * @param ContactsFactory $contacts
     * @param FilterProvider $filterProvider
     */
    public function __construct(
        Context $context,
        ContactsFactory $contacts,
        FilterProvider $filterProvider
    ) {
        $this->_contacts = $contacts;
        $this->_filterProvider = $filterProvider;
        parent::__construct($context);
    }

    /**
     * Preparing List Layout
     */
    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Mehul Contacts View'));
        
        return parent::_prepareLayout();
    }

    /**
     * Get single contact details by id
     *
     * @return bool|Mehul\Contacts\Model\Contacts
     */
    public function getSingleData()
    {
        $id = $this->getRequest()->getParam('id');
        $contacts = $this->_contacts->create();
        $singleData = $contacts->load($id);
        if ($singleData->getContactsId() && $singleData->getStatus() == 1) {
            return $singleData;
        } else {
            return false;
        }
    }
}
