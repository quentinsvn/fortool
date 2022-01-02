<?php
    if(isset($_POST['confirm'])) {
        $mdp = sha1($_POST['mdp']);
        $mdpconfirm = sha1($_POST['mdpconfirm']);

        if(!empty($_POST['mdp']) AND !empty($_POST['mdpconfirm'])) {
            if($mdp === $mdpconfirm) {
                $insertmdp = $bdd->prepare("UPDATE users SET mdp = ? WHERE id = ?");
                $insertmdp->execute(array($mdp, $_SESSION['id']));
                header('Location: security.php');
            }
        }
    }

?>