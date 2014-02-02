<?php

class Surpassweb_Taxpercityreport_Block_Adminhtml_Taxpercityreport_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('taxpercityreport_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('taxpercityreport')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('taxpercityreport')->__('Item Information'),
          'title'     => Mage::helper('taxpercityreport')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('taxpercityreport/adminhtml_taxpercityreport_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}