<?php
class Surpassweb_Taxpercityreport_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/taxpercityreport?id=15 
    	 *  or
    	 * http://site.com/taxpercityreport/id/15 	
    	 */
    	/* 
		$taxpercityreport_id = $this->getRequest()->getParam('id');

  		if($taxpercityreport_id != null && $taxpercityreport_id != '')	{
			$taxpercityreport = Mage::getModel('taxpercityreport/taxpercityreport')->load($taxpercityreport_id)->getData();
		} else {
			$taxpercityreport = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($taxpercityreport == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$taxpercityreportTable = $resource->getTableName('taxpercityreport');
			
			$select = $read->select()
			   ->from($taxpercityreportTable,array('taxpercityreport_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$taxpercityreport = $read->fetchRow($select);
		}
		Mage::register('taxpercityreport', $taxpercityreport);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}