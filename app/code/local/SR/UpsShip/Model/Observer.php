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

    /**
     * Assigns tracking number to the newly created shipment
     */
    public function saveTrackingNumbers($observer)
    {

        if (!Mage::getStoreConfigFlag('upsship/general/enabled')) {
            return;
        }


        /** @var SR_UpsShip_Model_Carrier $carrier */
        $carrier = Mage::getModel('sr_upsship/carrier');
        /** @var SR_UpsShip_Model_Service_InsertPickupsShipment $service */
        $service = Mage::getModel('sr_upsship/service_insertPickupsShipment');
        /** @var Mage_Sales_Model_Order_Shipment $shipment */
        $shipment = $observer->getEvent()->getShipment();
        $order = $shipment->getOrder();
        if ($order->getShippingMethod(true)->getCarrierCode() == $carrier->getCarrierCode()
            && $order->getTracksCollection()->count() == 0
        ) {
            $trackingData = $service->setEntity($order)->execute();
            if (!$trackingData) {
                $error = 'Some error has occurred. Please check if your login details are correct.';
                $this->_getAdminSession()->addError($error);
                throw new Exception($error);
            }
            if ($trackingData['error_code'] && $trackingData['error_message']) {
                $error = sprintf('The service returned an error code "%s" with message "%s"',
                    $trackingData['error_code'],
                    $trackingData['error_message']
                );
                $this->_getAdminSession()->addError($error);
                throw new Exception($error);
            }
            foreach ($trackingData['tracking_numbers'] as $trackingNumber) {
                $shipment->addTrack(
                    Mage::getModel('sales/order_shipment_track')
                        ->setNumber($trackingNumber)
                        ->setCarrierCode($carrier->getCarrierCode())
                        ->setTitle($carrier->getConfigData('title'))
                );
            }
        }
    }

    /**
     * Retrieve session model
     *
     * @return Mage_Adminhtml_Model_Session
     */
    protected function _getAdminSession()
    {
        return Mage::getSingleton('adminhtml/session');
    }
}