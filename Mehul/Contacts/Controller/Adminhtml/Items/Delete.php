<?php
namespace Mehul\Contacts\Controller\Adminhtml\Items;

class Delete extends \Mehul\Contacts\Controller\Adminhtml\Items
{
    /**
     * Perform Delete Operation
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            try {
                $model = $this->_objectManager->create(\Mehul\Contacts\Model\Contacts::class);
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('You deleted the item.'));
                $this->_redirect('mehul_contacts/*/');
                return;
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addError(
                    __('We can\'t delete item right now. Please review the log and try again.')
                );
                $this->_objectManager->get(Psr\Log\LoggerInterface::class)->critical($e);
                $this->_redirect('mehul_contacts/*/edit', ['id' => $this->getRequest()->getParam('id')]);
                return;
            }
        }
        $this->messageManager->addError(__('We can\'t find a item to delete.'));
        $this->_redirect('mehul_contacts/*/');
    }
}
