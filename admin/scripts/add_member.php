<?php

    if(isset($_POST['confirm'])) {
        $identifiant = rand(00001, 99999);
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
        $mail = htmlspecialchars($_POST['email']);
        $tel = htmlspecialchars($_POST['tel']);
        $mdp = sha1($_POST['mdp']);
        $mdpconfirm = sha1($_POST['mdpconfirm']);

        if(!empty($_POST['pseudo']) AND !empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['email']) AND !empty($_POST['mdp']) AND !empty($_POST['mdpconfirm'])) {
            $pseudolength = strlen($pseudo);
            if($pseudolength <= 255) {
                if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $reqidmail = $bdd->prepare("SELECT * FROM users WHERE email = ?");
                    $reqidmail->execute(array($mail));
                    $mailidexist = $reqidmail->rowCount();
                    if($mailidexist == 0) {
                        $reqid = $bdd->prepare("SELECT * FROM users WHERE pseudo = ?");
                        $reqid->execute(array($pseudo));
                        $idexist = $reqid->rowCount();
                        if($idexist == 0) {
                            if($mdp == $mdpconfirm) {
                                $staff = htmlspecialchars($_POST['staff']);
                                $admin = htmlspecialchars($_POST['admin']);
                                $newsletter = htmlspecialchars($_POST['newsletter']);
                                $mailconfirm = htmlspecialchars($_POST['confirm_mail']);
                                $insertmbr = $bdd->prepare("INSERT INTO users(uniqid, date_inscription, prenom, nom, pseudo,mdp,email,tel,newsletter,staff,admin) VALUES (?,now(),?,?,?,?,?,?,?,?,?)");
                                $insertmbr->execute(array(uniqid(),$prenom, $nom, $pseudo, $mdp, $mail, $tel,$newsletter,$staff,$admin));
                                $message = '<div class="alert alert-success">
                                                <p><strong>Bien joué :D</strong> Le compte à bien été créer avec succès !</p>
                                            </div>';
                                header('Location: index.php');
                            } else {
                                $message = '<div class="alert alert-danger">
                                                <p><strong>Erreur :(</strong> Les mots de passes ne correspondent pas !</p>
                                            </div>';
                            }                 
                        } else {
                            $message = '<div class="alert alert-danger">
                                            <p><strong>Erreur :(</strong> Identifiant déjà utilisé !</p>
                                        </div>';
                        }
                    } else {
                        $message = '<div class="alert alert-danger">
                                        <p><strong>Erreur :(</strong> Adresse e-mail déjà utilisé !</p>
                                    </div>';
                    }
                } else {
                    $message = '<div class="alert alert-danger">
                                        <p><strong>Erreur :(</strong> Adresse e-mail incorrecte !</p>
                                    </div>';
                }
            } else {
                $message = '<div class="alert alert-danger">
                                <p><strong>Erreur :(</strong> Identifiant trop longs !</p>
                            </div>';
            }
        } else {
            $message = '<div class="alert alert-danger">
                            <p><strong>Erreur :(</strong> Tous les champs doivent être complétés !</p>
                        </div>';
        }

    }


?>