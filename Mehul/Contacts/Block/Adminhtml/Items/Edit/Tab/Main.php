<?php

namespace Mehul\Contacts\Block\Adminhtml\Items\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;

class Main extends Generic implements TabInterface
{
    /**
     * @inheritdoc
     */
    public function getTabLabel()
    {
        return __('Contact Information');
    }

    /**
     * @inheritdoc
     */
    public function getTabTitle()
    {
        return __('Contact Information');
    }

    /**
     * @inheritdoc
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Prepare form before rendering HTML
     *
     * @return $this
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('current_mehul_contacts_items');
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('item_');
        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Contact Information')]);
        if ($model->getId()) {
            $fieldset->addField('contacts_id', 'hidden', ['name' => 'contacts_id']);
        }
        $fieldset->addField(
            'name',
            'text',
            [
                'name' => 'name',
                'label' => __('Name'),
                'title' => __('Name'),
                'required' => true,
                'class' => 'letters-with-basic-punc'
            ]
        );
        $fieldset->addField(
            'surname',
            'text',
            [
                'name' => 'surname',
                'label' => __('Surname'),
                'title' => __('Surname'),
                'required' => true,
                'class' => 'letters-with-basic-punc'
            ]
        );
        $fieldset->addField(
            'email',
            'text',
            [
                'name' => 'email',
                'label' => __('Email'),
                'title' => __('Email'),
                'required' => true,
                'class' => 'validate-email'
            ]
        );
        $fieldset->addField(
            'status',
            'select',
            [
                'name' => 'status',
                'label' => __('Status'),
                'title' => __('Status'),
                'options'   => [
                    0 => 'Disable',
                    1 => 'Enable'
                ],
                'required' => true
            ]
        );
        
        $form->setValues($model->getData());
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
