<?php
namespace neha0921\SubstrateInterfacePackage\Exception;

use Exception;

class SubstrateRequestException extends Exception {
    
  public function errorMessage() {
    //error message
    $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
    .': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
    return $errorMsg;
  }
}
