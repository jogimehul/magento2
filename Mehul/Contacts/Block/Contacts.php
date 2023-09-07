<?php
namespace Mehul\Contacts\Block;

/**
 * Contacts content block
 */
class Contacts extends \Magento\Framework\View\Element\Template
{
    /**
     * Initialize Controller
     *
     * @param Context $context
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context
    ) {
        parent::__construct($context);
    }

    /**
     * Preparing List Layout
     */
    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Mehul Contacts'));
        
        return parent::_prepareLayout();
    }
}
