<?php
class Surpassweb_Advancedtaxreport_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/advancedtaxreport?id=15 
    	 *  or
    	 * http://site.com/advancedtaxreport/id/15 	
    	 */
    	/* 
		$advancedtaxreport_id = $this->getRequest()->getParam('id');

  		if($advancedtaxreport_id != null && $advancedtaxreport_id != '')	{
			$advancedtaxreport = Mage::getModel('advancedtaxreport/advancedtaxreport')->load($advancedtaxreport_id)->getData();
		} else {
			$advancedtaxreport = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($advancedtaxreport == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$advancedtaxreportTable = $resource->getTableName('advancedtaxreport');
			
			$select = $read->select()
			   ->from($advancedtaxreportTable,array('advancedtaxreport_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$advancedtaxreport = $read->fetchRow($select);
		}
		Mage::register('advancedtaxreport', $advancedtaxreport);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}