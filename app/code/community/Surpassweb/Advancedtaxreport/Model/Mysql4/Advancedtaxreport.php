<?php

class Surpassweb_Advancedtaxreport_Model_Mysql4_Advancedtaxreport extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the advancedtaxreport_id refers to the key field in your database table.
        $this->_init('advancedtaxreport/advancedtaxreport', 'advancedtaxreport_id');
    }
}