<!DOCTYPE html>
<html lang="fr-FR" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Fortool - Gagnez de l'argent en réalisant des missions rémunérées.</title>
    <meta name="description"
    content="Gagnez une multitude de récompenses, argents, bons d'achats et bien plus en quelques clics à travers différents moyens de rémunérations innovants (sondages, vidéos, offerwalls...) !">
    <meta name="keywords" content="fortool, money, rewards, surveys, videos, offerwalls">
    <meta name="author" content="Fortool Technologies">
    <link rel="icon" href="assets/images/favicon.ico" />
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/7a293f3dad.js" crossorigin="anonymous"></script>
    <!-- Animation -->
	<script src="https://code.createjs.com/createjs-2015.11.26.min.js"></script>
	<script src="animation_finale_v3.js"></script>
	<script src="assets/js/animation.js"></script>
</head>

<body onload="init();" class="t">
    <div class="rn">
        <header class="nb reveal-from-top">
            <div class="tcontainern">
                <div class="n_">
                    <div class="nk">
                        <h1 class="ot">
                            <a href="index.php">
                                <img src="assets/images/circleo.png" alt="Fortool" width="50" height="50">
                            </a>
                        </h1>
                    </div>
                        <button id="th" class="th" aria-controls="primary-menu" aria-expanded="false">
                            <span class="sn">Menu</span> 
                            <span class="tp">
                            <span class="td">
                            </span></span>
                        </button>
                    <nav id="nj" class="nj">
                        <div class="nq">
                            <ul class="sr h re">
                                <li>
                                    <a style="color: #F76700" href="index.php">Accueil</a>
                                </li>
                                <li>
                                    <a href="how-it-work.php">Comment ça marche</a>
                                </li>
                                <li>
                                    <a target="__blank" href="https://medium.com/@fortool">Blog</a>
                                </li>
                                <li>
                                    <a href="contact.php">Contact</a>
                                </li>
                            </ul>
                            <ul class="sr re">
                                <li>
                                    <a class="tbuttonn fbuttonl gbuttony gbuttony sbuttono" href="account/login.php">Se connecter</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <main class="nw">
            <section class="rb nx sq tillustration-section-n">
                <div class="rcontaineri">
                    <div class="rm rd">
                        <div class="rg">
                            <h1 class="on oj reveal-from-top" data-reveal-delay="150">Soyez récompensé en réalisant des missions !</h1>
                            <div class="scontainero">
                                <p class="ot uu reveal-from-top" data-reveal-delay="300">
                                    Gagnez de l'argent, des cartes cadeaux et bien plus en réalisant diverses missions gratuites de nos partenaires. C'est simple et rapide !
                                </p>
                                <div class="reveal-from-top" data-reveal-delay="450">
                                    <a class="tbuttonn fbuttonl" href="account/register.php">Commencer</a>
                                </div>
                            </div>
                        </div>
                        <div class="ry reveal-from-bottom" data-reveal-delay="600">
                            <div id="animation_container">
                                <canvas id="canvas"></canvas>
                                <div id="dom_overlay_container"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="ia nx reveal-fade">
                <div class="tcontainern">
                    <div class="if rd s_ sj">
                        <ul class="sr">
                            <li class="reveal-from-bottom">
                                <img src="assets/images/adinplay.png" alt="AdInPlay" width="150">
                            </li>
                            <li class="reveal-from-bottom" data-reveal-delay="150">
                                <img src="assets/images/adscend.png" alt="AdscendMedia" width="150"></li>
                            <li class="reveal-from-bottom" data-reveal-delay="300">
                                <img width="150" src="assets/images/wannads.webp" alt="Wannads">
                            </li>
                            <li class="reveal-from-bottom" data-reveal-delay="450">
                                <img src="assets/images/ot.png" width="150" alt="OfferToro">
                                </li>
                            <li class="reveal-from-bottom" data-reveal-delay="600">
                                <img src="assets/images/od.png" width="150" alt="OfferDaddy">
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="rx nx sq">
                <div class="tcontainern">
                    <div class="features-tabs-inner rd">
                        <div class="rv sq">
                            <div class="scontainero">
                                <h2 class="on oj">Conçu exclusivement pour vous !</h2>
                                <p class="ot">
                                    Avec son interface claire et intuitive. Nos multiples récompenses et missions à réaliser n'attendent que vous !
                                </p>
                            </div>
                        </div>
                        <div class="tabs">
                            <ul class="nn sr oi">
                                <li class="nr tb" role="tab" aria-controls="tab-a">
                                    <div class="ig ob">
                                        <img src="assets/images/eye-solid.svg" style="padding:10px;" alt="Tab icon 01" width="50" height="50">
                                    </div>
                                    <div class="sc l">Vue d'ensemble</div>
                                </li>
                                <li class="nr" role="tab" aria-controls="tab-b">
                                    <div class="ig ob">
                                        <img src="assets/images/coins-solid.svg" style="padding:10px;" alt="Tab icon 01" width="50" height="50">
                                    </div>
                                    <div class="sc l">Gagner des Fortcoins</div>
                                </li>
                                <li class="nr" role="tab" aria-controls="tab-c">
                                    <div class="ig ob">
                                        <img src="assets/images/hand-holding-usd-solid.svg" style="padding:10px;" alt="Tab icon 01" width="50" height="50">
                                    </div>
                                    <div class="sc l">Réclamer votre récompense</div>
                                </li>
                                <li class="nr" role="tab" aria-controls="tab-d">
                                    <div class="ig ob">
                                        <img src="assets/images/users-solid.svg" style="padding:10px;" alt="Tab icon 01" width="50" height="50">
                                    </div>
                                    <div class="sc l">Parrainer des amis</div>
                                </li>
                            </ul>
                            <div id="tab-a" class="ni" role="tabpanel">
                                <img class="id" src="assets/images/home.png" alt="Dashboard" width="896" height="504">
                            </div>
                            <div id="tab-b" class="ni" role="tabpanel">
                                <img class="id" src="assets/images/earn.png" alt="Earn" width="896" height="504">
                            </div>
                            <div id="tab-c" class="ni" role="tabpanel">
                                <img class="id" src="assets/images/shop.png" alt="Shop" width="896" height="504">
                            </div>
                            <div id="tab-d" class="ni" role="tabpanel">
                                <img class="id" src="assets/images/referrals.png" alt="Referrals" width="896" height="504">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="rw nx sq">
                <div class="tcontainern">
                    <div class="features-tiles-inner rd s_">
                        <div class="rv sq">
                            <div class="scontainero">
                                <h2 class="on oj">Fonctionnalités</h2>
                                <p class="ot">Découvrez l'ensemble des fonctionnalités de notre nouvelle plateforme ! Le choix t'appartient 😉</p>
                            </div>
                        </div>
                        <div class="tiles-wrap">
                            <div class="ng reveal-from-bottom" data-reveal-container=".tiles-wrap">
                                <div class="ny">
                                    <div class="features-tiles-item-header">
                                        <div class="im oj" style="padding: 30px;">
                                            <i class="fas fa-tasks fa-2x"></i>
                                        </div>
                                    </div>
                                    <div class="features-tiles-item-content">
                                        <h4 class="on od">Compléte des missions</h4>
                                        <p class="ot l">
                                            Installez et essayez de nouveaux jeux, 
                                            inscrivez-vous sur des sites partenaires ou essayez de nouveaux produits. Tout ceci gratuitement !
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="ng reveal-from-bottom" data-reveal-container=".tiles-wrap"
                                data-reveal-delay="100">
                                <div class="ny">
                                    <div class="features-tiles-item-header">
                                        <div class="im oj" style="padding: 30px;">
                                            <i class="fas fa-video fa-2x"></i>
                                        </div>
                                    </div>
                                    <div class="features-tiles-item-content">
                                        <h4 class="on od">Regarde des vidéos</h4>
                                        <p class="ot l">
                                            Découvrez de nouveaux créateurs en ligne 
                                            et soyez récompensé en visionnant leurs contenus !
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="ng reveal-from-bottom" data-reveal-container=".tiles-wrap"
                                data-reveal-delay="200">
                                <div class="ny">
                                    <div class="features-tiles-item-header">
                                        <div class="im oj" style="padding: 30px;">
                                            <i class="fas fa-poll fa-2x"></i>
                                        </div>
                                    </div>
                                    <div class="features-tiles-item-content">
                                        <h4 class="on od">Sondages remunérés</h4>
                                        <p class="ot l">
                                            Qualifiez-vous et complétez des sondages rémunérés en ligne 
                                            parmi de nombreux panels partenaires disponibles !
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="ng reveal-from-bottom" data-reveal-container=".tiles-wrap"
                                data-reveal-delay="300">
                                <div class="ny">
                                    <div class="features-tiles-item-header">
                                        <div class="im oj" style="padding: 30px;">
                                            <i class="fab fa-btc fa-2x"></i>
                                        </div>
                                    </div>
                                    <div class="features-tiles-item-content">
                                        <h4 class="on od">Mine</h4>
                                        <p class="ot l">
                                            Laissez votre PC fonctionner pour vous. 
                                            Gagnez des Fortcoins en fournissant la puissance de calcul de votre appareil.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="ng reveal-from-bottom" data-reveal-container=".tiles-wrap"
                                data-reveal-delay="400">
                                <div class="ny">
                                    <div class="features-tiles-item-header">
                                        <div class="im oj" style="padding: 30px;">
                                            <i class="fas fa-users fa-2x"></i>
                                        </div>
                                    </div>
                                    <div class="features-tiles-item-content">
                                        <h4 class="on od">Invite des amis</h4>
                                        <p class="ot l">
                                            Parrainer des amis à utiliser nos services 
                                            et gagnez <strong>jusqu'à 5%</strong> de leurs gains pour chaque mission que lui et vous réaliser !
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="ng reveal-from-bottom" data-reveal-container=".tiles-wrap"
                                data-reveal-delay="500">
                                <div class="ny">
                                    <div class="features-tiles-item-header">
                                        <div class="im oj" style="padding: 30px;">
                                            <i class="fas fa-gifts fa-2x"></i>
                                        </div>
                                    </div>
                                    <div class="features-tiles-item-content">
                                        <h4 class="on od">Réclame ta récompense</h4>
                                        <p class="ot l">
                                            Nous proposons une boutique complète, vous pourrez échanger ainsi vos Fortcoins
                                            contrent de l'argent, des cartes cadeaux ou encore en échange de criptomonnaies !
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer class="rr ft r">
            <div class="tcontainern">
                <div class="ri">
                    <div class="rs rh h">
                        <div class="nk">
                            <a href="index.php">
                                <img src="assets/images/Logo_complet_ft.svg" alt="Fortool" width="150" height="32">
                            </a>
                        </div>
                        <div class="rl">
                            <ul class="sr">
                                <li>
                                    <a href="https://discord.fortool.fr" target="__blank" style="text-decoration: none;">
                                        <i class="fab fa-discord"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="__blank" href="https://www.youtube.com/channel/UC5ppKq8W79oqn3mmpN8uWhA" style="text-decoration: none;">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://medium.com/@fortool" target="__blank" style="text-decoration: none;">
                                        <i class="fab fa-medium"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ro rh h rp">
                        <nav class="rc">
                            <ul class="sr">
                                <li><a href="terms/confidentiality.php">Confidentialité</a></li>
                                <li><a href="terms/cgu.php">Mentions légales & CGU</a></li>
                                <li><a href="faq.php">FAQ</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </nav>
                        <div class="footer-copyright">© 2020 Fortool, tous droits réservés.</div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="assets/js/main.min.js"></script>
</body>

</html>