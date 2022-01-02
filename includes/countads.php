<?php
    session_start();
    include('config.php');
    $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    $identifiant = $user['identifiant'];
    $ads = $bdd->query("SELECT date, identifiant, SUM(points) FROM fortool_ads WHERE identifiant = '$identifiant'");
    $res = $bdd->query("SELECT count(*) as nb FROM fortool_ads WHERE identifiant = '$identifiant'");
    $data = $res->fetch();
    $nb = $data['nb'];
    echo $nb;
?>