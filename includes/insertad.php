<?php
    session_start();
    include('config.php');
    $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    include('fortoolads.php');
?>