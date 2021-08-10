<?php

namespace neha0921\SubstrateInterfacePackage\Library;

class ss58
{
    /*
    Decodes given SS58 encoded address to an account ID
    Parameters
    ----------
    address: e.g. EaG2CRhJWPb7qmdcJvy3LiWdh26Jreu9Dx6R1rXxPmYXoDk
    valid_address_type

    Returns
    -------
    Decoded string AccountId
     */
    public function ss58_decode($address, $valid_address_type = None){
    
    $checksum_prefix = 'SS58PRE';

    $ss58_format = base58.b58decode(address);

    if($valid_address_type && $ss58_format[0] != $valid_address_type){
        // raise ValueError("Invalid Address type")
    }
    # Determine checksum length according to length of address string
    if (in_array(sizeof($ss58_format) , [3, 4, 6, 10])){
        $checksum_length = 1;
    }else if (in_array(sizeof($ss58_format) , [5, 7, 11, 35])){
        $checksum_length = 2;
    }else if (in_array(sizeof($ss58_format) ,[8, 12])){
        $checksum_length = 3;
    }else if (in_array(sizeof($ss58_format) ,[9, 13])){
        $checksum_length = 4;
    }else if ( in_array(sizeof($ss58_format) ,[14])){
        $checksum_length = 5;
    }else if ( in_array(sizeof($ss58_format) ,[15])){
        $checksum_length = 6;
    }else if ( in_array(sizeof($ss58_format) ,[16])){
        $checksum_length = 7;
    }else if ( in_array(sizeof($ss58_format) ,[17])){
        $checksum_length = 8;
    }else{
        // raise ValueError("Invalid address length")
    }
    $checksum = blake2b($checksum_prefix + $ss58_format[0:-$checksum_length]).digest();

    if ($checksum[0:$checksum_length] != $ss58_format[-checksum_length:]){
        // raise ValueError("Invalid checksum")
    }
    return $ss58_format[1:len($ss58_format)-$checksum_length].hex();
    }
}
