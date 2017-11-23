<?php
/**
 * Created by PhpStorm.
 * User: Ivo
 * Date: 3-5-2017
 * Time: 11:53
 */
class Encryption
{
    function getEncryptedAccountPassword($pass, $salt) {
        for($y = 0; $y < 69543; $y++){
            $pass = hash('sha256', $pass. $salt);
        }

        return $pass;
    }

    function getSalt() {
        $salt = dechex(mt_rand(0,45930)) . dechex(mt_rand(0,45930));

        return $salt;
    }

    function getEncryptedAanvraagId($id) {
        for($y = 0; $y < 49870; $y++){
            $encrypted = hash('sha256', $id);
        }

        return $encrypted;
    }
}