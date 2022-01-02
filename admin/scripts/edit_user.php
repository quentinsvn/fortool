<?php
        ini_set('display_errors','off');
        require('../../includes/discord.php');
        $mode_edition = 0;
        if(isset($_GET['edit']) AND !empty($_GET['edit'])) {
            $mode_edition = 1;
            $edit_id = htmlspecialchars($_GET['edit']);
            $edit = $bdd->prepare('SELECT * FROM users WHERE id = ?');
            $edit->execute(array($edit_id));
            if($edit->rowCount() == 1) {
                $edit = $edit->fetch();
            } else {
                die('Erreur : l\'utilisateur n\'existe pas...');
            }
        }
        
        if($mode_edition == 1) {
            if(isset($_POST['confirm'])) {
                        $pseudo = htmlspecialchars($_POST['pseudo']);
                        $prenom = htmlspecialchars($_POST['prenom']);
                        $nom = htmlspecialchars($_POST['nom']);
                        $email = htmlspecialchars($_POST['email']);
                        $tel = htmlspecialchars($_POST['tel']);
                        $solde = htmlspecialchars($_POST['solde']);
                            if(!empty($_POST["newsletter"])) { 
                                $newsletter = 1;
                            } else {
                                $newsletter = 0;
                            }
                            if(!empty($_POST["staff"])) { 
                                $staff = 1;
                            } else {
                                $staff = 0;
                            }
                            if(!empty($_POST["admin"])) { 
                                $admin = 1;
                            } else {
                                $admin = 0;
                            }
                            if(!empty($_POST["suspended"])) { 
                                $suspended = 1;
                            } else {
                                $suspended = 0;
                            }
                            $reqid = $bdd->prepare("SELECT * FROM users WHERE pseudo = ?");
                            $reqid->execute(array($pseudo));
                            $idexist = $reqid->rowCount();
                            if($idexist == 0 || $pseudo === $edit['pseudo']) {
                                $update = $bdd->prepare('UPDATE users SET date_modification = now(), prenom = ?, nom = ?, pseudo = ?, email = ?, tel = ?, solde = ?, newsletter = ?, staff = ?, suspended = ?, admin = ? WHERE id = ?');
                                $update->execute(array($prenom, $nom, $pseudo, $email, $tel, $solde, $newsletter, $staff, $suspended, $admin, $edit_id));
                                $message = '<div class="alert alert-success">Votre utilisateur a bien été mis à jour !</div>';
                                header("Refresh:1; url=index.php");
                            } else {
                                $message = '<div class="alert alert-danger">L\'identifiant existe déjà !</div>';
                            }
                        }
                    }
?>