<?php
/**
 * Copyright © 2016 Studio Raz. All rights reserved.
 * For more information contact us at dev@studioraz.co.il
 * See COPYING_STUIDRAZ.txt for license details.
 */

/**
 * Class SR_UpsShip_Block_Email_Order_New_ShippingAdditional
 */
class SR_UpsShip_Block_Email_Order_New_ShippingAdditional extends Mage_Core_Block_Template
{
    /**
     * Returns Ups Ship additional information
     *
     * @return string|void
     */
    public function getAdditionalInformation()
    {
        $order = $this->getOrder();
        Mage::log($order->getId());
        if ($order->getIsVirtual()) {
            return;
        }
        $shippingAddress = $order->getShippingAddress();
        Mage::log($shippingAddress->getData('shipping_additional_information'));
        if (!$shippingAddress->getData('shipping_additional_information')) {
            return;
        }
        try {
            $locationData = \Zend_Json::decode($shippingAddress->getData('shipping_additional_information'));
        } catch (\Exception $e) {
            return;
        }
        Mage::log($locationData);
        return $locationData;
    }
}