<?php
namespace Mehul\Contacts\Model;

use Magento\Framework\Model\AbstractModel;

class Contacts extends AbstractModel
{
    /**
     * Define resource model
     */
    protected function _construct()
    {
        $this->_init(\Mehul\Contacts\Model\ResourceModel\Contacts::class);
    }
}
