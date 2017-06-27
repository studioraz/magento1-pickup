<?php
/**
 * Copyright © 2016 Studio Raz. All rights reserved.
 * For more information contact us at dev@studioraz.co.il
 * See COPYING_STUIDRAZ.txt for license details.
 */

/**
 * Class SR_UpsShip_Helper_Data
 */
class SR_UpsShip_Helper_Data extends Mage_Core_Helper_Abstract
{

    const PICKUP_API_JS_URL_FORMANT = 'https://pick-ups.co.il/api/ups-pickups.sdk.%s.js?r=2.0';

    /**
     * Get pickup location type (stores & lockers, stores, lockers)
     * @return string
     */
    public function getPickupLocationType()
    {
        return Mage::getStoreConfig('carriers/upsship/pickup_location_type');
    }


    public function getPickupLocationJsUrl()
    {
        return sprintf(self::PICKUP_API_JS_URL_FORMANT, $this->getPickupLocationType());
    }

}