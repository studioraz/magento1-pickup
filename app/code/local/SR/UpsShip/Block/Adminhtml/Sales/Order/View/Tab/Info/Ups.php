<?php
/**
 * Copyright © 2016 Studio Raz. All rights reserved.
 * For more information contact us at dev@studioraz.co.il
 * See COPYING_STUIDRAZ.txt for license details.
 */

/**
 * Class SR_UpsShip_Block_Adminhtml_Sales_Order_View_Tab_Info_Ups
 */
class SR_UpsShip_Block_Adminhtml_Sales_Order_View_Tab_Info_Ups extends Mage_Adminhtml_Block_Abstract
{
    protected $_shippingMethod;

    /**
     * Retrieve order model instance
     *
     * @return Mage_Sales_Model_Order
     */
    public function getOrder()
    {
        return Mage::registry('current_order');
    }

    /**
     * Returns shipping method
     *
     * @return string|Varien_Object
     */
    public function getShippingMethod()
    {
        if (!$this->_shippingMethod) {
            $this->_shippingMethod = $this->getOrder()->getShippingMethod(true);
        }

        return $this->_shippingMethod;
    }

    /**
     * Returns flag is block can be shown
     *
     * @return bool
     */
    public function canShow()
    {
        if ($this->getShippingMethod()->getCarrierCode() == SR_UpsShip_Model_Carrier::UPS_SHIP_CARRIER_CODE
            && $this->getShippingMethod()->getMethod() == SR_UpsShip_Model_Carrier::UPS_SHIP_PICKUP_METHOD_CODE
        )
        {
            return true;
        }

        return false;
    }

    /**
     * Returns UPS Ship Pickup Location ID
     *
     * @return mixed
     */
    public function getUpsLocationId()
    {
        return $this->getOrder()->getShippingAddress()->getShippingUpsPickupId();
    }

    /**
     * Returns UPS Ship Pickup Location Details
     *
     * @param bool $asArray
     * @return array|mixed|string
     */
    public function getUpsLocationDetails($asArray = true)
    {
        try {
            $details = Zend_Json::decode($this->getOrder()->getShippingAddress()->getShippingAdditionalInformation());
            foreach(array('lat', 'lng', 'dist') as $skip) {
                unset($details[$skip]);
            }
        } catch (Exception $e) {
            $details = array();
        }
        if ($asArray) {
            return $details;
        }

        return implode(', ', $details);
    }
}