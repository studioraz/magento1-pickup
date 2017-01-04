<?php
/**
 * Copyright © 2016 Studio Raz. All rights reserved.
 * For more information contact us at dev@studioraz.co.il
 * See COPYING_STUIDRAZ.txt for license details.
 */

/**
 * Class SR_UpsShip_Model_Observer
 */
class SR_UpsShip_Model_Observer extends Varien_Event_Observer
{
    /**
     * Saves additional carrier info to the quote address
     */
    public function saveAdditionalShipping($observer)
    {
        /** @var Mage_Sales_Model_Quote $quote */
        $quote = $observer->getEvent()->getQuote();
        /** @var Mage_Core_Controller_Request_Http $request */
        $request = $observer->getEvent()->getRequest();

        /** @var Mage_Sales_Model_Quote_Address $shippingAddress */
        $shippingAddress = $quote->getShippingAddress();
        $pickupMethod =
            SR_UpsShip_Model_Carrier::UPS_SHIP_CARRIER_CODE . '_' . SR_UpsShip_Model_Carrier::UPS_SHIP_PICKUP_METHOD_CODE;
        if ($shippingAddress->getShippingMethod() == $pickupMethod) {
            $shippingUpsPickupId = 'shipping_ups_pickup_id';
            $shippingAdditionalInformation = 'shipping_additional_information';
            $shippingAddress
                ->setData($shippingUpsPickupId, htmlspecialchars($request->getPost($shippingUpsPickupId)))
                ->setData($shippingAdditionalInformation, $request->getPost($shippingAdditionalInformation))
                ->save();
        }
    }
}