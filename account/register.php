<?php
ini_set('display_errors','off');
session_start();
include('../includes/config.php');
include('../includes/include-register.php');
if(isset($_GET['email'])) {
    $email = htmlspecialchars($_GET['email']);
}
if(isset($_GET['pseudo'])) {
    $pseudo = htmlspecialchars($_GET['pseudo']);
}
if(isset($_SESSION['id'])) {
    header('Location: ../home.php');
}
?>
<!DOCTYPE html>
<html lang="fr-FR" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Fortool</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon" href="../assets/images/favicon.ico" />
</head>

<body>
    <div class="rn">
        <header class="nb">
            <div class="tcontainern">
                <div class="n_">
                    <div class="nk">
                        <h1 class="ot">
                            <a href="../index.php">
                                <img src="../assets/images/circleo.png" alt="Fortool" width="50" height="50">
                            </a>
                        </h1>
                    </div>
                </div>
            </div>
        </header>
        <main class="nw">
            <section class="il nx tillustration-section-n">
                <div class="scontainero">
                    <div class="signin-inner rd">
                        <div class="rv sq">
                            <h1 class="ot">Créer un compte</h1>
                            <?php 
                                if(isset($message)) {
                                    echo $message;
                                }
                            ?>
                        </div>
                        <div class="tiles-wrap">
                            <div class="ng">
                                <div class="ny">
                                    <form method="post" name="signup">
                                        <fieldset>
                                            <div class="ob">
                                                <label class="x sn" for="pseudo">Pseudo</label> 
                                                <input id="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" name="pseudo" class="j" type="name" placeholder="Pseudo" required="">
                                            </div>
                                            <div class="ob">
                                                <label class="x sn" for="email">Adresse e-mail</label> 
                                                <input id="email" value="<?php if(isset($email)) { echo $email; } ?>" name="email" class="j" type="email" placeholder="Adresse e-mail" required="">
                                            </div>
                                            <div class="ob">
                                                <label class="x sn" for="password">Mot de passe</label> 
                                                <input id="password" name="password" class="j" type="password" placeholder="Mot de passe" required="">
                                            </div>
                                            <div class="ob">
                                                <label class="z">
                                                    <input name="cgu" type="checkbox" id="remember">J'accepte les <a href="../terms/cgu.php">CGU</a> 
                                                </label>
                                            </div>
                                            <div class="ob">
                                                <label class="z">
                                                    <input name="news" type="checkbox" id="remember">Je souhaite recevoir les nouveautés de la plateforme par mail (facultatif)</a> 
                                                </label>
                                            </div>
                                            
                                            <div class="ue uu">
                                                <button type="submit" name="inscription" class="tbuttonn fbuttonl pbuttond">S'inscrire</button>
                                            </div>
                                        </fieldset>
                                    </form>
                                    <div class="signin-bottom s_">
                                        <div class="ap c sq sp">Vous avez déjà un compte ? 
                                            <a class="p" href="login.php">Me connecter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>