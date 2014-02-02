<?php

class Surpassweb_Advancedtaxreport_Block_Adminhtml_Advancedtaxreport_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    protected $_countTotals = true;

    public function __construct()
    {
        parent::__construct();
        $this->setId('advancedtaxreportGrid');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);

        $default_state = Mage::getStoreConfig('advancedtaxreport/reportsettings/defaultstate');
        if ($default_state != '') {
            $this->setDefaultFilter(array('region' => $default_state));
            $this->setDefaultSort('city');
        } else {
            $this->setDefaultSort('region');
        }
    }

    protected function _prepareCollection()
    {
        $countryCode = Mage::getStoreConfig('general/country/default');
        if(empty($countryCode)){
            $countryCode = 'US';
        }

        $from_source = Mage::getStoreConfig('advancedtaxreport/reportsettings/periodfrom');
        $to_source = Mage::getStoreConfig('advancedtaxreport/reportsettings/periodto');
        $from = !empty($from_source) ? date('Y-m-d:G:i:s', strtotime($from_source)) : false;
        $to = !empty($to_source) ? date('Y-m-d:G:i:s', strtotime($to_source)) : false;

        $collection = Mage::getModel('sales/order_address')->getCollection();
        $collection
            ->addAttributeToSelect('region')
            ->addAttributeToSelect('city')
            ->addAttributeToFilter('country_id', $countryCode)
            ->addAttributeToFilter('address_type', 'shipping')
            ->addFieldToFilter(array('status', 'status'),
                array(
                    array('eq' => 'complete'),
                    array('eq' => 'processing')
                ));

        if ($from & $to) {
            $collection->addAttributeToFilter('created_at', array('from' => $from, 'to' => $to));
        }

        $collection->getSelect()->joinLeft(
            array('order' => 'mvmt_sales_flat_order'),
            'order.entity_id = main_table.parent_id',
            array(
                'status' => 'order.status',
                'created_at' => 'order.created_at',
                'grand_total' => 'SUM(order.grand_total)'))
            ->joinLeft(
                array('order_tax' => 'mvmt_sales_order_tax'),
                'order_tax.order_id = main_table.parent_id',
                array(
                    'county' => 'order_tax.title',
                    'tax_amount' => 'SUM(order_tax.amount)',
                    'tax_rate' => 'order_tax.percent'))
            ->distinct(true);

        $collection->getSelect()
//            ->group('county')
            ->group('city');


        $this->setCollection($collection);
//        echo (String)$collection->getSelect();
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $show_rate = Mage::getStoreConfig('advancedtaxreport/reportsettings/showrate');

        $this->addColumn('region', array(
            'header' => Mage::helper('advancedtaxreport')->__('State'),
            'align' => 'left',
            'sortable' => true,
            'index' => 'region'
        ));

        $this->addColumn('county', array(
            'header' => Mage::helper('advancedtaxreport')->__('County'),
            'align' => 'left',
            'sortable' => true,
            'index' => 'county'
        ));

        $this->addColumn('city', array(
            'header' => Mage::helper('advancedtaxreport')->__('City'),
            'align' => 'left',
            'sortable' => true,
            'index' => 'city'
        ));

        if ($show_rate) {
            $this->addColumn('tax_rate', array(
                'header' => Mage::helper('advancedtaxreport')->__('Rate (%)'),
                'align' => 'right',
                'sortable' => false,
                'filter' => false,
                'index' => 'tax_rate'
            ));
        }

        $this->addColumn('tax_amount', array(
            'header' => Mage::helper('advancedtaxreport')->__('Tax Dollar Amount Collected'),
            'align' => 'right',
            'sortable' => true,
            'filter'    => false,
            'index' => 'tax_amount'
        ));

        $this->addColumn('grand_total', array(
            'header' => Mage::helper('advancedtaxreport')->__('Total City Sales Amount'),
            'align' => 'right',
            'sortable' => true,
            'filter'    => false,
            'index' => 'grand_total'
        ));

        $this->addExportType('*/*/exportCsv', Mage::helper('advancedtaxreport')->__('CSV'));
        $this->addExportType('*/*/exportXml', Mage::helper('advancedtaxreport')->__('XML'));

        parent::_prepareColumns();
    }

//    protected function _prepareMassaction()
//    {
//        $this->setMassactionIdField('advancedtaxreport_id');
//        $this->getMassactionBlock()->setFormFieldName('advancedtaxreport');
//
//        $this->getMassactionBlock()->addItem('delete', array(
//             'label'    => Mage::helper('advancedtaxreport')->__('Delete'),
//             'url'      => $this->getUrl('*/*/massDelete'),
//             'confirm'  => Mage::helper('advancedtaxreport')->__('Are you sure?')
//        ));
//
//        $statuses = Mage::getSingleton('advancedtaxreport/status')->getOptionArray();
//
//        array_unshift($statuses, array('label'=>'', 'value'=>''));
//        $this->getMassactionBlock()->addItem('status', array(
//             'label'=> Mage::helper('advancedtaxreport')->__('Change status'),
//             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
//             'additional' => array(
//                    'visibility' => array(
//                         'name' => 'status',
//                         'type' => 'select',
//                         'class' => 'required-entry',
//                         'label' => Mage::helper('advancedtaxreport')->__('Status'),
//                         'values' => $statuses
//                     )
//             )
//        ));
//        return $this;
//    }

    public function getTotals()
    {
        $totals = new Varien_Object();
        $fields = array(
            'grand_total' => 0, //actual column index, see _prepareColumns()
            'tax_amount' => 0,
        );

        foreach ($this->getCollection() as $item) {
            foreach($fields as $field => $value){
                $fields[$field] += $item->getData($field);
            }
        }
        //First column in the grid
        $fields['region']='Totals';
        $totals->setData($fields);
        return $totals;
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

}