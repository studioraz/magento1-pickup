<?php
$this->startSetup();

$templateCode = 'New Order (with PickUP location information)';
$model = Mage::getModel('adminhtml/email_template')->load($templateCode, 'template_code');
$data = array (
    'template_code' => $templateCode,
    'template_text' => '{{template config_path="design/email/header"}}
{{inlinecss file="email-inline.css"}}

<table cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td>
            <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td class="email-heading">
                        <h1>Thank you for your order from {{var store.getFrontendName()}}.</h1>
                        <p>Once your package ships we will send an email with a link to track your order. Your order summary is below. Thank you again for your business.</p>
                    </td>
                    <td class="store-info">
                        <h4>Order Questions?</h4>
                        <p>
                            {{depend store_phone}}
                            <b>Call Us:</b>
                            <a href="tel:{{var phone}}">{{var store_phone}}</a><br>
                            {{/depend}}
                            {{depend store_hours}}
                            <span class="no-link">{{var store_hours}}</span><br>
                            {{/depend}}
                            {{depend store_email}}
                            <b>Email:</b> <a href="mailto:{{var store_email}}">{{var store_email}}</a>
                            {{/depend}}
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="order-details">
            <h3>Your order <span class="no-link">#{{var order.increment_id}}</span></h3>
            <p>Placed on {{var order.getCreatedAtFormated(\'long\')}}</p>
        </td>
    </tr>
    <tr class="order-information">
        <td>
            {{if order.getEmailCustomerNote()}}
            <table cellspacing="0" cellpadding="0" class="message-container">
                <tr>
                    <td>{{var order.getEmailCustomerNote()}}</td>
                </tr>
            </table>
            {{/if}}
            {{layout handle="sales_email_order_items" order=$order}}
            <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td class="address-details">
                        <h6>Bill to:</h6>
                        <p><span class="no-link">{{var order.getBillingAddress().format(\'html\')}}</span></p>
                    </td>
                    {{depend order.getIsNotVirtual()}}
                    <td class="address-details">
                        <h6>Ship to:</h6>
                        <p><span class="no-link">{{var order.getShippingAddress().format(\'html\')}}</span></p>
                    </td>
                    {{/depend}}
                </tr>
                <tr>
                    {{depend order.getIsNotVirtual()}}
                    <td class="method-info">
                        <h6>Shipping method:</h6>
                        <p>{{var order.shipping_description}}</p>
                        {{block type=\'sr_upsship/email_order_new_shippingAdditional\' area=\'frontend\' template=\'sr/upshsip/email/order/new/shipping_additional.phtml\' order=$order}}
                    </td>
                    {{/depend}}
                    <td class="method-info">
                        <h6>Payment method:</h6>
                        {{var payment_html}}
                    </td>                    
                </tr>
            </table>
        </td>
    </tr>
</table>

{{template config_path="design/email/footer"}}',
    'template_styles' => '',
    'template_type' => Mage_Core_Model_Email_Template::TYPE_HTML,
    'template_subject' => '{{var store.getFrontendName()}}: New Order # {{var order.increment_id}}',
    'template_sender_name' => NULL,
    'template_sender_email' => NULL,
    'added_at' => Mage::getSingleton('core/date')->gmtDate(),
    'orig_template_code' => 'sales_email_order_template'
);
$model->setData($data)->save();

$templateCode = 'New Order for Guest (with PickUp location information)';
$model = Mage::getModel('adminhtml/email_template')->load($templateCode, 'template_code');
$data = array (
    'template_code' => $templateCode,
    'template_text' => '{{template config_path="design/email/header"}}
{{inlinecss file="email-inline.css"}}

<table cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td>
            <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td class="email-heading">
                        <h1>Thank you for your order from {{var store.getFrontendName()}}.</h1>
                        <p>Once your package ships we will send an email with a link to track your order. Your order summary is below. Thank you again for your business.</p>
                    </td>
                    <td class="store-info">
                        <h4>Order Questions?</h4>
                        <p>
                            {{depend store_phone}}
                            <b>Call Us:</b>
                            <a href="tel:{{var phone}}">{{var store_phone}}</a><br>
                            {{/depend}}
                            {{depend store_hours}}
                            <span class="no-link">{{var store_hours}}</span><br>
                            {{/depend}}
                            {{depend store_email}}
                            <b>Email:</b> <a href="mailto:{{var store_email}}">{{var store_email}}</a>
                            {{/depend}}
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="order-details">
            <h3>Your order <span class="no-link">#{{var order.increment_id}}</span></h3>
            <p>Placed on {{var order.getCreatedAtFormated(\'long\')}}</p>
        </td>
    </tr>
    <tr class="order-information">
        <td>
            {{if order.getEmailCustomerNote()}}
            <table cellspacing="0" cellpadding="0" class="message-container">
                <tr>
                    <td>{{var order.getEmailCustomerNote()}}</td>
                </tr>
            </table>
            {{/if}}
            {{layout handle="sales_email_order_items" order=$order}}
            <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td class="address-details">
                        <h6>Bill to:</h6>
                        <p><span class="no-link">{{var order.getBillingAddress().format(\'html\')}}</span></p>
                    </td>
                    {{depend order.getIsNotVirtual()}}
                    <td class="address-details">
                        <h6>Ship to:</h6>
                        <p><span class="no-link">{{var order.getShippingAddress().format(\'html\')}}</span></p>
                    </td>
                    {{/depend}}
                </tr>
                <tr>
                    {{depend order.getIsNotVirtual()}}
                    <td class="method-info">
                        <h6>Shipping method:</h6>
                        <p>{{var order.shipping_description}}</p>
                        {{block type=\'sr_upsship/email_order_new_shippingAdditional\' area=\'frontend\' template=\'sr/upship/email/order/new/shipping_additional.phtml\' order=$order}}
                    </td>
                    {{/depend}}
                    <td class="method-info">
                        <h6>Payment method:</h6>
                        {{var payment_html}}
                    </td>                    
                </tr>
            </table>
        </td>
    </tr>
</table>

{{template config_path="design/email/footer"}}',
    'template_styles' => '',
    'template_type' => Mage_Core_Model_Email_Template::TYPE_HTML,
    'template_subject' => '{{var store.getFrontendName()}}: New Order # {{var order.increment_id}}',
    'template_sender_name' => NULL,
    'template_sender_email' => NULL,
    'added_at' => Mage::getSingleton('core/date')->gmtDate(),
    'orig_template_code' => 'sales_email_order_guest_template'
);
$model->setData($data)->save();

$whitelistBlock = Mage::getModel('admin/block');
$whitelistBlock->setData('block_name', 'sr_upsship/email_order_new_shippingAdditional');
$whitelistBlock->setData('is_allowed', 1);
$whitelistBlock->save();

$this->endSetup();