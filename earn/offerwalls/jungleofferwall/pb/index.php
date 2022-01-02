<?php
$adscendIp = "SERVER_IP"; 

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



if($_SERVER['REMOTE_ADDR'] != $adscendIp)
{
  die("Access Denied!");
}

  $sub1 = isset($_GET['user_id']) ? $_GET['user_id'] : null;
  $payout = isset($_GET['pay']) ? $_GET['pay'] : null;


  echo "1";
  $sql = "UPDATE ".MYSQL_TABLE." SET solde=solde+".$mysqli->real_escape_string($payout)." WHERE id = ".$mysqli->real_escape_string($sub1);
  $result = $mysqli->query($sql);
  $ref = rand(1000000,9999999);
  $activity = "INSERT INTO activity (ref, activity_date, pseudo, type, name, earning, status) VALUES ('FTACT$ref', now(), '$sub1', 'OfferWall', 'Quizz', '$payout', '1')";
  $result_activity = $mysqli->query($activity);
  if($result){
    echo "1";
  }else{
    echo "0";
  }


?>