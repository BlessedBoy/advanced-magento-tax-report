<?php

class Surpassweb_Taxpercityreport_Block_Adminhtml_Taxpercityreport_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('taxpercityreport_form', array('legend'=>Mage::helper('taxpercityreport')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('taxpercityreport')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('taxpercityreport')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('taxpercityreport')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('taxpercityreport')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('taxpercityreport')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('taxpercityreport')->__('Content'),
          'title'     => Mage::helper('taxpercityreport')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getTaxpercityreportData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getTaxpercityreportData());
          Mage::getSingleton('adminhtml/session')->setTaxpercityreportData(null);
      } elseif ( Mage::registry('taxpercityreport_data') ) {
          $form->setValues(Mage::registry('taxpercityreport_data')->getData());
      }
      return parent::_prepareForm();
  }
}