<?php
/**
 * Created by PhpStorm.
 * User: Ivo
 * Date: 12-10-2017
 * Time: 11:14
 */
BaseClass::$oHeader->setTitle("Chauffeurs lijst");
include BaseClass::$oVariables->sIncFolder . "header_inc.php";

$oChauffeur = new Chauffeur();
$oChauffeur->getChauffeursList();


include BaseClass::$oVariables->sIncFolder . "end_inc.php";