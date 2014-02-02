<?php
class Surpassweb_Taxpercityreport_Block_Taxpercityreport extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getTaxpercityreport()     
     { 
        if (!$this->hasData('taxpercityreport')) {
            $this->setData('taxpercityreport', Mage::registry('taxpercityreport'));
        }
        return $this->getData('taxpercityreport');
        
    }
}