<?php
$dbHost     = "HOST";
$dbUsername = "USER";
$dbPassword = "MDP";
$dbName     = "DBNAME";

$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Erreur de connexion: " . $db->connect_error);
}
?>