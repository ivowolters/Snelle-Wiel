<?php
	session_start();
	if($_SESSION['user']["test"] == 1){
		ini_set("display_errors", 1);
	}
	include_once "mpluskassa/Mplusqapiclient.php";
    include_once "autoload.php";
    include_once "BaseClass.class.php";
	new BaseClass();