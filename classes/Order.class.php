<?php
/**
 * Created by PhpStorm.
 * User: Ivo
 * Date: 12-10-2017
 * Time: 11:48
 */

class Order
{
    private $iId;
    private $iUserId;
    private $iAantalKm;
    private $BbeginPostcode;
    private $sBeginHuisnummer;
    private $sEindPostcode;
    private $sEindHuisnummer;
    private $dPrijsPerKm;
    private $bGefactureerd;


    function makeOrder($userId, $aantalKm, $beginPostcode, $beginHuisnummer, $eindPostcode, $eindHuisnummer, $prijsPerKm, $gefactureerd){

    }

    function editOrderData($id, $userId, $aantalKm, $beginPostcode, $beginHuisnummer, $eindPostcode, $eindHuisnummer, $prijsPerKm, $gefactureerd){

    }

    function getOrderList(){

    }

    function getOrderData($id){

    }

    function removeOrder($id){

    }


}