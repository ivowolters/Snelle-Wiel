<?php

BaseClass::$oHeader->setTitle("Chauffeur aanmaken");
include BaseClass::$oVariables->sIncFolder . "header_inc.php";

$Chauffeur = new Chauffeur();

if(isset($_POST['Aanmaken'])) {
    echo $Chauffeur->makeNewChauffeur($_POST['Voornaam'], $_POST['Tussenvoegsel'], $_POST['Achternaam'], $_POST['Telefoonnummer'], $_POST['E-mailadres'], $_POST['Adres'], $_POST['Postcode'], $_POST['Plaats'], $_POST['wachtwoord'], $_POST['r-wachtwoord']);
    unset($_POST['Aanmaken']);
}
?>
    <form method="post" class="form">
        <div class="form-group">
            <label for="Voornaam">Voornaam: *</label>
            <input type="name" class="form-control" id="Voornaam" name="Voornaam" required>
        </div>
        <div class="form-group">
            <label for="Tussenvoegsel">Tussenvoegsel:</label>
            <input type="name" class="form-control" id="Tussenvoegsel" name="Tussenvoegsel">
        </div>
        <div class="form-group">
            <label for="Achternaam">Achternaam: *</label>
            <input type="name" class="form-control" id="Achternaam" name="Achternaam" required>
        </div>
        <div class="form-group">
            <label for="E-mailadres">E-mailadres: *</label>
            <input type="name" class="form-control" id="E-mailadres" name="E-mailadres" required>
        </div>
        <div class="form-group">
            <label for="wachtwoord">Wachtwoord: *</label>
            <input type="name" class="form-control" id="wachtwoord" name="wachtwoord" required>
        </div>
        <div class="form-group">
            <label for="r-wachtwoord">Herhaal wachtwoord: *</label>
            <input type="name" class="form-control" id="r-wachtwoord" name="r-wachtwoord" required>
        </div>
        <div class="form-group">
            <label for="Telefoonnummer">Telefoonnummer: *</label>
            <input type="name" class="form-control" id="Telefoonnummer" name="Telefoonnummer">
        </div>
        <div class="form-group">
            <label for="Adres">Adres: *</label>
            <input type="name" class="form-control" id="Adres" name="Adres" required>
        </div>
        <div class="form-group">
            <label for="Postcode">Postcode: *</label>
            <input type="name" class="form-control" id="Postcode" name="Postcode" required>
        </div>
        <div class="form-group">
            <label for="Plaats">Plaats: *</label>
            <input type="name" class="form-control" id="Plaats" name="Plaats" required>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn-success" id="Aanmaken" value="Aanmaken" name="Aanmaken">
        </div>
    </form>

<?php

include BaseClass::$oVariables->sIncFolder . "header_inc.php";
