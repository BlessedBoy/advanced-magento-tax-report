<?php

class Surpassweb_Taxpercityreport_Model_Mysql4_Taxpercityreport extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the taxpercityreport_id refers to the key field in your database table.
        $this->_init('taxpercityreport/taxpercityreport', 'taxpercityreport_id');
    }
}