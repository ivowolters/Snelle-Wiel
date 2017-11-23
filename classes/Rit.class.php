<?php
/**
 * Created by PhpStorm.
 * User: Ivo
 * Date: 12-10-2017
 * Time: 11:47
 */

class Rit
{
    private $iId;
    private $iGebruikerId;
    private $iVoertuigId;

    function getRitDates(){
        $date = time();
        $arrDate = array();

        array_push($arrDate, $date);

        for ($x = 0; $x <= 10; $x++) {
            $date = strtotime('+1 day', $date);
            array_push($arrDate, $date);
        }

        foreach ($arrDate as $key => $value){
            include BaseClass::$oVariables->sMarkupFolder . "date_Item.php";
        }
    }

    function insertRitten($begintijd, $eindtijd){
        $oOrder = new Order();
        $oChauffeurs = new Chauffeur();

        $iChauffeursCount = $oChauffeurs->getChaufferusCount();
        $iAantalOrders = $oOrder->getOrderCount($begintijd, $eindtijd);

        $aOrders = $oOrder->getOrderArray($begintijd, $eindtijd);
        $aChaufeurs = $oChauffeurs->getChauffeursList();

        $iOrdersPerChauffeur = $iAantalOrders / $iChauffeursCount + 1;
        $iOrdersPerChauffeur = (int) $iOrdersPerChauffeur;

        $iCountInOrderArray = 0;

        $iChauffeursArrayNumber = 1;

        foreach ($aChaufeurs as $key => $value) {
            if(count($aOrders) >= $iChauffeursArrayNumber){

                $s = sprintf("SELECT Id FROM Ritten WHERE `tm Rit` >= '%s' AND `tm Rit` < '%s' AND `Gebruiker id` = %s", $begintijd, $eindtijd, $key);
                $db = new DataBase();
                $db->setQuery($s);
                $db->executeQuery();

                if($db->getResult()->num_rows == 0) {
                    $s = sprintf("INSERT INTO Ritten (`Gebruiker id`, `Voertuig id`, `tm Rit`) VALUES (%s, 1, %s)", $key, time());
                    $db = new DataBase();
                    $db->setQuery($s);
                    $db->executeQuery();
                    $ritId = $db->getInsertedId();


                    for ($x = 0; $x <= $iOrdersPerChauffeur; $x++) {
                        if (isset($aOrders[$iCountInOrderArray])) {
                            $s = sprintf("INSERT INTO `Rit-orders` (`Rit id`, `Order id`) VALUES (%s, %s)", $ritId, $aOrders[$iCountInOrderArray]['Id']);
                            $db = new DataBase();
                            $db->setQuery($s);
                            $db->executeQuery();

                            $s = sprintf("UPDATE Orders SET Ingepland = 1 WHERE Id = %s", $aOrders[$iCountInOrderArray]['Id']);
                            $db = new DataBase();
                            $db->setQuery($s);
                            $db->executeQuery();

                            ++$iCountInOrderArray;
                        } else {
                            break;
                        }
                    }
                }
                $iChauffeursArrayNumber++;
            } else {
                break;
            }
        }
    }

    function getRitList() {

    }

    function getRitInfo(){

    }
}