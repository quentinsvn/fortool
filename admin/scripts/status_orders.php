<?php
    if(isset($_POST['pending'])) {
        $updateord = $bdd->prepare('UPDATE orders SET status = 0 WHERE id = ?');
        $updateord->execute(array($_SESSION['id']));
        header('Location: index.php');
    }
    if(isset($_POST['send'])) {
        $updateord = $bdd->prepare('UPDATE orders SET status = 1 WHERE id = ?');
        $updateord->execute(array($_SESSION['id']));
        header('Location: index.php');
    }
    if(isset($_POST['refuse'])) {
        $updateord = $bdd->prepare('UPDATE orders SET status = 2 WHERE id = ?');
        $updateord->execute(array($_SESSION['id']));
        header('Location: index.php');
    }
?>