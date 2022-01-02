<?php
    if (!empty($_POST['pseudo'])) {
        if(isset($_POST['pseudo']) AND !empty($_POST['pseudo']) AND $_POST['pseudo'] != $user['pseudo']) {
                if(strlen($_POST['pseudo']) < 25) {
                    $pseudo = htmlspecialchars($_POST['pseudo']);
                    $reqid = $bdd->prepare("SELECT * FROM users WHERE pseudo = ?");
                    $reqid->execute(array($pseudo));
                    $idexist = $reqid->rowCount();
            if($idexist == 0 || $pseudo === $user['pseudo']) {
                $insertpseudo = $bdd->prepare("UPDATE users SET pseudo = ? WHERE id = ?");
                $insertpseudo->execute(array($pseudo, $_SESSION['id']));
                header('Location: index.php');
            } else {
                $message = '<div class="alert bg-danger alert-icon-left alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                Ce pseudo est déjà pris :(
            </div>';
            }
            } else {
                $message = '<div class="alert bg-danger alert-icon-left alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                Votre pseudo ne doit pas excéder 25 caractères!
            </div>';
            }
    }
}

    if(isset($_POST['prenom']) AND !empty($_POST['prenom']) AND $_POST['prenom'] != $user['prenom']) {
        $prenom = htmlspecialchars($_POST['prenom']);
        $insertprenom = $bdd->prepare("UPDATE users SET prenom = ? WHERE id = ?");
        $insertprenom->execute(array($prenom, $_SESSION['id']));
        header('Location: index.php');
    }
    if(isset($_POST['nom']) AND !empty($_POST['nom']) AND $_POST['nom'] != $user['nom']) {
        $name = htmlspecialchars($_POST['nom']);
        $insertname = $bdd->prepare("UPDATE users SET nom = ? WHERE id = ?");
        $insertname->execute(array($name, $_SESSION['id']));
        header('Location: index.php');
    }
    if(isset($_POST['email']) AND !empty($_POST['email']) AND $_POST['email'] != $user['email']) {
        $mail = htmlspecialchars($_POST['email']);
        $insertmail = $bdd->prepare("UPDATE users SET email = ? WHERE id = ?");
        $insertmail->execute(array($mail, $_SESSION['id']));
        header('Location: index.php');
    }
    if(isset($_POST['pays']) AND !empty($_POST['pays']) AND $_POST['pays'] != $user['pays']) {
        $pays = htmlspecialchars($_POST['pays']);
        $insertpays = $bdd->prepare("UPDATE users SET pays = ? WHERE id = ?");
        $insertpays->execute(array($pays, $_SESSION['id']));
        header('Location: index.php');
    }
    if(isset($_POST['tel']) AND !empty($_POST['tel']) AND $_POST['tel'] != $user['tel']) {
        $tel = htmlspecialchars($_POST['tel']);
        $inserttel = $bdd->prepare("UPDATE users SET tel = ? WHERE id = ?");
        $inserttel->execute(array($tel, $_SESSION['id']));
        header('Location: index.php');
    }

    if(isset($_POST['confirm_mdp'])) {
        $mdp = sha1($_POST['mdp']);
        $mdpconfirm = sha1($_POST['mdpconfirm']);

            if(!empty($_POST['mdp']) AND !empty($_POST['mdpconfirm'])) {
                if($mdp === $mdpconfirm) {
                    $insertmdp = $bdd->prepare("UPDATE users SET mdp = ? WHERE id = ?");
                    $insertmdp->execute(array($mdp, $_SESSION['id']));
                    header('Location: index.php');
                }
                else {
                    $message = '<div class="alert bg-danger alert-icon-left alert-dismissible mb-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        Vos mots de passes ne correspondent pas !
                    </div>';
                }
            }
            else {
                $message = '<div class="alert bg-danger alert-icon-left alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    Tous les champs doivent être remplis !
                </div>';
            }
        }

        if(isset($_POST['paypal']) AND !empty($_POST['paypal']) AND $_POST['paypal'] != $user['paypal']) {
            $paypal = htmlspecialchars($_POST['paypal']);
            $insertpaypal = $bdd->prepare("UPDATE users SET paypal = ? WHERE id = ?");
            $insertpaypal->execute(array($paypal, $_SESSION['id']));
            header('Location: index.php');
        }

        if(isset($_POST['btc']) AND !empty($_POST['btc']) AND $_POST['btc'] != $user['btc']) {
            $btc = htmlspecialchars($_POST['btc']);
            $insertbtc = $bdd->prepare("UPDATE users SET btc = ? WHERE id = ?");
            $insertbtc->execute(array($btc, $_SESSION['id']));
            header('Location: index.php');
        }

        if(isset($_POST['eth']) AND !empty($_POST['eth']) AND $_POST['eth'] != $user['eth']) {
            $eth = htmlspecialchars($_POST['eth']);
            $inserteth = $bdd->prepare("UPDATE users SET eth = ? WHERE id = ?");
            $inserteth->execute(array($eth, $_SESSION['id']));
            header('Location: index.php');
        }

        if(isset($_POST['twitter']) AND !empty($_POST['twitter']) AND $_POST['twitter'] != $user['twitter']) {
            $twitter = htmlspecialchars($_POST['twitter']);
            $inserttwitter = $bdd->prepare("UPDATE users SET twitter = ? WHERE id = ?");
            $inserttwitter->execute(array($twitter, $_SESSION['id']));
            header('Location: index.php');
        }

        if(isset($_POST['discord']) AND !empty($_POST['discord']) AND $_POST['discord'] != $user['discord']) {
            $discord = htmlspecialchars($_POST['discord']);
            $insertdiscord = $bdd->prepare("UPDATE users SET discord = ? WHERE id = ?");
            $insertdiscord->execute(array($discord, $_SESSION['id']));
            header('Location: index.php');
        }

        if(isset($_POST['id_discord']) AND !empty($_POST['id_discord']) AND $_POST['id_discord'] != $user['id_discord']) {
            $id_discord = htmlspecialchars($_POST['id_discord']);
            $insertdiscord_id = $bdd->prepare("UPDATE users SET id_discord = ? WHERE id = ?");
            $insertdiscord_id->execute(array($id_discord, $_SESSION['id']));
            header('Location: index.php');
        }

        if(isset($_POST['ytb']) AND !empty($_POST['ytb']) AND $_POST['ytb'] != $user['ytb']) {
            $ytb = htmlspecialchars($_POST['ytb']);
            $insertytb = $bdd->prepare("UPDATE users SET ytb = ? WHERE id = ?");
            $insertytb->execute(array($ytb, $_SESSION['id']));
            header('Location: index.php');
        }

?>