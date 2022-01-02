<?php
$your_app_key = "API_KEY";

define("MYSQL_HOST", "localhost");
define("MYSQL_PORT", "3306");
define("MYSQL_DB", "DBNAME");
define("MYSQL_TABLE", "TABLE");
define("MYSQL_USER", "USER");
define("MYSQL_PASS", "MDP");
$mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
if ($mysqli->connect_errno) 
{
  echo "Erreur de connexion: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
// Liste des variables envoyées

$transaction_id = urldecode($_GET["transaction_id"]);
$offer_id = urldecode($_GET["offer_id"]);
$offer_name = urldecode($_GET["offer_name"]);
$amount = urldecode($_GET["amount"]);
$virtual_currency = urldecode($_GET["virtual_currency"]); 
$userid = urldecode($_GET["userid"]);
$signature = urldecode($_GET["signature"]);
$payout = urldecode($_GET["payout"]);
$subid1 = urldecode($_GET["subid1"]);
$subid2 = urldecode($_GET["subid2"]);
$subid3 = urldecode($_GET["subid3"]);

// Vérificatrion de la signature
$my_signature = md5($transaction_id."/".$offer_id."/".$your_app_key);

if($my_signature != trim($signature)){
  // La signature de ne correspond pas
  echo "0";
  exit(0);
}

// MAJ du solde de l'utilisateur
$sql = "UPDATE ".MYSQL_TABLE." SET solde=solde+".$mysqli->real_escape_string($amount)." WHERE id = ".$mysqli->real_escape_string($userid);
$result = $mysqli->query($sql);
$ref = rand(1000000,9999999);
$activity = "INSERT INTO activity (ref, activity_date, pseudo, type, name, earning) VALUES ('FTACT$ref', now(), '$subid1', 'OfferWall', '$offer_name', '$amount')";
$result_activity = $mysqli->query($activity);

if($result){
  echo "1";
}else{
  echo "0";
}

exit(0);

?>