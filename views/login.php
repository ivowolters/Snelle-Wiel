<?php
BaseClass::$oHeader->setTitle("Login");
include BaseClass::$oVariables->sIncFolder . "header_inc.php";
$oLogin = new Login();

if(isset($_POST["login"])){
    $oLogin->login();
}

if(!isset($_SESSION["login"]["valid"])) {
?>
    <div class="jumbotron">
        <div class="container">
            <div class="login">
                <form method="POST">
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Wachtwoord:</label>
                        <input type="password" name="password" class="form-control" id="pwd">
                    </div>
                    <a href="<?php echo BaseClass::$oVariables->sDomainOnly; ?>wachtwoord-vergeten">Wachtwoord vergeten?</a><br/>
                    <button type="submit" name="login" class="btn btn-default">Inloggen</button>
                </form>
            </div>
        </div>
    </div>
<?php
} else {
    echo "u bent al ingelogd";
}
include BaseClass::$oVariables->sIncFolder . "footer_inc.php";