<?php
class Surpassweb_Taxpercityreport_Block_Adminhtml_Taxpercityreport extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_taxpercityreport';
        $this->_blockGroup = 'taxpercityreport';
        $this->_headerText = Mage::helper('taxpercityreport')->__('Advanced Tax Report');
        parent::__construct();
        $this->_removeButton('add');
    }
}