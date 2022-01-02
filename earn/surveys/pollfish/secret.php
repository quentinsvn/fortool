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
    echo "Erreur de connexion: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }
  $secret_key = "API_KEY";
  $cpa = rawurldecode($_GET["cpa"]);
  $device_id = rawurldecode($_GET["device_id"]);
  $request_uuid = rawurldecode($_GET["request_uuid"]);
  $reward_name = rawurldecode($_GET["reward_name"]);
  $reward_value = rawurldecode($_GET["reward_value"]);
  $status = rawurldecode($_GET["status"]);
  $timestamp = rawurldecode($_GET["timestamp"]);
  $tx_id = rawurldecode($_GET["tx_id"]);
  $url_signature = rawurldecode($_GET["signature"]);

  $data = $cpa . ":" . $device_id;
  if (!empty($request_uuid)) { // only added when non-empty
    $data = $data . ":" . $request_uuid;
  }
  $data = $data . ":" . $reward_name . ":" . $reward_value . ":" . $status . ":" . $timestamp . ":" . $tx_id;

  $computed_signature = base64_encode(hash_hmac("sha1" , $data, $secret_key, true));
  $is_valid = $url_signature == $computed_signature;
  if($is_valid) {
    //then simply award the coins to your user
    $sql = "UPDATE ".MYSQL_TABLE." SET solde=solde+".$mysqli->real_escape_string($reward_value)." WHERE id = ".$mysqli->real_escape_string($device_id);
    $result = $mysqli->query($sql);
  } else {
    echo 'Erreur';
  }
?>