<?php
/**
 * Copyright © 2016 Studio Raz. All rights reserved.
 * For more information contact us at dev@studioraz.co.il
 * See COPYING_STUIDRAZ.txt for license details.
 */

/**
 * Class SR_UpsShip_Model_Carrier
 */
class SR_UpsShip_Model_Carrier
    extends Mage_Shipping_Model_Carrier_Abstract
    implements Mage_Shipping_Model_Carrier_Interface
{
    /**
     * Carrier's code, as defined in parent class
     *
     * @var string
     */
    protected $_code = 'upsship';

    const UPS_SHIP_CARRIER_CODE = 'upsship';
    const UPS_SHIP_PICKUP_METHOD_CODE = 'pickup';

    /**
     * Returns available shipping rates for UPS Ship carrier
     *
     * @param Mage_Shipping_Model_Rate_Request $request
     * @return Mage_Shipping_Model_Rate_Result
     */
    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        if ($this->getConfigData('use_tablerate')) {
            $result = $this->_collectTableRates($request);
        } else {
            $result = $this->_collectFixedRates($request);
        }

        return $result;
    }

    protected function _collectTableRates($request)
    {
        $previous = Mage::app()->getStore()->getConfig('carriers/tablerate/active');
        Mage::app()->getStore()->setConfig('carriers/tablerate/active', 1);
        /** @var Mage_Shipping_Model_Rate_Result $result */
        $result = Mage::getModel('shipping/carrier_tablerate')->collectRates($request);
        foreach ($result->getAllRates() as &$rate) {
            if ($rate->getCarrier()) {
                $rate->setCarrier($this->_code);
            }
            if ($rate->getCarrierTitle()) {
                $rate->setCarrierTitle($this->getConfigData('title'));
            }
            if ($rate->getMethod()) {
                $rate->setMethod(self::UPS_SHIP_PICKUP_METHOD_CODE);
            }
            if ($rate->getMethodTitle()) {
                $rate->setMethodTitle('PickUP Ship');
            }
            if ($rate->getPrice()) {
                $price = $rate->getPrice() - (float)$this->getConfigData('subtract_amount');
                $rate->setPrice($price >= 0 ? $price : 0);
            }
        }
        Mage::app()->getStore()->setConfig('carriers/tablerate/active', $previous);

        return $result;
    }

    protected function _collectFixedRates($request)
    {
        /** @var Mage_Shipping_Model_Rate_Result $result */
        $result = Mage::getModel('shipping/rate_result');

        /** @var Mage_Shipping_Model_Rate_Result_Method $rate */
        $rate = Mage::getModel('shipping/rate_result_method');

        $rate->setCarrier($this->_code);
        $rate->setCarrierTitle($this->getConfigData('title'));
        $rate->setMethod(self::UPS_SHIP_PICKUP_METHOD_CODE);
        $rate->setMethodTitle('PickUP Ship');

        $freeShippingLimit = (int)$this->getConfigData('free_shipping_limit');

        $price = ($freeShippingLimit > 0 && $request->getPackageValueWithDiscount() >= $freeShippingLimit)  ? 0  : $this->getConfigData('price');

        $rate->setPrice($price);

        $rate->setCost(0);
        $result->append($rate);

        return $result;
    }

    /**
     * Returns Allowed shipping methods
     *
     * @return array
     */
    public function getAllowedMethods()
    {
        return array(
            'pickup' => 'Store pickup',
        );
    }

    /**
     * Check if carrier has shipping tracking option available
     *
     * @return boolean
     */
    public function isTrackingAvailable() {
        return true;
    }

    /**
     *  Retrieve sort order of current carrier
     *  Shipping line must be last one as the picker button is located at the additional block
     *
     * @return mixed
     */
    public function getSortOrder()
    {
        return 999;
    }



}