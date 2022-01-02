<?php
$adscendIp = "SERVER_IP"; // ip for adsc

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



if($_SERVER['REMOTE_ADDR'] != $adscendIp)
{
die("Access restreint!");
}



$offerid = isset($_GET['offerid']) ? $_GET['offerid'] : null;
$sub1 = isset($_GET['sub1']) ? $_GET['sub1'] : null;
$amount = isset($_GET['amount']) ? $_GET['amount'] : null;
$status = isset($_GET['status']) ? $_GET['status'] : 0;
$name = isset($_GET['name']) ? $_GET['name'] : null;
$ip = isset($_GET['ip']) ? $_GET['ip'] : '0.0.0.0';

if($status == "1")
{
  $sql = "UPDATE ".MYSQL_TABLE." SET solde=solde+".$mysqli->real_escape_string($amount)." WHERE id = ".$mysqli->real_escape_string($sub1);
  $result = $mysqli->query($sql);
  if($result){
    echo "1";
  }else{
    echo "0";
  }
}
else
{
die("Erreur!");
}
?>