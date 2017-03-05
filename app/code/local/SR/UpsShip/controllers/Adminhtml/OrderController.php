<?php
/**
 * Copyright © 2016 Studio Raz. All rights reserved.
 * For more information contact us at dev@studioraz.co.il
 * See COPYING_STUIDRAZ.txt for license details.
 */

/**
 * Class SR_UpsShip_Adminhtml_OrderController
 */
class SR_UpsShip_Adminhtml_OrderController extends Mage_Adminhtml_Controller_Action
{
    /**
     * @var Mage_Sales_Model_Resource_Order_Collection
     */
    public $collection;

    protected function wbLabelsAction()
    {
        $request = $this->getRequest();
        $ids = $request->getParam('order_ids');
        $this->_prepareCollection($ids);

        if (!$this->collection->getSize()) {
            $this->_getSession()->addError($this->__('There are no printable labels related to selected orders.'));
            return $this->_redirectReferer('*/sales_order/view');
        }

        $json = $this->_prepareDataResponse();
        $this->_prepareDownloadResponse('orders.ship', $json, 'application/json');
    }

    /**
     * Prepares order collection
     *
     * @param $ids array
     */
    protected function _prepareCollection($ids)
    {
        if (!$this->collection) {
            $this->collection = Mage::getResourceModel('sales/order_collection')
                ->addFieldToFilter('entity_id', array('in' => $ids))
                ->addFieldToFilter('shipping_method',
                    SR_UpsShip_Model_Carrier::UPS_SHIP_CARRIER_CODE . '_'
                    . SR_UpsShip_Model_Carrier::UPS_SHIP_PICKUP_METHOD_CODE);
            ;

            $billingTableAliasName = 'billing_o_a';
            $this->collection->getSelect()
                ->joinLeft(
                    array($billingTableAliasName => $this->collection->getTable('sales/order_address')),
                    "(main_table.entity_id = {$billingTableAliasName}.parent_id" .
                    " AND {$billingTableAliasName}.address_type = 'billing')"
                );
            $shippingTableAliasName = 'shipping_o_a';
            $this->collection->getSelect()
                ->joinLeft(
                    array($shippingTableAliasName => $this->collection->getTable('sales/order_address')),
                    "(main_table.entity_id = {$shippingTableAliasName}.parent_id" .
                    " AND {$shippingTableAliasName}.address_type = 'shipping')",
                    array('pkp' => 'shipping_additional_information')
                );
            $itemsTableAliasName = 'o_i';
            $this->collection->getSelect()
                ->joinLeft(
                    array($itemsTableAliasName => $this->collection->getTable('sales/order_item')),
                    "(main_table.entity_id = {$itemsTableAliasName}.order_id" .
                    " AND {$itemsTableAliasName}.parent_item_id IS NULL)",
                    array(
                        'sum_weight' => 'SUM(o_i.weight * (qty_ordered - qty_canceled))',
                        'sum_qty' => 'SUM(qty_ordered - qty_canceled)'
                    )
                );

            $this->collection->getSelect()->group('main_table.entity_id');
        }
    }

    /**
     * Prepares data
     *
     * @param bool $asJson
     * @return array|string
     */
    protected function _prepareDataResponse($asJson = true)
    {
        $data = array();
        $i = 1;
        /** @var Mage_Sales_Model_Order $order */
        foreach ($this->collection as $order) {
            $data['Orders'][$i]['ConsigneeAddress']['City'] = $order->getCity();
            $data['Orders'][$i]['ConsigneeAddress']['ContactName'] = $order->getFirstname() . ' ' . $order->getLastname();
            $data['Orders'][$i]['ConsigneeAddress']['HouseNumber'] = $order->getHomeNumber();
            $data['Orders'][$i]['ConsigneeAddress']['PhoneNumber'] = $order->getTelephone();
            $data['Orders'][$i]['ConsigneeAddress']['Street'] = $order->getStreet();
            $data['Orders'][$i]['ConsigneeAddress']['LocationDescription'] = ''; //@todo what is this?
            $data['Orders'][$i]['ConsigneeAddress']['Email'] = $order->getEmail();
            $data['Orders'][$i]['PKP']= $order->getPkp();
            $data['Orders'][$i]['OrderID']= $order->getIncrementId();
            $data['Orders'][$i]['Weight'] = (float)$order->getSumWeight();
            $data['Orders'][$i]['NumberOfPackages'] = 1;
            $i++;
        }

        if ($asJson) {
            $data = json_encode($data, JSON_UNESCAPED_UNICODE);
        }

        return $data;
    }
}