<?php
BaseClass::$oHeader->setTitle("Home");
include BaseClass::$oVariables->sIncFolder . "header_inc.php";
include BaseClass::$oVariables->sIncFolder . "menu_inc.php";

$oRit = new Rit();

?>
<div class="jumbotron">
    <div class="row">
        <div class="col-lg-3 bg-white">
            <?php $oRit->getRitDates(); ?>
        </div>
    </div>
</div>
<?php
include BaseClass::$oVariables->sIncFolder . "footer_inc.php";
include BaseClass::$oVariables->sIncFolder . "end_inc.php";
?>