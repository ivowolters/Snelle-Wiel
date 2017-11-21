<?php

/**
 * Created by PhpStorm.
 * User: ivo
 * Date: 5/2/2017
 * Time: 7:18 PM
 */
class Login
{
    private $sMainMsg;

    function login(){
        unset($_SESSION["user"]);

        $oEncryption = new Encryption();
        $oDataBase = new DataBase();

        $s = sprintf("SELECT salt FROM Gebruikers WHERE email = '%s'",$_POST["email"]);
        $oDataBase->setQuery($s);
        $oDataBase->executeQuery();
        $r = $oDataBase->getResult();

        if ($r->num_rows > 0) {
            while($row = $r->fetch_assoc()) {
                $salt = $row["salt"];
            }
        } else {
            $this->sMainMsg = "Gebruiker bestaat niet";
            return;
        }

        $pass = $oEncryption->getEncryptedAccountPassword($_POST["password"], $salt);

        $s = sprintf("SELECT * FROM Gebruikers WHERE Email = '%s' AND Wachtwoord = '%s'",
            $_POST["email"],
            $pass);

        $oDataBase->setQuery($s);
        $oDataBase->executeQuery();
        $r = $oDataBase->getResult();
        if($r->num_rows > 0){
            while ($result = $r->fetch_assoc()){
                foreach ($result as $key => $value) {
                    echo "test";
                    $_SESSION["login"]["valid"] = true;
                    $_SESSION["user"][$key] = $value;
                }
                header("Location: " . BaseClass::$oVariables->sDomainOnly);
            }
        } else {
            echo "ehm";
        }
    }
}