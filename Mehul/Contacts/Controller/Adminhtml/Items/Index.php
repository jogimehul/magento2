<?php
namespace Mehul\Contacts\Controller\Adminhtml\Items;

class Index extends \Mehul\Contacts\Controller\Adminhtml\Items
{
    /**
     * Execute action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Mehul_Contacts::list');
        $resultPage->getConfig()->getTitle()->prepend(__('Contact List'));
        $resultPage->addBreadcrumb(__('Mehul'), __('Mehul'));
        $resultPage->addBreadcrumb(__('Contacts'), __('Contacts'));
        return $resultPage;
    }
}
