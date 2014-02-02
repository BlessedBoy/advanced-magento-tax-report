<?php

class Surpassweb_Advancedtaxreport_Block_Adminhtml_Advancedtaxreport_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('advancedtaxreport_form', array('legend'=>Mage::helper('advancedtaxreport')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('advancedtaxreport')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('advancedtaxreport')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('advancedtaxreport')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('advancedtaxreport')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('advancedtaxreport')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('advancedtaxreport')->__('Content'),
          'title'     => Mage::helper('advancedtaxreport')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getAdvancedtaxreportData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getAdvancedtaxreportData());
          Mage::getSingleton('adminhtml/session')->setAdvancedtaxreportData(null);
      } elseif ( Mage::registry('advancedtaxreport_data') ) {
          $form->setValues(Mage::registry('advancedtaxreport_data')->getData());
      }
      return parent::_prepareForm();
  }
}