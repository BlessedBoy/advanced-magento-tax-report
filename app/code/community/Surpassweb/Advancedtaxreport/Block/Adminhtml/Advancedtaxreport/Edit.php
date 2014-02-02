<?php

class Surpassweb_Advancedtaxreport_Block_Adminhtml_Advancedtaxreport_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'advancedtaxreport';
        $this->_controller = 'adminhtml_advancedtaxreport';
        
        $this->_updateButton('save', 'label', Mage::helper('advancedtaxreport')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('advancedtaxreport')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('advancedtaxreport_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'advancedtaxreport_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'advancedtaxreport_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('advancedtaxreport_data') && Mage::registry('advancedtaxreport_data')->getId() ) {
            return Mage::helper('advancedtaxreport')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('advancedtaxreport_data')->getTitle()));
        } else {
            return Mage::helper('advancedtaxreport')->__('Add Item');
        }
    }
}