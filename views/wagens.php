<?php
BaseClass::$oHeader->setTitle("Wagens");
include BaseClass::$oVariables->sIncFolder . "header_inc.php";
$voertuigen = new Voertuig();
$voertuigen->getVoertuigList();


include BaseClass::$oVariables->sIncFolder . "end_inc.php";