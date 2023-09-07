<?php
namespace Mehul\Contacts\Model\ResourceModel\Contacts;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var Contact Id
     */
    protected $_idFieldName = 'contacts_id';

    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            \Mehul\Contacts\Model\Contacts::class,
            \Mehul\Contacts\Model\ResourceModel\Contacts::class
        );
    }
}
