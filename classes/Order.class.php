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

    function getOrderCount($begintijd, $eindtijd){
        $s = sprintf("SELECT COUNT(*) FROM Orders WHERE `tmRijdatum` >= '%s' AND `tmRijdatum` < '%s' AND Ingepland = 0;",
            $begintijd,
            $eindtijd);
        $db = new DataBase();
        $db->setQuery($s);
        $db->executeQuery();
        $r = $db->getResult();
        while($row = $r->fetch_assoc()) {
            return $row["COUNT(*)"];
        }
    }

    function getOrderList(){

    }

    function getOrderArray($begintijd, $eindtijd){
        $array = array();

        $s = sprintf("SELECT * FROM Orders WHERE tmRijdatum >= %s AND tmRijdatum < %s AND Ingepland = 0",
            $begintijd,
            $eindtijd);

        $db = new DataBase();
        $db->setQuery($s);
        $db->executeQuery();
        $r = $db->getResult();

        while($row = $r->fetch_assoc()) {
            array_push($array, $row);
        }

        return $array;
    }

    function getOrderData($id){

    }

    function removeOrder($id){

    }


}