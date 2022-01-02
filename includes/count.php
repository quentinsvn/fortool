<?php
    session_start();
    include('config.php');
    $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    include('tipeeestream_v2.php');
    echo $user['solde'];
?>