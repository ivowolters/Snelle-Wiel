<?php
/**
 * Created by PhpStorm.
 * User: Ivo
 * Date: 25-10-2017
 * Time: 13:41
 */

BaseClass::$oHeader->setTitle("Chauffeur beheren");
include BaseClass::$oVariables->sIncFolder . "header_inc.php";

$Chauffeur = new Chauffeur();

$Chauffeur->getChauffeursData(BaseClass::$oVariables->aExtentions[1]);

if(isset($_POST['Aanpassen'])){
    $Chauffeur->updateChauffeursData(BaseClass::$oVariables->aExtentions[1],
        $_POST['Voornaam'],
        $_POST['Tussenvoegsel'],
        $_POST['Achternaam'],
        $_POST['Telefoonnummer'],
        $_POST['E-mailadres'],
        $_POST['Adres'],
        $_POST['Postcode'],
        $_POST['Plaats']);
    unset($_POST['Aanpassen']);
}

?>
<input type="button" class="btn float-right" VALUE="Nieuwe chauffeur aanmaken" onclick="window.location.href = '<?php echo BaseClass::$oVariables->sDomainOnly; ?>chauffeur-aanmaken'" />
<br/>
    <hr>
    <form method="post" class="form">
    <div class="form-group">
        <label for="Voornaam">Voornaam:</label>
        <input type="name" class="form-control" id="Voornaam" name="Voornaam" value="<?php echo $Chauffeur->sVoornaam; ?>">
    </div>
    <div class="form-group">
        <label for="Tussenvoegsel">Tussenvoegsel:</label>
        <input type="name" class="form-control" id="Tussenvoegsel" name="Tussenvoegsel" value="<?php echo $Chauffeur->sTussenvoegsel; ?>">
    </div>
    <div class="form-group">
        <label for="Achternaam">Achternaam:</label>
        <input type="name" class="form-control" id="Achternaam" name="Achternaam" value="<?php echo $Chauffeur->sAchternaam; ?>">
    </div>
    <div class="form-group">
        <label for="E-mailadres">E-mailadres:</label>
        <input type="name" class="form-control" id="E-mailadres" name="E-mailadres" value="<?php echo $Chauffeur->sEmail; ?>">
    </div>
    <div class="form-group">
        <label for="Telefoonnummer">Telefoonnummer:</label>
        <input type="name" class="form-control" id="Telefoonnummer" name="Telefoonnummer" value="<?php echo $Chauffeur->sTelefoonnummer; ?>">
    </div>
    <div class="form-group">
        <label for="Adres">Adres:</label>
        <input type="name" class="form-control" id="Adres" name="Adres" value="<?php echo $Chauffeur->sAdres; ?>">
    </div>
    <div class="form-group">
        <label for="Postcode">Postcode:</label>
        <input type="name" class="form-control" id="Postcode" name="Postcode" value="<?php echo $Chauffeur->sPostcode; ?>">
    </div>
    <div class="form-group">
        <label for="Plaats">Plaats:</label>
        <input type="name" class="form-control" id="Plaats" name="Plaats" value="<?php echo $Chauffeur->sPlaats; ?>">
    </div>
    <div class="form-group">
        <input type="submit" class="form-control btn-success" id="Aanpassen" value="Aanpassen" name="Aanpassen">
    </div>
</form>

<?php

include BaseClass::$oVariables->sIncFolder . "header_inc.php";