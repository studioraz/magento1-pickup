<?php

class SR_UpsShip_Block_Onestepcheckout_Style extends Magestore_Onestepcheckout_Block_Style {
    /**
     * @return Mage_Core_Block_Abstract
     */
    public function _prepareLayout()
    {
        if (Mage::getStoreConfig('onestepcheckout/general/page_style') == self::FLAT_DESIGN) {
            $this->setTemplate('sr/upsship/onestepcheckout/style/flat_style.phtml');
        } else {
            $this->setTemplate('sr/upsship/onestepcheckout/style/material_style.phtml');
        }
        return parent::_prepareLayout();
    }
}