<?php
/**
 * Copyright © 2016 Studio Raz. All rights reserved.
 * For more information contact us at dev@studioraz.co.il
 * See COPYING_STUIDRAZ.txt for license details.
 */

$installer = $this;
$installer->startSetup();

foreach (array('sales/order_address', 'sales/quote_address') as $tableAlias) {
    $installer->getConnection()
        ->addColumn($installer->getTable($tableAlias), 'shipping_ups_pickup_id', array(
            'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
            'nullable'  => true,
            'length'    => 40,
            'default'   => null,
            'comment'   => 'Shipping UPS Pickup ID'
        ));
    $installer->getConnection()
        ->addColumn($installer->getTable($tableAlias), 'shipping_additional_information', array(
            'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
            'nullable'  => true,
            'default'   => null,
            'comment'   => 'Shipping Additional Information'
        ));
}

$installer->endSetup();