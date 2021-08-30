<?php

namespace neha0921\SubstrateInterfacePackage\Rpc;

use neha0921\SubstrateInterfacePackage\SubstrateInterface;

class Transaction
{
    private $apiHandler;
    public $destAddr, $value;

    public function __construct(SubstrateInterface $apiHandler)
    {
        $this->apiHandler = $apiHandler;
        $this->balances = new Balances($apiHandler);
    }

    public function get_balances()
    {
        return ($this->balances);
    }

    /* transfer endpoint API*/

    public function signAndSend()
    {
        $inputPara = json_encode(['dest' => $this->apiHandler->destAddr, 'value' => $this->apiHandler->value]);
        $paramerter = [$this->apiHandler->ss58_address,"Balances","transfer", $inputPara,$this->apiHandler->private_key];
        $response = json_decode($this->apiHandler->APIHandler('runtime_submitExtrinsic',$paramerter));
        $result = ($response->result) ? ['status' => true, 'data' => $response->result] : ['status' => false, 'data' => $response->error];
        return json_encode($result);
    }
    
}
