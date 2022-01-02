<?php

define("MYSQL_HOST", "localhost");
define("MYSQL_PORT", "3306");
define("MYSQL_DB", "DBNAME");
define("MYSQL_TABLE", "TABLE");
define("MYSQL_USER", "USER");
define("MYSQL_PASS", "MDP");
$mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
if ($mysqli->connect_errno) 
{
  echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$adslot_id = isset($_GET['adslot_id']) ? $_GET['adslot_id'] : null;
$external_identifier = isset($_GET['uid']) ? $_GET['uid'] : null;
$currency_amount = isset($_GET['currency_amount']) ? $_GET['currency_amount'] : null;
$payout_usd = isset($_GET['payout_usd']) ? $_GET['payout_usd'] : null;
 
$params = array('adslot_id' => $adslot_id,
                'external_identifier' => $external_identifier,
                'currency_amount' => $currency_amount,
                'payout_usd' => $payout_usd);

ksort($_REQUEST, SORT_STRING);
$sortedQueryString = http_build_query($params, '', '&');
$securityHash = hash_hmac('sha256', $sortedQueryString, 'SECRET_KEY');
if($_SERVER['HTTP_X_AYETSTUDIOS_SECURITY_HASH']===$securityHash) {
    $sql = "UPDATE ".MYSQL_TABLE." SET solde=solde+".$mysqli->real_escape_string($currency_amount)." WHERE id = ".$mysqli->real_escape_string($external_identifier);
    $result = $mysqli->query($sql);

    if($result){
    echo "1";
    }else{
    echo "0";
    }

    exit(0);
}
else {
    echo "erreur !";
}  

?>