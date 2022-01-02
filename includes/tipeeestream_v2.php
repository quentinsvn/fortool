<?php
    $sql = "SELECT pseudo FROM tipeeestream_v2";
    $result = $bdd->query($sql);
    $pseudo = $user['pseudo'];
    while($row = $result->fetch()) {
        if($row['pseudo'] == $user['pseudo']) {
            $insertprenom = $bdd->prepare("UPDATE users SET solde = solde + 3 WHERE id = ?");
            $insertprenom->execute(array($_SESSION['id']));
            $dlt = "DELETE FROM tipeeestream_v2 WHERE pseudo='$pseudo'";
            $bdd->exec($dlt);
        }
    }
?>