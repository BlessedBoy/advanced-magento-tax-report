<?php

class Surpassweb_Advancedtaxreport_Model_Mysql4_Advancedtaxreport_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('advancedtaxreport/advancedtaxreport');
    }
}