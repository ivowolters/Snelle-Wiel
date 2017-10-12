<?php
$mplusqapiclient = new Mplusqapiclient();
$mplusqapiclient->setApiServer("https://api.mpluskassa.nl");
$mplusqapiclient->setApiPort("50223");
$mplusqapiclient->setApiFingerprint("58e031b6089646cb3de5a29b428a4d83c1310877");
$mplusqapiclient->setApiIdent("webdesign_wolters");
$mplusqapiclient->setApiSecret("JSgRkFAqFRqz");

try {
    $mplusqapiclient->initClient();
} catch (MplusQAPIException $e) {
    exit($e->getMessage());
}

try {
    $api_version = $mplusqapiclient->getApiVersion();
    echo sprintf('Current API version: %d.%d.%d',
        $api_version['majorNumber'],
        $api_version['minorNumber'],
        $api_version['revisionNumber']);
} catch (MplusQAPIException $e) {
    exit($e->getMessage());
}