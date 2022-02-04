<?php

namespace neha0921\SubstrateInterfacePackage\Rpc;

use neha0921\SubstrateInterfacePackage\SubstrateInterface;

class Author
{
    const AUTHOR_PREFIX = 'author_';

    public $apiHandler;

    public function __construct(SubstrateInterface $apiHandler)
    {
        $this->apiHandler = $apiHandler;
    }


    /* author_pendingExtrinsics endpoint API*/

    public function pendingExtrinsics()
    {
        $response = json_decode($this->apiHandler->APIHandler(Author::AUTHOR_PREFIX . __FUNCTION__));
        if (!empty($response) && isset($response->result)) {
            $result =  ['status' => true, 'data' => !empty($response->result) ? $response->result : 'Data Not Found'];
        } else if (!empty($response) && isset($response->error)) {
            $result =  ['status' => false, 'data' => !empty($response->error) ? $response->error : 'Data Not Found'];
        } else {
            $result = ['status' => false, 'data' => "Somthing is wrong..."];
        }
        return json_encode($result);
    }

    /* author_submitExtrinsic endpoint API*/

    public function submitExtrinsic(array $requestParameter)
    {
        $response = json_decode($this->apiHandler->APIHandler(Author::AUTHOR_PREFIX . __FUNCTION__, $requestParameter));
        if (!empty($response)) {
            $result = isset($response->result) ? ['status' => true, 'data' => $response->result] : ['status' => false, 'data' => $response->error];
        } else {
            $result = ['status' => 0, 'data' => "Somthing is wrong..." . $response];
        }
        return json_encode($result);
    }
}
