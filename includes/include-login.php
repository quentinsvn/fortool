<?php
    if(isset($_POST['login'])) {
        $id = htmlspecialchars($_POST['usernameEmail']);
        $password = sha1($_POST['password']);
        if(!empty($id) AND !empty($password)) {
            $requser = $bdd->prepare("SELECT * FROM users WHERE email = ? AND mdp = ?");
            $requser->execute(array($id,$password));
            $userexist = $requser->rowCount();
            if ($userexist == 1) {
                $userinfo = $requser->fetch();
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['pseudo'] = $userinfo['pseudo'];
                $_SESSION['email'] = $userinfo['email'];
                $updatelogin = $bdd->prepare("UPDATE users SET date_connexion = now() WHERE id = ?");
                $updatelogin->execute(array($_SESSION['id']));
                header("Location: ../home.php");
            }
            else {
                $message = "<div style='text-align: center; color: red;' class='alert alert-danger'>Identifiants incorrects !</div>";
            }
        }
        else {
            $message = "<div style='text-align: center; color: red;' class='alert alert-danger'>Tous les champs doivent être complétés !</div>";
        } 
    }

?>