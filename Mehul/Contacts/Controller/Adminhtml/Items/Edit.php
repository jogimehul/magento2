<?php
namespace Mehul\Contacts\Controller\Adminhtml\Items;

class Edit extends \Mehul\Contacts\Controller\Adminhtml\Items
{
    /**
     * Execute action
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        
        $model = $this->_objectManager->create(\Mehul\Contacts\Model\Contacts::class);

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This item no longer exists.'));
                $this->_redirect('mehul_contacts/*');
                return;
            }
        }
        // set entered data if was error when we do save
        $data = $this->_objectManager->get(\Magento\Backend\Model\Session::class)->getPageData(true);
        if (!empty($data)) {
            $model->addData($data);
        }
        $this->_coreRegistry->register('current_mehul_contacts_items', $model);
        $this->_initAction();
        $this->_view->getLayout()->getBlock('items_items_edit');
        $this->_view->renderLayout();
    }
}
