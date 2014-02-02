<?php
class Surpassweb_Advancedtaxreport_Block_Advancedtaxreport extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getAdvancedtaxreport()
     { 
        if (!$this->hasData('advancedtaxreport')) {
            $this->setData('advancedtaxreport', Mage::registry('advancedtaxreport'));
        }
        return $this->getData('advancedtaxreport');
        
    }
}