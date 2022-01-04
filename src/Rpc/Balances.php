<?php

namespace neha0921\SubstrateInterfacePackage\Rpc;

use neha0921\SubstrateInterfacePackage\SubstrateInterface;

class Balances
{

    public $apiHandler;

    public function __construct(SubstrateInterface $apiHandler)
    {
        $this->apiHandler = $apiHandler;
    }


    /* transfer endpoint API*/

    public function transfer($destAddr, $value)
    {
        $this->apiHandler->destAddr = $destAddr;
        $this->apiHandler->value= $value;
        $inputPara = json_encode(['dest' => $destAddr, 'value' => $value]);
        $paramerter = [$destAddr,"Balances","transfer", $inputPara,$this->apiHandler->private_key];
        $response = json_decode($this->apiHandler->APIHandler('runtime_createSignaturePayload',$paramerter,5));
        $result = ($response->result) ? ['status' => true, 'data' => $response->result] : ['status' => false, 'data' => $response->error];
        return json_encode($response);
    }

    

}
