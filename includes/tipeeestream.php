<?php
    $sql = "SELECT * FROM tipeeestream_v2";
    $result = $bdd->query($sql);
    $pseudo = $user['identifiant'];
    while($row = $result->fetch()) {
        if($row['pseudo'] == $user['identifiant']) {
            $insertprenom = $bdd->prepare("UPDATE users SET solde = solde + 10 WHERE id = ?");
            $insertprenom->execute(array($_SESSION['id']));
            $dlt = "DELETE FROM tipeeestream_v2 WHERE pseudo='$pseudo'";
            $bdd->exec($dlt);
        }
    }
?>