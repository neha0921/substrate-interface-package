<?php

namespace neha0921\SubstrateInterfacePackage\Rpc;

use neha0921\SubstrateInterfacePackage\ApiHandler;

class State
{
    const STATE_PREFIX = 'state_';

    public $apiHandler;

    public function __construct(ApiHandler $apiHandler)
    {
        $this->apiHandler = $apiHandler;
    }


    /* state_getMetadata endpoint API*/

    public function getMetadata()
    {
        $response = json_decode($this->apiHandler->APIHandler(State::STATE_PREFIX . __FUNCTION__));
        $result = ($response->result) ? ['status' => true, 'data' => $response->result] : ['status' => false, 'data' => $response->error];
        return json_encode($result);
    }

    /* state_getRuntimeVersion endpoint API*/

    public function getRuntimeVersion()
    {
        $response = json_decode($this->apiHandler->APIHandler(State::STATE_PREFIX . __FUNCTION__));
        $result = ($response->result) ? ['status' => true, 'data' => $response->result] : ['status' => false, 'data' => $response->error];
        return json_encode($result);
    }
    /* state_subscribeRuntimeVersion endpoint API*/

    public function subscribeRuntimeVersion()
    {
        $response = json_decode($this->apiHandler->APIHandler(State::STATE_PREFIX . __FUNCTION__));
        $result = ($response->result) ? ['status' => true, 'data' => $response->result] : ['status' => false, 'data' => $response->error];
        return json_encode($result);
    }
    /* state_subscribeStorage endpoint API*/

    public function subscribeStorage()
    {
        $response = json_decode($this->apiHandler->APIHandler(State::STATE_PREFIX . __FUNCTION__));
        $result = ($response->result) ? ['status' => true, 'data' => $response->result] : ['status' => false, 'data' => $response->error];
        return json_encode($result);
    }
    /* state_unsubscribeRuntimeVersion endpoint API*/

    public function unsubscribeRuntimeVersion()
    {
        $response = json_decode($this->apiHandler->APIHandler(State::STATE_PREFIX . __FUNCTION__));
        $result = ($response->result) ? ['status' => true, 'data' => $response->result] : ['status' => false, 'data' => $response->error];
        return json_encode($result);
    }
    /* state_unsubscribeStorage endpoint API*/

    public function unsubscribeStorage()
    {
        $response = json_decode($this->apiHandler->APIHandler(State::STATE_PREFIX . __FUNCTION__));
        $result = ($response->result) ? ['status' => true, 'data' => $response->result] : ['status' => false, 'data' => $response->error];
        return json_encode($result);
    }

    
}
