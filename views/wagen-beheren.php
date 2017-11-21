<?php


BaseClass::$oHeader->setTitle("Wagen beheren");
include BaseClass::$oVariables->sIncFolder . "header_inc.php";

$voertuig = new Voertuig();

$voertuig->getVoertuigData(BaseClass::$oVariables->aExtentions[1]);

var_dump($voertuig);
?>


    <input type="button" class="btn float-right" VALUE="Nieuwe chauffeur aanmaken" onclick="window.location.href = '<?php echo BaseClass::$oVariables->sDomainOnly; ?>chauffeur-aanmaken'" />
    <br/>
    <hr>
    <form method="post" class="form">
        <div class="form-group">
            <label for="Merk">Merk:</label>
            <input type="name" class="form-control" id="Merk" name="Merk" value="<?php echo $voertuig->sMerk; ?>">
        </div>
        <div class="form-group">
            <label for="Model">Model:</label>
            <input type="text" class="form-control" id="Model" name="Model" value="<?php echo $voertuig->sModel; ?>">
        </div>
        <div class="form-group">
            <label for="Kenteken">Kenteken:</label>
            <input type="text" class="form-control" id="Kenteken" name="Kenteken" value="<?php echo $voertuig->sKenteken; ?>">
        </div>
        <div class="form-group">
            <label for="Laatste-APK">Laatste APK:</label>
            <input type="date" class="form-control" id="Laatste-APK" name="Laatste-APK" value="<?php echo date("Y-m-i", $voertuig->iLaatsteApk); ?>">
        </div>
        <div class="form-group">
            <label for="Telefoonnummer">Telefoonnummer:</label>
            <input type="name" class="form-control" id="Telefoonnummer" name="Telefoonnummer" value="<?php echo $voertuig->sTelefoonnummer; ?>">
        </div>
        <div class="form-group">
            <label for="Adres">Adres:</label>
            <input type="name" class="form-control" id="Adres" name="Adres" value="<?php echo $voertuig->sAdres; ?>">
        </div>
        <div class="form-group">
            <label for="Postcode">Postcode:</label>
            <input type="name" class="form-control" id="Postcode" name="Postcode" value="<?php echo $voertuig->sPostcode; ?>">
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