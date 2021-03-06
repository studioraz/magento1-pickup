<?php

class SR_UpsShip_Model_System_Config_Source_Locationtype
{
    public function toOptionArray()
    {
        return array(
            array(
                'value' => 'all',
                'label' => Mage::helper('sr_upsship')->__('Stores & Lockers')
            ),
            array(
                'value' => 'stores',
                'label' => Mage::helper('sr_upsship')->__('Stores Only')
            ),
            array(
                'value' => 'lockers',
                'label' => Mage::helper('sr_upsship')->__('Lockers Only')
            ),
        );
    }
}