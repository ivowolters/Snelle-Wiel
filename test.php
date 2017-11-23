<?php
//86.81.148.99
echo $_SERVER["REMOTE_ADDR"];

$_SESSION['test'] = "test";
var_dump($_SESSION['test']);
ini_set("display_errors", 1);
echo "test";