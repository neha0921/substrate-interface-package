<?php
namespace neha0921\SubstrateInterfacePackage\Exception;

use Exception;

class ValueErrorException extends Exception {
    
  public function __construct($errorMsg)
   {
    //error message
    /* $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
    .': <b>'.$errorMsg.'</b> is not a valid E-Mail address'; */
    return $errorMsg;
  }
}
