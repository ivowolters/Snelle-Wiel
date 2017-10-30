<?php
/**
 * Created by PhpStorm.
 * User: Ivo
 * Date: 12-10-2017
 * Time: 11:15
 */

class Chauffeur
{
    public $iId;
    public $sVoornaam;
    public $sTussenvoegsel;
    public $sAchternaam;
    public $sTelefoonnummer;
    public $sEmail;
    public $sAdres;
    public $sPostcode;
    public $sPlaats;

    function getChauffeursList(){
        $s = "SELECT * FROM Gebruikers WHERE `Soort gebruiker` = 'Chauffeur'";
        $db = new DataBase();
        $db->setQuery($s);
        $db->executeQuery();
        $r = $db->getResult();
        $array = array();
        while($row = $r->fetch_assoc()) {
            $data['Id'] = "$row[Id]</a>";
            if($row['Tussenvoegsel'] == null){
                $data['Naam'] = "<a href='".BaseClass::$oVariables->sDomainOnly."chauffeur-beheren/$row[Id]'>$row[Voornaam] $row[Achternaam]";
            } else {
                $data['Naam'] = "<a href='".BaseClass::$oVariables->sDomainOnly."chauffeur-beheren/$row[Id]'>$row[Voornaam] $row[Tussenvoegsel] $row[Achternaam]";
            }
            $data['Plaats'] = $row['Plaats'];
            array_push($array, $data);
        }

        BaseClass::$oTemplate->showListItem($array);

    }

    function getChauffeursData($id){
        $s = sprintf("SELECT * FROM Gebruikers WHERE Id = %s AND `Soort gebruiker` = 'Chauffeur'",
        $id);
        $db = new DataBase();
        $db->setQuery($s);
        $db->executeQuery();
        $r = $db->getResult();
        while($row = $r->fetch_assoc()) {
            $this->sVoornaam = $row['Voornaam'];
            $this->sTussenvoegsel = $row['Tussenvoegsel'];
            $this->sAchternaam = $row['Achternaam'];
            $this->sEmail = $row['Email'];
            $this->sTelefoonnummer = $row['Telefoonnummer'];
            $this->sAdres = $row['Adres'];
            $this->sPostcode = $row['Postcode'];
            $this->sPlaats = $row['Plaats'];
        }
        $this->iId = $id;
    }

    function updateChauffeursData($id, $voornaam, $tussenvoegsel, $achternaam, $telefoonnummer, $email, $adres, $postcode, $plaats){
        $s = sprintf("UPDATE `Gebruikers` SET `Voornaam`='%s',`Tussenvoegsel`= '%s',`Achternaam`= '%s',`Telefoonnummer`= '%s',`Email`= '%s',`Adres`= '%s',`Postcode`= '%s',`Plaats`= '%s' WHERE Id = %s",
            $voornaam,
            $tussenvoegsel,
            $achternaam,
            $telefoonnummer,
            $email,
            $adres,
            $postcode,
            $plaats,
            $id);
        try{
            $db = new DataBase();
            $db->setQuery($s);
            $db->executeQuery();
            echo "<p class='sucess'>De gegevens van deze gebruiker zijn succesvol aangepast</p>";
        } catch (Exception $e){
            echo "<p class='error'>Er is iets misgegaan: $e</p>";
        } finally {
            $db->closeConn();
        }
    }

    function makeNewChauffeur($voornaam, $tussenvoegsel, $achternaam, $telefoonnummer, $email, $adres, $postcode, $plaats, $wachtwoord, $rwachtwoord){
        if(!isset($voornaam) or !isset($achternaam) or !isset($telefoonnummer) or !isset($email) or !isset($adres) or !isset($postcode) or !isset($plaats) or !isset($wachtwoord)){
            return "<div class='error'>Één of meerdere verplichte gegevens zijn niet ingevult</div>";
        } elseif($wachtwoord != $rwachtwoord){
            return "<div class='error'>Wachtwoorden komen niet overeen</div>";
        } else {
            $enc = new Encryption();
            $salt = $enc->getSalt();
            $pass = $enc->getEncryptedAccountPassword($wachtwoord, $salt);

            $s = sprintf("INSERT INTO Gebruikers (Voornaam, Tussenvoegsel, Achternaam, Telefoonnummer, Email, Wachtwoord, Salt, Adres, Postcode, Plaats, `Soort gebruiker`, Ip, `Datum aangemaakt`)
                                 VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', 'Chauffeur', '". $_SERVER['REMOTE_ADDR'] ."', '".time()."')",
                $voornaam,
                $tussenvoegsel,
                $achternaam,
                $telefoonnummer,
                $email,
                $pass,
                $salt,
                $adres,
                $postcode,
                $plaats
                );
            $db = new DataBase();
            $db->setQuery($s);
            try{
                $db->executeQuery();
                $db->closeConn();
                return "<div class='success'>Gebruiker is succesvol aangemaakt</div>";
            } catch (Exception $e){
                $db->closeConn();
                return "<div class='error'>Er is iets fout gegaan: $s</div>";
            } finally {
                unset($_POST);
            }
        }
    }

    function deleteChauffeursData($id){

    }
}