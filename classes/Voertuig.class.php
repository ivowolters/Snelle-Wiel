<?php
/**
 * Created by PhpStorm.
 * User: Ivo
 * Date: 12-10-2017
 * Time: 11:49
 */

class Voertuig
{

    function getVoertuigList(){
        $s = "SELECT * FROM Voertuigen";
        $db = new DataBase();
        $db->setQuery($s);
        $db->executeQuery();
        $r = $db->getResult();
        $array = array();
        while($row = $r->fetch_assoc()) {
            $data['Id'] = "$row[Id]</a>";
            $data['Kenteken'] = "<a href='".BaseClass::$oVariables->sDomainOnly."wagen-beheren.php/$row[Id]'>$row[Kenteken]</a>";
            $data['Soort'] = $row['Soort'];
            array_push($array, $data);
        }

        BaseClass::$oTemplate->showListItem($array);

    }

    function addVoertuig($merk, $model, $kenteken, $laatste_apk, $km_stand_laatste_apk, $soort, $bouwjaar){
        $s = sprintf("INSERT INTO Voertuigen (Merk, Model, Kenteken, `Laatste apk`, `Km stand laatste apk`, Soort, Bouwjaar)
                              VALUES ('%s', '%s', '%s', %s, %s, '%s', %s)");
    }


}