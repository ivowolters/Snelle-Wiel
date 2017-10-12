<?php
ini_set("display_errors", 1);

require_once('../mpluskassa/Mplusqapiclient.php');

include_once "../template-2017/inc/set_mpluskassa_inc.php";

$articleNumbers = array(); // specificy which articles to retrieve
$groupNumbers = array(); // specificy which groups to retrieve
$pluNumbers = array(); // specificy which PLU numbers to retrieve
$changedSinceTimestamp = null;
$changedSinceBranchNumber = null;
$syncMarker = 0; // syncMarker is a better way of synchronizing than changedSinceTimestamp/BranchNumber

echo "hallo";
// Then we call the getProducts() function wrapped in a try/catch block to intercept any exceptions.
try {
    if (false !== ($products = $mplusqapiclient->getProducts($articleNumbers, $groupNumbers, $pluNumbers, $changedSinceTimestamp, $changedSinceBranchNumber, $syncMarker))) {
        // Success, we show the amount of found products
        exit(sprintf('Found %d products.', count($products)));
    } else {
        exit('Failure while getting products.');
    }
}
catch (MplusQAPIException $e) {
    exit($e->getMessage());
}