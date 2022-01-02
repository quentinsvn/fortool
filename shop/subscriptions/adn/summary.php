<?php
    session_start();
    require('../../../includes/config.php');
    if(isset($_SESSION['id'])) {
      $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
      $requser->execute(array($_SESSION['id']));
      $user = $requser->fetch();
      if(isset($_GET['amount']) == 10 && !empty($_GET['amount'] == 10) &&  $user['solde'] >= 910 || isset($_GET['amount']) == 60 && !empty($_GET['amount'] == 60 && $user['solde'] >= 7800)) {
        if($_GET['amount'] == 10) {
            $title = "ADN 1 Mois";
            $montant = 910;
        }
        if($_GET['amount'] == 60) {
            $title = "ADN 12 Mois";
            $montant = 7800;
        }
        if(isset($_POST['confirm'])) {
            $ref_order = rand(1000000, 9999999);
            $pseudo = $user['pseudo'];
            $url_picture = "https://upload.wikimedia.org/wikipedia/commons/c/c7/ADN_Logo_2016.png";
            $insertorder = $bdd->prepare("INSERT INTO orders(ref, url_picture, date, name, pseudo, amount) VALUES ('FTORD$ref_order','$url_picture', now(),'$title','$pseudo','$montant')");
            $insertorder->execute();
            $updatesolde = $bdd->prepare("UPDATE users SET solde = solde - $montant WHERE id = ?");
            $updatesolde->execute(array($_SESSION['id']));
            header('Location: ../../orders');
        }
    } else {
        header('Location: index.php');
    }
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
  <link rel="apple-touch-icon" href="../../../app-assets/images/ico/circleo.png">
  <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
  <link
    href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
    rel="stylesheet">

  <!-- BEGIN: Vendor CSS-->
  <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
  <!-- END: Vendor CSS-->

  <!-- BEGIN: Theme CSS-->
  <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.min.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.min.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.min.css">
  <!-- END: Theme CSS-->

  <!-- BEGIN: Page CSS-->
  <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/horizontal-menu.min.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.min.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/fonts/simple-line-icons/style.min.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/card-statistics.min.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/vertical-timeline.min.css">
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
            <a class="navbar-brand" href="index.html">
              <img class="brand-logo" width="120" src="../../../app-assets/images/logo/new_logo.png">
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
                <img width="20" src="../../../app-assets/images/logo/circleo.png">&nbsp;&nbsp;
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
                  <img src="../../../app-assets/images/logo/circleo.png" alt="avatar"><i></i>
                </div>
                <span class="user-name"><?php echo $user['pseudo']; ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="../../../settings">
                  <i class="fas fa-user"></i> Profil
                </a>
                <a class="dropdown-item" href="../../../activity">
                  <i class="fas fa-history"></i> Activités
                </a>
                <a class="dropdown-item" href="../../../orders">
                  <i class="fas fa-receipt"></i> Commandes
                </a>
                <a class="dropdown-item" href="../../../sponsorship">
                  <i class="fas fa-users"></i> Parrainage
                </a>
                <a class="dropdown-item" href="../../../settings">
                  <i class="fas fa-cog"></i> Paramètres
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../../account/logout.php">
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
          <a class="nav-link" href="../../../home.php">
            <i class="fas fa-home"></i>
            <span data-i18n="Dashboard">
              Vue d'ensemble
            </span>
          </a>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="nav-link" href="../../../earn/">
            <i class="fas fa-dollar-sign"></i>
            <span data-i18n="Templates">Gagner</span>
          </a>
          <ul class="dropdown-menu">
            <li data-menu="">
              <a class="dropdown-item" href="../../../earn/surveys" data-i18n="Surveys" data-toggle="dropdown">
                Sondages
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../../../earn/registrations" data-i18n="Registrations" data-toggle="dropdown">
                Inscriptions
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../../../earn/videos" data-i18n="Videos" data-toggle="dropdown">
                Vidéos
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../../../earn/offerwalls" data-i18n="OfferWalls" data-toggle="dropdown">
                OfferWalls
              </a>
            </li>
          </ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="nav-link" href="../../../shop">
            <i class="fas fa-shopping-cart"></i>
            <span data-i18n="Layouts">Boutique</span>
          </a>
          <ul class="dropdown-menu">
            <li data-menu="">
              <a class="dropdown-item" href="../../../shop/money" data-i18n="PayPal" data-toggle="dropdown">
                PayPal
              </a>
            </li>
            <li data-menu="" >
              <a class="dropdown-item" href="../../../shop/cryptocurrencies" data-i18n="Cryptocurrencies" data-toggle="dropdown">
                Cryptomonnaies
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../../../shop/subscriptions" data-i18n="Subscriptions" data-toggle="dropdown">
                Abonnements
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../../../shop/gc" data-i18n="Gifts Cards" data-toggle="dropdown">
                Cartes cadeaux
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../../../shop/games" data-i18n="Games" data-toggle="dropdown">
                Jeux
              </a>
            </li>
          </ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="nav-link" href="../../../sponsorship">
            <i class="fas fa-users"></i>
            <span data-i18n="Apps">Parrainage</span>
          </a>
          <ul class="dropdown-menu">
            <li data-menu="">
              <a class="dropdown-item" href="../../../sponsorship" data-i18n="Invite" data-toggle="dropdown">
                Inviter
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../../../sponsorship/referrals.php" data-i18n="Referrals" data-toggle="dropdown">
                Mes filleuls
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../../leaderboard">
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
          <a class="nav-link" href="../../../help">
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
              <a class="dropdown-item" href="../../../help" data-i18n="Tickets" data-toggle="dropdown">
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
        <h3 class="content-header-title mb-0"><strong>Confirmation de votre commande</strong></h3>
      </div>
      <div class="content-body">

        <!-- Offers & surveys row -->
        <div class="row">
            <!-- Offers & surveys content -->
            <!-- OfferDaddy -->
            <div class="col-12 col-md-12 col-sm-12">
              <div class="card">
                <div class="card-header card-head-inverse bg-warning bg-darken-4">
                  <h4 class="card-title">Récapitulatif</h4>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                  <ul class="list-group">
                        <li class="list-group-item">
                            <span class="float-right">
                                <?php echo date('d/m/Y'); ?>
                            </span>
                            <i class="fas fa-calendar-alt"></i> Date
                        </li>
                        <li class="list-group-item">
                            <span class="float-right">
                                <?php echo $title ?>
                            </span>
                            <i class="fas fa-gifts"></i> Récompense
                        </li>
                        <li class="list-group-item">
                            <span class="float-right">
                                <?php echo $user['email']; ?>
                            </span>
                            <i class="fas fa-envelope"></i> Adresse e-mail
                        </li>
                        <li class="list-group-item">
                            <span class="float-right" style="color: red;">
                                -<?php echo $montant ?> Fortcoins
                            </span>
                            <i class="fas fa-dollar-sign"></i> Tarif
                        </li>
                    </ul>
                    <form method="post">
                        <div class="input-group">
                          <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-2">
                            <button type="submit" name="confirm" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Confirmer</button>
                          </div>
                        </div>
                    </form>
                    
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
  <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
  <!-- BEGIN Vendor JS-->

  <!-- BEGIN: Page Vendor JS-->
  <script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
  <script src="../../../app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
  <script src="../../../app-assets/vendors/js/charts/apexcharts/apexcharts.min.js"></script>
  <!-- END: Page Vendor JS-->

  <!-- BEGIN: Theme JS-->
  <script src="../../../app-assets/js/core/app-menu.min.js"></script>
  <script src="../../../app-assets/js/core/app.min.js"></script>
  <script src="../../../app-assets/js/scripts/customizer.min.js"></script>
  <!-- END: Theme JS-->

  <!-- BEGIN: Page JS-->
  <script src="../../../app-assets/js/scripts/ui/breadcrumbs-with-stats.min.js"></script>
  <script src="../../../app-assets/js/scripts/cards/card-statistics.min.js"></script>
  <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
<?php
} else {
    header('Location: ../../../account/login.php');
}
?>