<?php
class Surpassweb_Advancedtaxreport_Block_Adminhtml_Advancedtaxreport extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_advancedtaxreport';
        $this->_blockGroup = 'advancedtaxreport';
        $this->_headerText = Mage::helper('advancedtaxreport')->__('Advanced Tax Report');
        parent::__construct();
        $this->_removeButton('add');
    }
}