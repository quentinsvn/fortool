<?php
    session_start();
    include('config.php');
    $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    $ads = $bdd->query("SELECT date, identifiant, SUM(points) FROM fortool_ads WHERE identifiant = '$identifiant'");
    while($a = $ads->fetch()){
        if($user['identifiant'] == $a['identifiant']) {
            echo $a['SUM(points)'];
        }
    }
    echo $user['points'];
?>