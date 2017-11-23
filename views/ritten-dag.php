<?php
$oRit = new Rit();

$begintijd = self::$oVariables->aExtentions[1];
$eindtijd = strtotime("+1 day", $begintijd);

$oRit->insertRitten($begintijd, $eindtijd);
