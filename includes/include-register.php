<?php

    if(isset($_GET['ref']) AND !empty($_GET['ref'])) {
        $parrain_uniqid = htmlspecialchars($_GET['ref']);
        $req_parrain = $bdd->prepare('SELECT id FROM users WHERE uniqid = ?');
        $req_parrain->execute(array($parrain_uniqid));
        $parrain_exist = $req_parrain->rowCount();
        if($parrain_exist == 1) {
            $id_parrain = $req_parrain->fetch();
            $id_parrain = $id_parrain['id'];
        }
    }

    if(isset($_POST['inscription'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mail = htmlspecialchars($_POST['email']);
        $mdp = sha1($_POST['password']);


        if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['password'])) {
            if(isset($_POST["cgu"])) { 
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
                    if(isset($_POST['news'])) {
                        $news = 1;
                    } else {
                        $news = 0;
                    }
                    if($idexist == 0) {
                        $insertmbr = $bdd->prepare("INSERT INTO users(uniqid, id_parrain, date_inscription, ip, pseudo,mdp,email,newsletter) VALUES (?,?,now(),'$ip',?,?,?,'$news')");
                        if(isset($id_parrain) AND !empty($id_parrain)) {
                            $insertmbr->execute(array(uniqid(), $id_parrain, $pseudo, $mdp, $mail));
                        } else {
                            $insertmbr->execute(array(uniqid(),'',$pseudo, $mdp, $mail));
                        }                      
                        $message = "<div style='text-align: center;color: green;' class='alert alert-success' >Votre compte a bien été créer !</div>";
                        header('Location: login.php');
                    } else {
                        $message = "<div style='text-align: center;color:red;' class='alert alert-danger'>Le pseudo est déjà utilisée !</div>";
                    } 
                } else {
                    $message = "<div style='text-align: center;color:red;' class='alert alert-danger'>Adresse email déjà utilisée !</div>";
                }
            } else {
                    $message = "<div style='text-align: center;color:red;' class='alert alert-danger'>Adresse email déjà utilisée !</div>";
                }
            } else {
                $message = "<div style='text-align: center;color:red;' class='alert alert-danger'>Votre pseudo ne doit pas dépasser 255 caractères !</div>";
            }
        } else {
            $message = "<div style='text-align: center;color:red;' class='alert alert-danger'>Vous devez accepter les CGU !</div>";
        }
        } else {
            $message = "<div style='text-align: center;color:red;' class='alert alert-warning'>Tous les champs doivent être complétés !</div>";
        }
    }
?>