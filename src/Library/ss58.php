<?php

namespace neha0921\SubstrateInterfacePackage\Library;

use deemru\Blake2b;
use Exception;
use StephenHill\Base58;

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
    public static function ss58_decode($address, $valid_address_type = NULL)
    {
        if (substr( $address, 0, 2 ) == "0x"){
            return $address;
        }

        $base58 = new Base58('123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ');
        $checksum_prefix = 'SS58PRE';

        $ss58_format = $base58->decode($address);

        if ($valid_address_type && $ss58_format[0] != $valid_address_type) {
            throw new Exception("Invalid Address type");
        }
        # Determine checksum length according to length of address string
        if (in_array(strlen($ss58_format), [3, 4, 6, 10])) {
            $checksum_length = 1;
        } else if (in_array(strlen($ss58_format), [5, 7, 11, 35])) {
            $checksum_length = 2;
        } else if (in_array(strlen($ss58_format), [8, 12])) {
            $checksum_length = 3;
        } else if (in_array(strlen($ss58_format), [9, 13])) {
            $checksum_length = 4;
        } else if (in_array(strlen($ss58_format), [14])) {
            $checksum_length = 5;
        } else if (in_array(strlen($ss58_format), [15])) {
            $checksum_length = 6;
        } else if (in_array(strlen($ss58_format), [16])) {
            $checksum_length = 7;
        } else if (in_array(strlen($ss58_format), [17])) {
            $checksum_length = 8;
        } else {
            throw new Exception("Invalid address length");
        }
        $checksum = hash($checksum_prefix, $ss58_format);

        if (substr($checksum, 0, $checksum_length) != $ss58_format) {
            throw new Exception("Invalid checksum");
        }
        $position = strlen($ss58_format) - $checksum_length;
        return bin2hex(substr($ss58_format, 1, $position));
    }

    /*
    Encodes an account ID to an Substrate address according to provided address_type

    Parameters
    ----------
    address
    address_type

    Returns
    -------

    */

    public static function ss58_encode($address, $address_type = 42)
    {
        $blake2b = new Blake2b();
        $base58 = new Base58('123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ');
        $checksum_prefix = 'SS58PRE';

        if ($address_type){
            $ss58_format = $address_type;
        }
        
        if ($ss58_format < 0 || $ss58_format > 16383 || in_array($ss58_format , [46, 47])){
            throw new Exception("Invalid value for ss58_format");
        }

        $encodingType = mb_detect_encoding($address);
        if (mb_check_encoding($address, $encodingType)) {
            $address_bytes = $address;
        } else {
            $address_bytes = hex2bin(str_replace('0x', '', $address));
        }

        if (sizeof($address_bytes) == 32) {
            # Checksum size is 2 bytes for public key
            $checksum_length = 2;
        } else if (in_array(sizeof($address_bytes), [1, 2, 4, 8])) {
            # Checksum size is 1 byte for account index
            $checksum_length = 1;
        } else {
            throw new Exception("Invalid length for address");
        }

        if ($ss58_format < 64){
            $ss58_format_bytes = random_bytes($ss58_format);
    }
    
        $input_bytes = $ss58_format_bytes + $address_bytes;
        $checksum = $blake2b->hash($checksum_prefix + $input_bytes);
        return $base58->encode($input_bytes.$checksum);

    }

    /*
    Encodes an AccountIndex to an Substrate address according to provided address_type

    Parameters
    ----------
    account_index
    address_type

    Returns
    -------
    */
    /* public function ss58_encode_account_index($account_index, $address_type = 42)
    {

        if (0 <= $account_index <= (pow(2, 8)- 1)) {
            $account_idx_encoder = U8();
        } else if (2 ** 8 <= $account_index <= pow(2, 16) - 1) {
            $account_idx_encoder = U16();
        } else if (2 ** 16 <= $account_index <= pow(2, 32) - 1) {
            $account_idx_encoder = U32();
        } else if (2 ** 32 <= $account_index <= pow(2, 64) - 1) {
            $account_idx_encoder = U64();
        } else {
            throw new Exception("Value too large for an account index");
        }
        return $this->ss58_encode($account_idx_encoder . encode($account_index) . data, $address_type);
    } */

    /*
    Decodes given SS58 encoded address to an AccountIndex

    Parameters
    ----------
    address
    valid_address_type

    Returns
    -------
    Decoded int AccountIndex
    account_index_bytes = ss58_decode(address, valid_address_type) */

    /* public function ss58_decode_account_index($address, $valid_address_type = 42)
    {

        if (sizeof($account_index_bytes) == 2) {
            return U8(ScaleBytes('0x{}' . format($account_index_bytes))) . decode();
        } else if (sizeof($account_index_bytes) == 4) {
            return U16(ScaleBytes('0x{}' . format($account_index_bytes))) . decode();
        } else if (sizeof($account_index_bytes) == 8) {
            return U32(ScaleBytes('0x{}' . format($account_index_bytes))) . decode();
        } else if (sizeof($account_index_bytes) == 16) {
            return U64(ScaleBytes('0x{}' . format($account_index_bytes))) . decode();
        } else {
            throw new Exception("Invalid account index length");
        }
    } */
}
