<?php
/**
 * Copyright © 2016 Studio Raz. All rights reserved.
 * For more information contact us at dev@studioraz.co.il
 * See COPYING_STUIDRAZ.txt for license details.
 */

/**
 * Class SR_UpsShip_Block_Adminhtml_Sales_Order_Grid
 */
class SR_UpsShip_Block_Adminhtml_Sales_Order_Grid extends Mage_Adminhtml_Block_Sales_Order_Grid
{
    /**
     * Prepares massaction
     *
     * @return $this
     */
    protected function _prepareMassaction()
    {
        parent::_prepareMassaction();
        $this->getMassactionBlock()->addItem('print_wb_label', array(
            'label'=> Mage::helper('sr_upsship')->__('Print WB Labels'),
            'url'  => $this->getUrl('*/order/wbLabels'),
        ));

        return $this;
    }
}