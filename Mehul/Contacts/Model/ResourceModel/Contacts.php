<?php
namespace Mehul\Contacts\Model\ResourceModel;

class Contacts extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('mehul_contacts', 'contacts_id');
    }
}
