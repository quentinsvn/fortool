<?php
    session_start();
    require('../../includes/config.php');
    if(isset($_SESSION['id'])) {
        $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
        $requser->execute(array($_SESSION['id']));
        $user = $requser->fetch();
        $json = file_get_contents("http://adscendmedia.com/adwall/api/publisher/115180/profile/16970/offers.json?subid1=".$user['id']."&category_id=20&limit=4");
        $data=array();
        $data = json_decode($json, true);
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
  <link rel="apple-touch-icon" href="../../app-assets/images/ico/circleo.png">
  <link rel="shortcut icon" type="image/x-icon" href="../../app-assets/images/ico/favicon.ico">
  <link
    href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
    rel="stylesheet">

  <!-- BEGIN: Vendor CSS-->
  <link rel="stylesheet" type="text/css" href="../../app-assets/vendors/css/vendors.min.css">
  <!-- END: Vendor CSS-->

  <!-- BEGIN: Theme CSS-->
  <link rel="stylesheet" type="text/css" href="../../app-assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../app-assets/css/bootstrap-extended.min.css">
  <link rel="stylesheet" type="text/css" href="../../app-assets/css/colors.min.css">
  <link rel="stylesheet" type="text/css" href="../../app-assets/css/components.min.css">
  <!-- END: Theme CSS-->

  <!-- BEGIN: Page CSS-->
  <link rel="stylesheet" type="text/css" href="../../app-assets/css/core/menu/menu-types/horizontal-menu.min.css">
  <link rel="stylesheet" type="text/css" href="../../app-assets/css/core/colors/palette-gradient.min.css">
  <link rel="stylesheet" type="text/css" href="../../app-assets/fonts/simple-line-icons/style.min.css">
  <link rel="stylesheet" type="text/css" href="../../app-assets/css/pages/card-statistics.min.css">
  <link rel="stylesheet" type="text/css" href="../../app-assets/css/pages/vertical-timeline.min.css">
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
              <img class="brand-logo" width="120" src="../../app-assets/images/logo/new_logo.png">
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
                <img width="20" src="../../app-assets/images/logo/circleo.png">&nbsp;&nbsp;
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
                  <img src="../../app-assets/images/logo/circleo.png" alt="avatar"><i></i>
                </div>
                <span class="user-name"><?php echo $user['pseudo']; ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="../../settings">
                  <i class="fas fa-user"></i> Profil
                </a>
                <a class="dropdown-item" href="../../activity">
                  <i class="fas fa-history"></i> Activités
                </a>
                <a class="dropdown-item" href="../../orders">
                  <i class="fas fa-receipt"></i> Commandes
                </a>
                <a class="dropdown-item" href="../../sponsorship">
                  <i class="fas fa-users"></i> Parrainage
                </a>
                <a class="dropdown-item" href="../../settings">
                  <i class="fas fa-cog"></i> Paramètres
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../account/logout.php">
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
          <a class="nav-link" href="../../home.php">
            <i class="fas fa-home"></i>
            <span data-i18n="Dashboard">
              Vue d'ensemble
            </span>
          </a>
        </li>
        <li class="dropdown nav-item active" data-menu="dropdown">
          <a class="nav-link" href="../index.php">
            <i class="fas fa-dollar-sign"></i>
            <span data-i18n="Templates">Gagner</span>
          </a>
          <ul class="dropdown-menu">
            <li data-menu="" class="active">
              <a class="dropdown-item" href="index.php" data-i18n="Surveys" data-toggle="dropdown">
                Sondages
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../registrations" data-i18n="Registrations" data-toggle="dropdown">
                Inscriptions
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../videos" data-i18n="Videos" data-toggle="dropdown">
                Vidéos
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../offerwalls" data-i18n="OfferWalls" data-toggle="dropdown">
                OfferWalls
              </a>
            </li>
          </ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="nav-link" href="../../shop">
            <i class="fas fa-shopping-cart"></i>
            <span data-i18n="Layouts">Boutique</span>
          </a>
          <ul class="dropdown-menu">
            <li data-menu="">
              <a class="dropdown-item" href="../../shop/money" data-i18n="PayPal" data-toggle="dropdown">
                PayPal
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../../shop/cryptocurrencies" data-i18n="Cryptocurrencies" data-toggle="dropdown">
                Cryptomonnaies
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../../shop/subscriptions" data-i18n="Subscriptions" data-toggle="dropdown">
                Abonnements
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../../shop/gc" data-i18n="Gifts Cards" data-toggle="dropdown">
                Cartes cadeaux
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../../shop/games" data-i18n="Games" data-toggle="dropdown">
                Jeux
              </a>
            </li>
          </ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="nav-link" href="../../sponsorship">
            <i class="fas fa-users"></i>
            <span data-i18n="Apps">Parrainage</span>
          </a>
          <ul class="dropdown-menu">
            <li data-menu="">
              <a class="dropdown-item" href="../../sponsorship" data-i18n="Invite" data-toggle="dropdown">
                Inviter
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../../sponsorship/referrals.php" data-i18n="Referrals" data-toggle="dropdown">
                Mes filleuls
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../leaderboard">
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
          <a class="nav-link" href="../../help">
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
              <a class="dropdown-item" href="../../help" data-i18n="Tickets" data-toggle="dropdown">
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
        <h3 class="content-header-title mb-0"><strong>Sondages rémunérés</strong></h3>
      </div>
      <div class="content-body">

        <!-- Offers & surveys row -->
        <div class="row">
            <!-- Title -->
            <div class="col-md-12 mb-2">
                <h4 class="text-uppercase">Moteurs de sondages</h4>
            </div>
            <!-- -->
            <!-- Surveys content -->
            <!-- TheoremReach 
            <div class="col-md-3 col-sm-12">
                <div class="card">
                  <div class="card-header card-head-inverse bg-warning bg-darken-4">
                    <h4 class="card-title">TheoremReach</h4>
                  </div>
                  <div class="card-content collapse show">
                    <div class="card-body" style="padding: 0 !important">
                      <p class="card-text" style="text-align: center;">
                        <img height="150" src="data:image/png;base64,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" alt="">
                      </p>
                    </div>
                  </div>
                </div>
            </div>
            -->
            <!-- OfferDaddy -->
            <div class="col-md-3 col-sm-12">
                <div class="card">
                  <div class="card-header card-head-inverse bg-warning bg-darken-4">
                    <h4 class="card-title">OfferDaddy</h4>
                  </div>
                  <a href="offerdaddy">
                    <div class="card-content collapse show">
                      <div class="card-body" style="padding: 0 !important;">
                        <p class="card-text" style="text-align: center;padding:10px;"> 
                          <img height="130" src="../../app-assets/images/earn/od.jpg" alt="">
                        </p> 
                      </div>
                    </div>
                  </a>
                </div>
            </div>
            <!-- -->
            <!-- Pollfish -->
            <div class="col-md-3 col-sm-12">
                <div class="card">
                  <div class="card-header card-head-inverse bg-warning bg-darken-4">
                    <h4 class="card-title">Pollfish</h4>
                  </div>
                  <a href="pollfish">
                    <div class="card-content collapse show">
                      <div class="card-body" style="padding: 0 !important;">
                        <p class="card-text" style="text-align: center;padding:10px;"> 
                          <img height="130" src="../../app-assets/images/earn/pf.png" alt="">
                        </p> 
                      </div>
                    </div>
                  </a>
                </div>
            </div>
            <!-- -->
        </div>
        <!-- -->

    
        <div class="row">
            <!-- Title videos -->
            <div class="col-md-12 mb-2">
                <h4 class="text-uppercase">Sondages directs</h4>
            </div>
            <!-- -->
            <?php
              foreach ($data["offers"] as $pc) { 
                if($pc['credit_delay'] == "0") {
            ?>
            <!-- Sondage -->
            <div class="col-xl-3 col-md-4 col-sm-12">
              <div class="card">
                <div class="card-content">
                  <img class="card-img-top img-fluid" src="https://www.bueilentouraine.com/wp-content/uploads/2018/03/e%CC%81picerie-questionnaire.png" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $pc["name"]; ?></h4>
                    <p class="card-text"><?php echo $pc["description"]; ?></p>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        <span class="badge badge-pill bg-info float-right"><?php echo $pc["currency_count"]; ?> Fortcoins</span>
                        Rémunération
                      </li>
                    </ul>
                    <div class="card-body">
                      <a href="<?php echo $pc["click_url"]; ?>" target="__blank" class="btn btn-outline-warning bg-darken-4">Je participe</a>
                    </div>    
                  </div>
                </div>
              </div>
            </div>
            <!---->
            <?php
              }}
            ?>
        </div>
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
  <script src="../../app-assets/vendors/js/vendors.min.js"></script>
  <!-- BEGIN Vendor JS-->

  <!-- BEGIN: Page Vendor JS-->
  <script src="../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
  <script src="../../app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
  <script src="../../app-assets/vendors/js/charts/apexcharts/apexcharts.min.js"></script>
  <!-- END: Page Vendor JS-->

  <!-- BEGIN: Theme JS-->
  <script src="../../app-assets/js/core/app-menu.min.js"></script>
  <script src="../../app-assets/js/core/app.min.js"></script>
  <script src="../../app-assets/js/scripts/customizer.min.js"></script>
  <!-- END: Theme JS-->

  <!-- BEGIN: Page JS-->
  <script src="../../app-assets/js/scripts/ui/breadcrumbs-with-stats.min.js"></script>
  <script src="../../app-assets/js/scripts/cards/card-statistics.min.js"></script>
  <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
<?php
} else {
    header('Location: ../../account/login.php');
}
?>