<?php

namespace Ess\M2ePro\Block\Adminhtml\Amazon\Template\Synchronization;

class Edit extends \Ess\M2ePro\Block\Adminhtml\Amazon\Template\Edit
{
    //########################################

    public function _construct()
    {
        parent::_construct();

        // Initialization block
        // ---------------------------------------
        $this->_controller = 'adminhtml_amazon_template_synchronization';
        // ---------------------------------------

        // Set buttons actions
        // ---------------------------------------
        $this->removeButton('back');
        $this->removeButton('reset');
        $this->removeButton('delete');
        $this->removeButton('add');
        $this->removeButton('save');
        $this->removeButton('edit');
        // ---------------------------------------

        // ---------------------------------------
        $url = $this->getHelper('Data')->getBackUrl('list');
        $this->addButton('back', array(
            'label'     => $this->__('Back'),
            'onclick'   => 'AmazonTemplateSynchronizationObj.backClick(\'' . $url . '\')',
            'class'     => 'back'
        ));
        // ---------------------------------------

        $isSaveAndClose = (bool)$this->getRequest()->getParam('close_on_save', false);

        if (!$isSaveAndClose
            && $this->getHelper('Data\GlobalData')->getValue('tmp_template')
            && $this->getHelper('Data\GlobalData')->getValue('tmp_template')->getId()
        ) {
            // ---------------------------------------
            $this->addButton('duplicate', array(
                'label'     => $this->__('Duplicate'),
                'onclick'   => 'AmazonTemplateSynchronizationObj.duplicateClick'
                    .'(\'amazon-template-synchronization\')',
                'class'     => 'primary'
            ));
            // ---------------------------------------

            // ---------------------------------------
            $this->addButton('delete', array(
                'label'     => $this->__('Delete'),
                'onclick'   => 'AmazonTemplateSynchronizationObj.deleteClick()',
                'class'     => 'delete primary'
            ));
            // ---------------------------------------
        }

        // ---------------------------------------

        $saveButtonOptions = [];

        if ($isSaveAndClose) {
            $saveButtonOptions['save'] = [
                'label' => $this->__('Save And Close'),
                'onclick' => "AmazonTemplateSynchronizationObj.saveAndCloseClick()"
            ];
            $this->removeButton('back');
        } else {
            $saveButtonOptions['save'] = [
                'label'     => $this->__('Save And Back'),
                'onclick'   =>'AmazonTemplateSynchronizationObj.saveClick('
                    . '\'\','
                    . '\'' . $this->getSaveConfirmationText() . '\','
                    . '\'' . \Ess\M2ePro\Block\Adminhtml\Amazon\Template\Grid::TEMPLATE_DESCRIPTION . '\''
                    . ')',
                'class'     => 'save primary'
            ];
        }

        // ---------------------------------------
        $saveButtons = [
            'id' => 'save_and_continue',
            'label' => $this->__('Save And Continue Edit'),
            'class' => 'add',
            'button_class' => '',
            'onclick'   => 'AmazonTemplateSynchronizationObj.saveAndEditClick('
                . '\'\','
                . 'undefined,'
                . '\'' . $this->getSaveConfirmationText() . '\','
                . '\'' . \Ess\M2ePro\Block\Adminhtml\Amazon\Template\Grid::TEMPLATE_DESCRIPTION . '\''
                . ')',
            'class_name' => 'Ess\M2ePro\Block\Adminhtml\Magento\Button\SplitButton',
            'options' => $saveButtonOptions
        ];

        $this->addButton('save_buttons', $saveButtons);
        // ---------------------------------------

        $this->css->addFile('amazon/template.css');
    }

    //########################################
}