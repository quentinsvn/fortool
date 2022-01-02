<?php

    if(isset($_POST['confirm'])) {
        $code = htmlspecialchars($_POST['code']);
        $amount = htmlspecialchars($_POST['amount']);

        if(!empty($_POST['code']) AND !empty($_POST['amount'])) {
            $codelenght = strlen($code);
            if($codelenght <= 50) {
                $reqidgift = $bdd->prepare("SELECT * FROM gifts WHERE cle = ?");
                $reqidgift->execute(array($code));
                $giftidexist = $reqidgift->rowCount();
                if($giftidexist == 0) {
                    $insertmbr = $bdd->prepare("INSERT INTO gifts(creator, pseudo, cle, reward) VALUES (?,'Non défini',?,?)");
                    $insertmbr->execute(array($_SESSION['pseudo'], $code, $amount));
                    $message = '<div class="alert alert-success">
                                    <p><strong>Bien joué :D</strong> La récompense à bien été créer !</p>
                                </div>';
                    header('Location: index.php');
                } else {
                    $message = '<div class="alert alert-danger">
                                <p><strong>Erreur :(</strong> Le code existe déjà !</p>
                           </div>';
                }
            } else {
                $message = '<div class="alert alert-danger">
                                <p><strong>Erreur :(</strong> Le code est trop longs (50 caractères maximum) !</p>
                           </div>';
            }
        }
    }
