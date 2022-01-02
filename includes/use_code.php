<?php

    if(isset($_POST['confirm'])) {
        $code = htmlspecialchars($_POST['code']);
        $ref = rand(1000000,9999999);
        if(!empty($_POST['code'])) {
            $reponse = $bdd->prepare('SELECT * FROM gifts WHERE cle = :code');
            $reponse->bindParam(':code', $_POST['code']); // Utilisation de bindParam() pour plus de sécurité
            $reponse->execute();
            $objets = $reponse->fetchAll(); // On récupère tous les objets s'il en existe, sinon false
            $reponse->closeCursor();
            if($objets) {
                foreach($objets as $objet){
                    $amount = $objet['reward'];
                    $id = $objet['id'];
                    $used = $objet['used'];
                }
                if($used == 0) {
                    $update = $bdd->prepare('UPDATE users SET solde = solde + ? WHERE id = ?');
                    $update->execute(array($amount, $_SESSION['id']));

                    $update_g = $bdd->prepare('UPDATE gifts SET pseudo = ?, used = 1 WHERE id = ?');
                    $update_g->execute(array($_SESSION['pseudo'], $id));

                    $insertact = $bdd->prepare("INSERT INTO activity(ref, pseudo, type, name, earning, status) VALUES ('FTACT$ref',?,?,?,?,'1')");
                    $insertact->execute(array($_SESSION['pseudo'], 'Code de récompense', 'Récompense live Twitch', $amount));
                    $message = '<div class="alert alert-success">
                                    <p><strong>Bien joué :D</strong> La récompense à bien été ajouté à votre compte !</p>
                                </div>';
                    header('Location: ../index.php');
                } else {
                    $message = '<div class="alert alert-danger">
                    <p><strong>Erreur :(</strong> Ce code à déjà était utilisé !</p>
                    </div>';
                    }
                } else {
                $message = '<div class="alert alert-danger">
                <p><strong>Erreur :(</strong> Ce code n\'existe pas !</p>
                </div>';
            }
        } else {
            $message = '<div class="alert alert-danger">
            <p><strong>Erreur :(</strong> Vous n\'avez pas rentrez de code !</p>
            </div>';
        }
    }

?>