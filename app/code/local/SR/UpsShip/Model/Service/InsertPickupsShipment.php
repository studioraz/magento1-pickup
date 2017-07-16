<?php
/**
 * Copyright © 2017 Studio Raz. All rights reserved.
 * For more information contact us at dev@studioraz.co.il
 * See COPYING_STUIDRAZ.txt for license details.
 */

class SR_UpsShip_Model_Service_InsertPickupsShipment extends SR_UpsShip_Model_Service_AbstractService
{
    /**
     * @var Mage_Sales_Model_Order
     */
    public $entity;

    /**
     * Returns service location
     *
     * @return string
     */
    protected function _getServiceLocation()
    {
        return 'ShipWebServices/SHipWbService.svc?wsdl';
    }

    /**
     * Prepares and returns request
     */
    protected function _prepareRequest()
    {
        /** @var Mage_Sales_Model_Order $order */
        $order = $this->getEntity();

        $data = array(
            'info' => array(
                'NumberOfPackages' => 1,
                'ConsigneeAddress' => array(
                    'CustomerName' => $order->getCustomerName(),
                    'ContactPerson' => $order->getCustomerName(),
                    'CityName' => $order->getShippingAddress()->getCity(),
                    'StreetName' => $order->getShippingAddress()->getStreet(0),
                    'Phone1' => $order->getShippingAddress()->getTelephone()
                ),
                'PickupPointID' => $order->getShippingAddress()->getShippingUpsPickupId(),
                'Reference1' => $this->getEntity()->getIncrementId(),
                'UseDefaultShipperAddress' => 'true',
                'Weight' => $this->getEntity()->getWeight()
            )
        );

        return $data;
    }

    /**
     * Prepares response to be returned to processor
     *
     * @param $response
     * @return array
     */
    public function readResponse($response)
    {
        if (empty($response)) {
            return array();
        }
        $errorCode = false;
        $errorMessage = false;
        $response = isset($response->{$this->_getRequestMethodName() . 'Result'}) ?
            $response->{$this->_getRequestMethodName() . 'Result'} : new stdClass();

        if (isset($response->IsSucceeded) && $response->IsSucceeded != 'true' && isset($response->LastError)) {
            $errorMessage = $response->LastError->ErrorMessage . ' ' . $response->LastError->OriginalMessage;
            $errorCode = $response->LastError->ErrorCode;
        } else if ($response->IsSucceeded != 'true') {
            $errorMessage = sprintf('Some error has occurred during the %s request.', $this->_getRequestMethodName());
        }

        $data = array(
            'tracking_numbers' => isset($response->TrackingNumber)
                ? array($response->TrackingNumber)
                : array(),
            'error_message' =>  $errorMessage,
            'error_code' => $errorCode
        );

        return $data;
    }

    /**
     * Returns requested method name
     *
     * @return string
     */
    protected function _getRequestMethodName()
    {
        return 'InsertPickupsShipment';
    }
}