<?php
    session_start();
    require('../includes/config.php');
    if(isset($_SESSION['id'])) {
        $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
        $requser->execute(array($_SESSION['id']));
        $user = $requser->fetch();
?>
<!DOCTYPE html>
<html class="loading" lang="fr" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description"
    content="Gagnez une multitude de récompenses, argents, bons d'achats et bien plus en quelques clics à travers différents moyens de rémunérations innovants (sondages, vidéos, offerwalls...) !">
  <meta name="keywords" content="fortool, money, rewards, surveys, videos">
  <meta name="author" content="Fortool Technologies">
  <title>Fortool</title>
  <link rel="apple-touch-icon" href="../app-assets/images/ico/circleo.png">
  <link rel="shortcut icon" type="image/x-icon" href="../app-assets/images/ico/favicon.ico">
  <link
    href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
    rel="stylesheet">

  <!-- BEGIN: Vendor CSS-->
  <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/vendors.min.css">
  <!-- END: Vendor CSS-->

  <!-- BEGIN: Theme CSS-->
  <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap-extended.min.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/colors.min.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/components.min.css">
  <!-- END: Theme CSS-->

  <!-- BEGIN: Page CSS-->
  <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/horizontal-menu.min.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/core/colors/palette-gradient.min.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/fonts/simple-line-icons/style.min.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/card-statistics.min.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/vertical-timeline.min.css">
  <!-- END: Page CSS-->

  <!-- BEGIN: FAI -->
  <script src="https://kit.fontawesome.com/7a293f3dad.js" crossorigin="anonymous"></script>
  <!-- END: FAI -->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  " data-open="hover" data-menu="horizontal-menu"
  data-col="2-columns">

  <!-- BEGIN: Header-->
  <nav
    class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-static-top navbar-dark bg-gradient-x-grey-blue navbar-border navbar-brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto">
            <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
              <i class="fas fa-2x fa-bars"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand" href="../home.php">
              <img class="brand-logo" width="120" src="../app-assets/images/logo/new_logo.png">
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile">
              <i class="fa fa-ellipsis-v"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block">
              <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                <i class="fas fa-bars"></i>
              </a>
            </li>
            <li class="nav-item d-none d-md-block">
              <a class="nav-link nav-link-expand" href="#">
                <i class="fas fa-expand"></i>
              </a>
            </li>
          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="nav-item">
              <a class="nav-link">
                <img width="20" src="../app-assets/images/logo/circleo.png">&nbsp;&nbsp;
                <span style="font-weight: bold;"><?php echo $user['solde']; ?> FT</span>
              </a>
            </li>
            <li class="dropdown dropdown-notification nav-item">
              <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                <i class="fas fa-bell"></i>
                <span class="badge badge-pill badge-danger badge-up">1</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <h6 class="dropdown-header m-0">
                    <span class="grey darken-2">Notifications</span>
                    <span class="notification-tag badge badge-danger float-right m-0">1 Notification</span>
                  </h6>
                </li>
                <li class="scrollable-container media-list">
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left align-self-center">
                        <i class="fas fa-star icon-bg-circle bg-cyan"></i>
                      </div>
                      <div class="media-body">
                        <h6 class="media-heading">Bienvenue !</h6>
                        <p class="notification-text font-small-3 text-muted">
                          Bienvenue sur la nouvelle version de Fortool.
                          C'est ici que vos dernières notifications apparaîtront !
                        </p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">
                            14/03/2020
                          </time>
                        </small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center"
                    href="javascript:void(0)">Voir toutes les notifications</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <div class="avatar avatar-online">
                  <img src="../app-assets/images/logo/circleo.png" alt="avatar"><i></i>
                </div>
                <span class="user-name"><?php echo $user['pseudo']; ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="../settings">
                  <i class="fas fa-user"></i> Profil
                </a>
                <a class="dropdown-item" href="../activity">
                  <i class="fas fa-history"></i> Activités
                </a>
                <a class="dropdown-item" href="../orders">
                  <i class="fas fa-receipt"></i> Commandes
                </a>
                <a class="dropdown-item" href="../sponsorship">
                  <i class="fas fa-users"></i> Parrainage
                </a>
                <a class="dropdown-item" href="../settings">
                  <i class="fas fa-cog"></i> Paramètres
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../account/logout.php">
                  <i class="fas fa-sign-out-alt"></i> Se déconnecter
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div
    class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow navbar-shadow menu-border"
    role="navigation" data-menu="menu-wrapper">
    <!-- Horizontal menu content-->
    <div class="navbar-container main-menu-content" data-menu="menu-container">
      <!-- include ../../../includes/mixins-->
      <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="nav-item">
          <a class="nav-link" href="../home.php">
            <i class="fas fa-home"></i>
            <span data-i18n="Dashboard">
              Vue d'ensemble
            </span>
          </a>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="nav-link" href="../earn">
            <i class="fas fa-dollar-sign"></i>
            <span data-i18n="Templates">Gagner</span>
          </a>
          <ul class="dropdown-menu">
            <li data-menu="">
              <a class="dropdown-item" href="../earn/surveys" data-i18n="Surveys" data-toggle="dropdown">
                Sondages
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../earn/registrations" data-i18n="Registrations" data-toggle="dropdown">
                Inscriptions
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../earn/videos" data-i18n="Videos" data-toggle="dropdown">
                Vidéos
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../earn/offerwalls" data-i18n="OfferWalls" data-toggle="dropdown">
                OfferWalls
              </a>
            </li>
          </ul>
        </li>
        <li class="dropdown nav-item active" data-menu="dropdown">
          <a class="nav-link" href="index.php">
            <i class="fas fa-shopping-cart"></i>
            <span data-i18n="Layouts">Boutique</span>
          </a>
          <ul class="dropdown-menu">
            <li data-menu="">
              <a class="dropdown-item" href="money" data-i18n="PayPal" data-toggle="dropdown">
                PayPal
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="cryptocurrencies" data-i18n="Cryptocurrencies" data-toggle="dropdown">
                Cryptomonnaies
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="subscriptions" data-i18n="Subscriptions" data-toggle="dropdown">
                Abonnements
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="gc" data-i18n="Gifts Cards" data-toggle="dropdown">
                Cartes cadeaux
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="games" data-i18n="Games" data-toggle="dropdown">
                Jeux
              </a>
            </li>
          </ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="nav-link" href="../sponsorship">
            <i class="fas fa-users"></i>
            <span data-i18n="Apps">Parrainage</span>
          </a>
          <ul class="dropdown-menu">
            <li data-menu="">
              <a class="dropdown-item" href="../sponsorship" data-i18n="Invite" data-toggle="dropdown">
                Inviter
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../sponsorship/referrals.php" data-i18n="Referrals" data-toggle="dropdown">
                Mes filleuls
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../leaderboard">
            <i class="fas fa-crown"></i>
            <span data-i18n="Pages">Classement</span>
          </a>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">
            <i class="fas fa-share-alt"></i>
            <span data-i18n="UI">Nous suivre</span>
          </a>
          <ul class="dropdown-menu">
            <li data-menu="">
              <a class="dropdown-item" target="__blank" href="https://discord.gg/hzjTSSB" data-i18n="Discord" data-toggle="dropdown">
                Discord
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" target="__blank" href="https://www.youtube.com/channel/UC5ppKq8W79oqn3mmpN8uWhA" data-i18n="YouTube" data-toggle="dropdown">
                YouTube
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" target="__blank" href="https://twitter.com/Fortool_" data-i18n="Twitter" data-toggle="dropdown">
                Twitter
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" target="__blank" href="https://www.twitch.tv/fortool" data-i18n="Twitch" data-toggle="dropdown">
                Twitch
              </a>
            </li>
          </ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="nav-link" href="help">
            <i class="fas fa-question-circle"></i>
            <span data-i18n="Components">Aide</span>
          </a>
          <ul class="dropdown-menu">
            <li data-menu="">
              <a class="dropdown-item" target="__blank" href="https://forum.fortool.fr" data-i18n="Forum" data-toggle="dropdown">
                Forum
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" target="__blank" href="https://discord.gg/hzjTSSB" data-i18n="Discord" data-toggle="dropdown">
                Discord
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../help" data-i18n="Tickets" data-toggle="dropdown">
                Tickets
              </a>
            </li>
 
          </ul>
        </li>
      </ul>
    </div>
    <!-- /horizontal menu content-->
  </div>
  <!-- END: Main Menu-->

  <!-- BEGIN: Content-->
  <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
      <div class="content-header-left col-md-6 col-12 mb-2 row">
        <h3 class="content-header-title mb-0"><strong>Boutique</strong></h3>
      </div>
      <div class="content-body">
        <!-- Offers & surveys row -->
        <div class="row">
          <!-- Title -->
          <div class="col-md-12 mb-2">
            <h4 class="text-uppercase">Argent</h4>
          </div>
          <!-- -->
          <!-- Argent -->
          <!-- PayPal -->
          <div class="col-md-3 col-sm-12">
            <div class="card">
              <div class="card-header card-head-inverse bg-warning bg-darken-4">
                <h4 class="card-title">PayPal</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body" style="padding: 0 !important">
                  <p class="card-text" style="text-align: center;">
                    <img style="width: 100%;" height="160"
                      src="../app-assets/images/shop/paypal.svg" alt="">
                  </p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">650 Fortcoins</span>
                    5€
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">1300 Fortcoins</span>
                    10€
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">2600 Fortcoins</span>
                    20€
                  </li>
                </ul>
                <div class="card-body text-right">
                  <a href="money" class="btn btn-outline-warning">Commander</a>
                </div>
              </div>
            </div>
          </div>
          <!-- -->
          <!-- PaysafeCard -->
          <div class="col-md-3 col-sm-12">
            <div class="card">
              <div class="card-header card-head-inverse bg-warning bg-darken-4">
                <h4 class="card-title">PaysafeCard</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body" style="padding: 0 !important">
                  <p class="card-text" style="text-align: center;">
                    <img style="width: 100%;"
                      src="../app-assets/images/shop/paysafecard.jpg" alt="">
                  </p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">1300 Fortcoins</span>
                    10€
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">3250 Fortcoins</span>
                    25€
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">6500 Fortcoins</span>
                    50€
                  </li>
                </ul>
                <div class="card-body text-right">
                  <a href="money" class="btn btn-outline-warning">Commander</a>
                </div>
              </div>
            </div>
          </div>
          <!-- -->
        </div>
        <!-- -->

        <!-- Cryptomonnaies -->
        <div class="row">
          <!-- Title -->
          <div class="col-md-12 mb-2">
            <h4 class="text-uppercase">Cryptomonnaies</h4>
          </div>
          <!-- -->
          <!-- Bitcoin -->
          <div class="col-md-3 col-sm-12">
            <div class="card">
              <div class="card-header card-head-inverse bg-warning bg-darken-4">
                <h4 class="card-title">Bitcoin</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body">
                  <p class="card-text" style="text-align: center;">
                    <img height="120" style="width: 100%;"
                      src="../app-assets/images/shop/btc.png"
                      alt="">
                  </p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">260 Fortcoins</span>
                    2€
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">650 Fortcoins</span>
                    5€
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">1300 Fortcoins</span>
                    10€
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">2600 Fortcoins</span>
                    20€
                  </li>
                </ul>
                <div class="card-body text-right">
                  <a href="cryptocurrencies" class="btn btn-outline-warning">Commander</a>
                </div>
              </div>
            </div>
          </div>
          <!-- -->
          <!-- Ethereum -->
          <div class="col-md-3 col-sm-12">
            <div class="card">
              <div class="card-header card-head-inverse bg-warning bg-darken-4">
                <h4 class="card-title">Ethereum</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body">
                  <p class="card-text" style="text-align: center;">
                    <img height="120"
                      src="../app-assets/images/shop/eth.png"
                      alt="">
                  </p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">260 Fortcoins</span>
                    2€
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">650 Fortcoins</span>
                    5€
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">1300 Fortcoins</span>
                    10€
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">2600 Fortcoins</span>
                    20€
                  </li>
                </ul>
                <div class="card-body text-right">
                  <a href="cryptocurrencies" class="btn btn-outline-warning">Commander</a>
                </div>
              </div>
            </div>
          </div>
          <!-- -->
        </div>

        <div class="row">
          <!-- Title -->
          <div class="col-md-12 mb-2">
            <h4 class="text-uppercase">Abonnements</h4>
          </div>
          <!-- -->
          <!-- Discord Nitro -->
          <div class="col-md-3 col-sm-12">
            <div class="card">
              <div class="card-header card-head-inverse bg-warning bg-darken-4">
                <h4 class="card-title">Discord Nitro</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body" style="padding: 0 !important">
                  <p class="card-text" style="text-align: center;">
                    <img height="180" style="width: 100%;"
                      src="../app-assets/images/shop/discord.png" alt="">
                  </p>
                </div>
                <ul class="list-group list-group-flush" style="height: 184px;">
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">650 Fortcoins</span>
                    Classic 5€
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">1300 Fortcoins</span>
                    Nitro 10€
                  </li>
                </ul>
                <div class="card-body text-right">
                  <a href="subscriptions" class="btn btn-outline-warning">Commander</a>
                </div>
              </div>
            </div>
          </div>
          <!-- -->
          <!-- Netflix -->
          <div class="col-md-3 col-sm-12">
            <div class="card">
              <div class="card-header card-head-inverse bg-warning bg-darken-4">
                <h4 class="card-title">Netflix</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body" style="padding: 0 !important">
                  <p class="card-text" style="text-align: center;">
                    <img height="180" style="width: 100%;"
                      src="../app-assets/images/shop/netflix.jpg" alt="">
                  </p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">3250 Fortcoins</span>
                    25€
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">6500 Fortcoins</span>
                    50€
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">13 000 Fortcoins</span>
                    100€
                  </li>
                </ul>
                <div class="card-body text-right">
                  <a href="subscriptions" class="btn btn-outline-warning">Commander</a>
                </div>
              </div>
            </div>
          </div>
          <!-- -->
          <!-- Spotify -->
          <div class="col-md-3 col-sm-12">
            <div class="card">
              <div class="card-header card-head-inverse bg-warning bg-darken-4">
                <h4 class="card-title">Spotify</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body" style="padding: 0 !important">
                  <p class="card-text" style="text-align: center;">
                    <img height="180" style="width: 100%;" src="../app-assets/images/shop/spotify.png"
                      alt="">
                  </p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">1300 Fortcoins</span>
                    10€
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">3900 Fortcoins</span>
                    30€
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">7800 Fortcoins</span>
                    60€
                  </li>
                </ul>
                <div class="card-body text-right">
                  <a href="subscriptions" class="btn btn-outline-warning">Commander</a>
                </div>
              </div>
            </div>
          </div>
          <!-- -->
          <!-- Playstation Plus -->
          <div class="col-md-3 col-sm-12">
            <div class="card">
              <div class="card-header card-head-inverse bg-warning bg-darken-4">
                <h4 class="card-title">Playstation Plus</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body" style="padding: 0 !important">
                  <p class="card-text" style="text-align: center;">
                    <img height="180" style="width: 100%;"
                      src="../app-assets/images/shop/psplus.jpg"
                      alt="">
                  </p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">1300 Fortcoins</span>
                    1 mois
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">3250 Fortcoins</span>
                    3 mois
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">7800 Fortcoins</span>
                    12 mois
                  </li>
                </ul>
                <div class="card-body text-right">
                  <a href="subscriptions" class="btn btn-outline-warning">Commander</a>
                </div>
              </div>
            </div>
          </div>
          <!-- -->
          <!-- Xbox Live -->
          <div class="col-md-3 col-sm-12">
            <div class="card">
              <div class="card-header card-head-inverse bg-warning bg-darken-4">
                <h4 class="card-title">Xbox Live</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body" style="padding: 0 !important">
                  <p class="card-text" style="text-align: center;">
                    <img height="180" style="width: 100%;"
                      src="../app-assets/images/shop/xboxlive.png"
                      alt="">
                  </p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">2600 Fortcoins</span>
                    3 mois
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">3900 Fortcoins</span>
                    6 mois
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">7800 Fortcoins</span>
                    12 mois
                  </li>
                </ul>
                <div class="card-body text-right">
                  <a href="subscriptions" class="btn btn-outline-warning">Commander</a>
                </div>
              </div>
            </div>
          </div>
          <!-- -->
          <!-- ADN -->
          <div class="col-md-3 col-sm-12">
            <div class="card">
              <div class="card-header card-head-inverse bg-warning bg-darken-4">
                <h4 class="card-title">ADN</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body" style="padding: 0 !important">
                  <p class="card-text" style="text-align: center;">
                    <img height="180" style="width: 100%;"
                      src="../app-assets/images/shop/adn.jpg"
                      alt="">
                  </p>
                </div>
                <ul class="list-group list-group-flush" style="height: 184px;">
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">910 Fortcoins</span>
                    1 mois
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">7800 Fortcoins</span>
                    12 mois
                  </li>
                </ul>
                <div class="card-body text-right">
                  <a href="subscriptions" class="btn btn-outline-warning">Commander</a>
                </div>
              </div>
            </div>
          </div>
          <!-- -->
          <!-- ADN -->
          <div class="col-md-3 col-sm-12">
            <div class="card">
              <div class="card-header card-head-inverse bg-warning bg-darken-4">
                <h4 class="card-title">Custom Maker Premium</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body" style="padding: 0 !important">
                  <p class="card-text" style="text-align: center;">
                    <img height="180" style="width: 100%;"
                      src="../app-assets/images/shop/premium_fortool_v2_logo.png"
                      alt="">
                  </p>
                </div>
                <ul class="list-group list-group-flush" style="height: 184px;">
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">300 Fortcoins</span>
                    1 mois
                  </li>
                </ul>
                <div class="card-body text-right">
                  <a href="subscriptions" class="btn btn-outline-warning">Commander</a>
                </div>
              </div>
            </div>
          </div>
          <!-- -->
        </div>
        <!-- Cartes cadeaux -->
        <div class="row">
          <!-- Title -->
          <div class="col-md-12 mb-2">
            <h4 class="text-uppercase">Cartes cadeaux</h4>
          </div>
          <!-- -->
          <!-- Amazon -->
          <div class="col-md-3 col-sm-12">
            <div class="card">
              <div class="card-header card-head-inverse bg-warning bg-darken-4">
                <h4 class="card-title">Amazon</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body" style="padding: 0 !important">
                  <p class="card-text" style="text-align: center;">
                    <img height="180" style="width: 100%;"
                      src="../app-assets/images/shop/amazon.jpg"
                      alt="">
                  </p>
                </div>
                <ul class="list-group list-group-flush" style="height: 184px;">
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">650 Fortcoins</span>
                    5€
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">1300 Fortcoins</span>
                    10€
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">2600 Fortcoins</span>
                    20€
                  </li>
                </ul>
                <div class="card-body text-right">
                  <a href="gc" class="btn btn-outline-warning">Commander</a>
                </div>
              </div>
            </div>
          </div>
          <!-- -->
          <!-- Fnac -->
          <div class="col-md-3 col-sm-12">
            <div class="card">
              <div class="card-header card-head-inverse bg-warning bg-darken-4">
                <h4 class="card-title">Fnac</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body" style="padding: 0 !important">
                  <p class="card-text" style="text-align: center;">
                    <img height="180" style="width: 100%;"
                      src="../app-assets/images/shop/fnac.jfif"
                      alt="">
                  </p>
                </div>
                <ul class="list-group list-group-flush" style="height: 184px;">
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">1950 Fortcoins</span>
                    15€
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">3900 Fortcoins</span>
                    30€
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">6500 Fortcoins</span>
                    50€
                  </li>
                </ul>
                <div class="card-body text-right">
                  <a href="gc" class="btn btn-outline-warning">Commander</a>
                </div>
              </div>
            </div>
          </div>
          <!-- -->
          <!-- Steam -->
          <div class="col-md-3 col-sm-12">
            <div class="card">
              <div class="card-header card-head-inverse bg-warning bg-darken-4">
                <h4 class="card-title">Steam</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body" style="padding: 0 !important">
                  <p class="card-text" style="text-align: center;">
                    <img height="180" style="width: 100%;"
                      src="../app-assets/images/shop/steam.png"
                      alt="">
                  </p>
                </div>
                <ul class="list-group list-group-flush" style="height: 184px;">
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">970 Fortcoins</span>
                    5€
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">1560 Fortcoins</span>
                    10€
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">2600 Fortcoins</span>
                    20€
                  </li>
                </ul>
                <div class="card-body text-right">
                  <a href="gc" class="btn btn-outline-warning">Commander</a>
                </div>
              </div>
            </div>
          </div>
          <!-- -->
          <!-- Origin -->
          <div class="col-md-3 col-sm-12">
            <div class="card">
              <div class="card-header card-head-inverse bg-warning bg-darken-4">
                <h4 class="card-title">Origin</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body" style="padding: 0 !important">
                  <p class="card-text" style="text-align: center;">
                    <img height="180" style="width: 100%;"
                      src="../app-assets/images/shop/origin.png"
                      alt="">
                  </p>
                </div>
                <ul class="list-group list-group-flush" style="height: 184px;">
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">1950 Fortcoins</span>
                    15€
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">2600 Fortcoins</span>
                    20€
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">3900 Fortcoins</span>
                    30€
                  </li>
                </ul>
                <div class="card-body text-right">
                  <a href="gc" class="btn btn-outline-warning">Commander</a>
                </div>
              </div>
            </div>
          </div>
          <!-- -->
        </div>
        <!-- -->
        <!-- Jeux -->
        <div class="row">
          <div class="col-md-12 mb-2">
            <h4 class="text-uppercase">Jeux</h4>
          </div>

          <!-- League of Legend -->
          <div class="col-md-3 col-sm-12">
            <div class="card">
              <div class="card-header card-head-inverse bg-warning bg-darken-4">
                <h4 class="card-title">League of Legend</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body" style="padding: 0 !important">
                  <p class="card-text" style="text-align: center;">
                    <img height="180" style="width: 100%;"
                      src="../app-assets/images/shop/lol.jpg"
                      alt="">
                  </p>
                </div>
                <ul class="list-group list-group-flush" style="height: 184px;">
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">2600 Fortcoins</span>
                    20€ (2800 Riot Points)
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">3250 Fortcoins</span>
                    25€ (3500 Riot Points)
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">4550 Fortcoins</span>
                    35€ (5000 Riot Points)
                  </li>
                </ul>
                <div class="card-body text-right">
                  <a href="games" class="btn btn-outline-warning">Commander</a>
                </div>
              </div>
            </div>
          </div>
          <!-- -->
          <!-- Roblox -->
          <div class="col-md-3 col-sm-12">
            <div class="card">
              <div class="card-header card-head-inverse bg-warning bg-darken-4">
                <h4 class="card-title">Roblox</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body" style="padding: 0 !important">
                  <p class="card-text" style="text-align: center;">
                    <img height="180" style="width: 100%;"
                      src="../app-assets/images/shop/roblox.jpg"
                      alt="">
                  </p>
                </div>
                <ul class="list-group list-group-flush" style="height: 184px;">
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">2600 Fortcoins</span>
                    10€ (800 Robux)
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">3250 Fortcoins</span>
                    25€ (2000 Robux)
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-pill bg-primary float-right">4550 Fortcoins</span>
                    50€ (4500 Robux)
                  </li>
                </ul>
                <div class="card-body text-right">
                  <a href="games" class="btn btn-outline-warning">Commander</a>
                </div>
              </div>
            </div>
          </div>
          <!-- -->
        </div>
        <!-- -->
      </div>
    </div>
  </div>
  <!-- END: Content-->

  <!-- BEGIN: Footer-->
  <footer class="footer footer-static footer-light navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2020
        <a class="text-bold-800 grey darken-2" href="https://fortool.fr" target="_blank">
          FORTOOL
        </a>
      </span>
    </p>
  </footer>
  <!-- END: Footer-->


  <!-- BEGIN: Vendor JS-->
  <script src="../app-assets/vendors/js/vendors.min.js"></script>
  <!-- BEGIN Vendor JS-->

  <!-- BEGIN: Page Vendor JS-->
  <script src="../app-assets/vendors/js/ui/jquery.sticky.js"></script>
  <script src="../app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
  <script src="../app-assets/vendors/js/charts/apexcharts/apexcharts.min.js"></script>
  <!-- END: Page Vendor JS-->

  <!-- BEGIN: Theme JS-->
  <script src="../app-assets/js/core/app-menu.min.js"></script>
  <script src="../app-assets/js/core/app.min.js"></script>
  <script src="../app-assets/js/scripts/customizer.min.js"></script>
  <!-- END: Theme JS-->

  <!-- BEGIN: Page JS-->
  <script src="../app-assets/js/scripts/ui/breadcrumbs-with-stats.min.js"></script>
  <script src="../app-assets/js/scripts/cards/card-statistics.min.js"></script>
  <script src="https://unpkg.com/swiper/js/swiper.js"></script>
  <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
  <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
<?php
} else {
    header('Location: ../account/login.php');
}
?>