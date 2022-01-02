<?php
session_start();
include('../includes/config.php');
include('../includes/include-login.php');
if (isset($_SESSION['id'])) {
	header("Location: ../home.php");
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
                            <h1 class="ot">Connexion</h1>
                        </div>
                        <div class="tiles-wrap">
                            <div class="ng">
                                <div class="ny">
                                    <form name="login" method="post">
                                        <fieldset>
                                                <?php
                                                    if (isset($message)) {
                                                        echo $message;
                                                    }
                                                ?>
                                                <div class="ob"> 
                                                    <label class="x sn" for="email">Adresse e-mail</label> 
                                                    <input id="email" name="usernameEmail" class="j" type="email" placeholder="Adresse e-mail" required="">
                                                </div>
                                                <div class="ob">
                                                    <label class="x sn" for="password">Mot de passe</label> 
                                                    <input id="password" name="password" class="j" type="password" placeholder="Mot de passe" required="">
                                                </div>
                                                <div class="ue uu">
                                                    <button type="submit" name="login" class="tbuttonn fbuttonl pbuttond">Se connecter</button>
                                                </div>
                                                <div class="ic uu">
                                                    <label class="z">
                                                        <input type="checkbox" id="remember">Se souvenir de moi
                                                    </label>
                                                    <!-- 
                                                    <a class="p c" href="#">
                                                        Mot de passe oublié ?
                                                    </a>
                                                    -->
                                                </div>
                                        </fieldset>
                                    </form>
                                    <div class="signin-bottom s_">
                                        <div class="ap c sq sp">Pas encore de compte ? 
                                            <a class="p"  href="register.php">
                                                Inscrivez-vous !
                                            </a>
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