<?php

class Surpassweb_Advancedtaxreport_Block_Adminhtml_Advancedtaxreport_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('advancedtaxreport_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('advancedtaxreport')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('advancedtaxreport')->__('Item Information'),
          'title'     => Mage::helper('advancedtaxreport')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('advancedtaxreport/adminhtml_advancedtaxreport_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}