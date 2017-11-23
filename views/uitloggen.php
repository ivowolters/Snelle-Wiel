<?php
unset($_SESSION["login"]);
unset($_SESSION["user"]);
header("Location: " . BaseClass::$oVariables->sDomainOnly);