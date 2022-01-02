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
  echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
 
$oid = isset($_GET['oid']) ? $_GET['oid'] : null;
$o_name = isset($_GET['o_name']) ? $_GET['o_name'] : null;
$amount = isset($_GET['amount']) ? $_GET['amount'] : null;
$currency_name = isset($_GET['currency_name']) ? $_GET['currency_name'] : null;
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;
$sub1 = isset($_GET['subid1']) ? $_GET['subid1'] : null;
$sig = isset($_GET['sig']) ? $_GET['sig'] : null;
$payout = isset($_GET['payout']) ? $_GET['payout'] : null;
$ip_address = isset($_GET['ip_address']) ? $_GET['ip_address'] : "0.0.0.0";
 
$my_signature = md5($oid.'-'.$user_id.'-'.$your_app_key);
 
if($my_signature != trim($sig)){
  echo "0";
  exit(0);
}
 
$sql = "UPDATE ".MYSQL_TABLE." SET solde=solde+".$mysqli->real_escape_string($amount)." WHERE id = ".$mysqli->real_escape_string($user_id);
$result = $mysqli->query($sql);
$ref = rand(1000000,9999999);
$activity = "INSERT INTO activity (ref, activity_date, pseudo, type, name, earning) VALUES ('FTACT$ref', now(), '$sub1', 'OfferWall', '$o_name', '$amount')";
$result_activity = $mysqli->query($activity);
 
if($result){
  echo "1";
}else{
  echo "0";
}
 
exit(0);
 
?>