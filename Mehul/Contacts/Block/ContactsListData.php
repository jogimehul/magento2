<?php

namespace Mehul\Contacts\Block;

use Magento\Framework\View\Element\Template\Context;
use Mehul\Contacts\Model\ContactsFactory;

/**
 * Contacts List block
 */
class ContactsListData extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Mehul\Contacts\Model\ContactsFactory
     */
    protected $_contacts;
    
    /**
     * Initialize Controller
     *
     * @param Context $context
     * @param ContactsFactory $contacts
     */
    public function __construct(
        Context $context,
        ContactsFactory $contacts
    ) {
        $this->_contacts = $contacts;
        parent::__construct($context);
    }

    /**
     * Preparing List Layout
     */
    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Mehul Contacts List'));
        
        if ($this->getContactsCollection()) {
            $pager = $this->getLayout()->createBlock(
                \Magento\Theme\Block\Html\Pager::class,
                'mehul.contacts.pager'
            )->setAvailableLimit([5=>5,10=>10,15=>15])->setShowPerPage(true)->setCollection(
                $this->getContactsCollection()
            );
            $this->setChild('pager', $pager);
            $this->getContactsCollection()->load();
        }
        return parent::_prepareLayout();
    }

    /**
     * Preparing Contact Collection
     *
     * @return Mehul\Contacts\Model\Contacts\Collection
     */
    public function getContactsCollection()
    {
        $page = ($this->getRequest()->getParam('p'))? $this->getRequest()->getParam('p') : 1;
        $pageSize = ($this->getRequest()->getParam('limit'))? $this->getRequest()->getParam('limit') : 5;

        $contacts = $this->_contacts->create();
        $collection = $contacts->getCollection();
        $collection->addFieldToFilter('status', '1');
        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);

        return $collection;
    }

    /**
     * Get Pager html
     *
     * @return string
     */
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}
