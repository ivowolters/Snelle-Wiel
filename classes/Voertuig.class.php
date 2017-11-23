<?php
/**
 * Created by PhpStorm.
 * User: Ivo
 * Date: 12-10-2017
 * Time: 11:49
 */

class Voertuig
{
    public $sMerk;
    public $sModel;
    public $sKenteken;
    public $iLaatsteApk;
    public $iKmStandLaatsteApk;
    public $sSoort;
    public $iBouwjaar;

    function getVoertuigList(){
        $s = "SELECT * FROM Voertuigen";
        $db = new DataBase();
        $db->setQuery($s);
        $db->executeQuery();
        $r = $db->getResult();
        $array = array();
        while($row = $r->fetch_assoc()) {
            $data['Id'] = $row['Id'];
            $data['Kenteken'] = "<a href='".BaseClass::$oVariables->sDomainOnly."wagen-beheren/$row[Id]'>$row[Kenteken]</a>";
            $data['Soort'] = $row['Soort'];
            array_push($array, $data);
        }

        BaseClass::$oTemplate->showListItem($array);

    }

    function addVoertuig($merk, $model, $kenteken, $laatste_apk, $km_stand_laatste_apk, $soort, $bouwjaar){
        $s = sprintf("INSERT INTO Voertuigen (Merk, Model, Kenteken, `Laatste apk`, `Km stand laatste apk`, Soort, Bouwjaar)
                              VALUES ('%s', '%s', '%s', %s, %s, '%s', %s)");
        $db = new DataBase();
        $db->setQuery($s);
        $db->executeQuery();
        $db->closeConn();
    }

    function updateVoertuigData(){

    }

    function getVoertuigData($id){
        $s = sprintf("SELECT * FROM Voertuigen WHERE Id='%s'",
            $id);
        $db = new DataBase();
        $db->setQuery($s);
        $db->executeQuery();
        $r = $db->getResult();

        while($row = $r->fetch_assoc()) {
            $this->sMerk = $row['Merk'];
            $this->sModel = $row['Model'];
            $this->sKenteken = $row['Kenteken'];
            $this->iLaatsteApk = $row['Laatste apk'];
            $this->iKmStandLaatsteApk = $row['Km stand laatste apk'];
            $this->sAdres = $row['Adres'];
            $this->sSoort = $row['Soort'];
            $this->iBouwjaar = $row['Bouwjaar'];
        }
        $this->iId = $id;
    }
}