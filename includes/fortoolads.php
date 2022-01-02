<?php
    $pseudo = $user['pseudo'];
    $ref = rand(1000000,9999999);
    $insertactivity = $bdd->prepare("INSERT INTO activity(ref,activity_date, pseudo, type, name, earnings) VALUES ('FTACT$ref',now(),'$pseudo','Fortool Ads','Récompense quotidienne','1')");
    $insertactivity->execute();
    $insertpoints = $bdd->prepare("UPDATE users SET solde = solde + 1 WHERE id = ?");
    $insertpoints->execute(array($_SESSION['id']));
?>