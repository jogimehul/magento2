<?php
namespace Mehul\Contacts\Controller\Index;

use Magento\Framework\App\Action\Context;
use Mehul\Contacts\Model\ContactsFactory;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Image\AdapterFactory;
use Magento\Framework\Filesystem;

class Save extends \Magento\Framework\App\Action\Action
{
    /**
     * @var ContactsFactory
     */
    protected $_contacts;

    /**
     * @var UploaderFactory
     */
    protected $uploaderFactory;
    
    /**
     * @var AdapterFactory
     */
    protected $adapterFactory;
    
    /**
     * @var Filesystem
     */
    protected $filesystem;

    /**
     * @param Context $context
     * @param ContactsFactory $contacts
     * @param UploaderFactory $uploaderFactory
     * @param AdapterFactory $adapterFactory
     * @param Filesystem $filesystem
     */
    public function __construct(
        Context $context,
        ContactsFactory $contacts,
        UploaderFactory $uploaderFactory,
        AdapterFactory $adapterFactory,
        Filesystem $filesystem
    ) {
        $this->_contacts = $contacts;
        $this->uploaderFactory = $uploaderFactory;
        $this->adapterFactory = $adapterFactory;
        $this->filesystem = $filesystem;
        parent::__construct($context);
    }

    /**
     * Execute action
     */
    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $contacts = $this->_contacts->create();
        $contacts->setData($data);
        if ($contacts->save()) {
            $this->messageManager->addSuccessMessage(__('You saved the data.'));
        } else {
            $this->messageManager->addErrorMessage(__('Data was not saved.'));
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('contacts');
        return $resultRedirect;
    }
}
