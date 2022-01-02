<?php
session_start();
include('../includes/config.php');
    if(isset($_SESSION['id'])) {
        $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
        $requser->execute(array($_SESSION['id']));
        $user = $requser->fetch();
        include('../includes/include_settings.php');
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
                        <a class="navbar-brand" href="index.html">
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
                                        <span class="notification-tag badge badge-danger float-right m-0">1
                                            Notification</span>
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
                                                    <time class="media-meta text-muted"
                                                        datetime="2015-06-11T18:29:20+08:00">
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
                                <a class="dropdown-item" href="index.php">
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
        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="nav-link" href="../shop">
            <i class="fas fa-shopping-cart"></i>
            <span data-i18n="Layouts">Boutique</span>
          </a>
          <ul class="dropdown-menu">
            <li data-menu="">
              <a class="dropdown-item" href="../shop/money" data-i18n="PayPal" data-toggle="dropdown">
                PayPal
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../shop/cryptocurrencies" data-i18n="Cryptocurrencies" data-toggle="dropdown">
                Cryptomonnaies
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../shop/subscriptions" data-i18n="Subscriptions" data-toggle="dropdown">
                Abonnements
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../shop/gc" data-i18n="Gifts Cards" data-toggle="dropdown">
                Cartes cadeaux
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="../shop/games" data-i18n="Games" data-toggle="dropdown">
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
          <a class="nav-link" href="../help">
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
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Paramètres du compte</h3>
                </div>
            </div>
            <div class="content-body">
                <!-- account setting page start -->
                <section id="page-account-settings">
                    <div class="row">
                        <!-- left menu section -->
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">
                                    <a class="nav-link d-flex active" id="account-pill-general" data-toggle="pill"
                                        href="#account-vertical-general" aria-expanded="true">
                                        <i class="fas fa-user-circle"></i>
                                        General
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex" id="account-pill-password" data-toggle="pill"
                                        href="#account-vertical-password" aria-expanded="false">
                                        <i class="fas fa-lock"></i>
                                        Sécurité
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex" id="account-pill-info" data-toggle="pill"
                                        href="#account-vertical-info" aria-expanded="false">
                                        <i class="fas fa-credit-card"></i>
                                        Paiements
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex" id="account-pill-social" data-toggle="pill"
                                        href="#account-vertical-social" aria-expanded="false">
                                        <i class="fas fa-share-alt"></i>
                                        Réseaux sociaux
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex" id="account-pill-notifications" data-toggle="pill"
                                        href="#account-vertical-notifications" aria-expanded="false">
                                        <i class="fas fa-bell"></i>
                                        Notifications
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex" id="account-pill-settings" data-toggle="pill"
                                        href="#account-vertical-settings" aria-expanded="false">
                                        <i class="fas fa-sliders-h"></i>
                                        Paramètres
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- right content section -->
                        <div class="col-md-9">
                            <?php 
                                if(isset($message)) {
                                    echo $message;
                                }
                            ?>
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                                aria-labelledby="account-pill-general" aria-expanded="true">
                                                <div class="media">
                                                    <a href="javascript: void(0);">
                                                        <img src="../app-assets/images/logo/circleo.png"
                                                            class="rounded mr-75" alt="profile image" height="64"
                                                            width="64">
                                                    </a>
                                                    <div class="media-body mt-75">
                                                        <div
                                                            class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                            <label
                                                                class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer"
                                                                for="account-upload">Importer</label>
                                                            <input type="file" id="account-upload" hidden>
                                                            <button
                                                                class="btn btn-sm btn-secondary ml-50">Supprimer</button>
                                                        </div>
                                                        <p class="text-muted ml-75 mt-50"><small>Format JPG, GIF ou
                                                                PNG acceptés. Taille maximum:
                                                                800kB</small></p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <form method="post">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-username">Pseudo</label>
                                                                    <input type="text" name="pseudo" value="<?php echo $user['pseudo']; ?>" class="form-control"
                                                                        id="account-username" placeholder="Choisissez un pseudo"
                                                                        required
                                                                        data-validation-required-message="Ce champ est requis">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-firstname">Prénom</label>
                                                                    <input type="text" name="prenom" value="<?php echo $user['prenom']; ?>" class="form-control"
                                                                        id="account-firstname" placeholder="Votre prénom"
                                                                        required
                                                                        data-validation-required-message="Ce champ est requis">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-lastname">Nom</label>
                                                                    <input type="text" name="nom" value="<?php echo $user['nom']; ?>" class="form-control"
                                                                        id="account-lastname" placeholder="Votre nom"
                                                                        required
                                                                        data-validation-required-message="Ce champ est requis">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Pays</label>
                                                                <fieldset class="form-group position-relative">
                                                                    <select name="pays" class="form-control">
                                                                        <option selected><?php echo $user['pays']; ?></option>
                                                                        <option value="Afghanistan">Afghanistan </option>
                                                                        <option value="Afrique_Centrale">Afrique Centrale </option>
                                                                        <option value="Afrique_du_sud">Afrique du Sud </option>
                                                                        <option value="Albanie">Albanie </option>
                                                                        <option value="Algerie">Algerie </option>
                                                                        <option value="Allemagne">Allemagne </option>
                                                                        <option value="Andorre">Andorre </option>
                                                                        <option value="Angola">Angola </option>
                                                                        <option value="Anguilla">Anguilla </option>
                                                                        <option value="Arabie_Saoudite">Arabie Saoudite </option>
                                                                        <option value="Argentine">Argentine </option>
                                                                        <option value="Armenie">Armenie </option>
                                                                        <option value="Australie">Australie </option>
                                                                        <option value="Autriche">Autriche </option>
                                                                        <option value="Azerbaidjan">Azerbaidjan </option>

                                                                        <option value="Bahamas">Bahamas </option>
                                                                        <option value="Bangladesh">Bangladesh </option>
                                                                        <option value="Barbade">Barbade </option>
                                                                        <option value="Bahrein">Bahrein </option>
                                                                        <option value="Belgique">Belgique </option>
                                                                        <option value="Belize">Belize </option>
                                                                        <option value="Benin">Benin </option>
                                                                        <option value="Bermudes">Bermudes </option>
                                                                        <option value="Bielorussie">Bielorussie </option>
                                                                        <option value="Bolivie">Bolivie </option>
                                                                        <option value="Botswana">Botswana </option>
                                                                        <option value="Bhoutan">Bhoutan </option>
                                                                        <option value="Boznie_Herzegovine">Boznie Herzegovine </option>
                                                                        <option value="Bresil">Bresil </option>
                                                                        <option value="Brunei">Brunei </option>
                                                                        <option value="Bulgarie">Bulgarie </option>
                                                                        <option value="Burkina_Faso">Burkina_Faso </option>
                                                                        <option value="Burundi">Burundi </option>

                                                                        <option value="Caiman">Caiman </option>
                                                                        <option value="Cambodge">Cambodge </option>
                                                                        <option value="Cameroun">Cameroun </option>
                                                                        <option value="Canada">Canada </option>
                                                                        <option value="Canaries">Canaries </option>
                                                                        <option value="Cap_vert">Cap Vert </option>
                                                                        <option value="Chili">Chili </option>
                                                                        <option value="Chine">Chine </option>
                                                                        <option value="Chypre">Chypre </option>
                                                                        <option value="Colombie">Colombie </option>
                                                                        <option value="Comores">Colombie </option>
                                                                        <option value="Congo">Congo </option>
                                                                        <option value="Congo_democratique">Congo democratique </option>
                                                                        <option value="Cook">Cook </option>
                                                                        <option value="Coree_du_Nord">Coree du Nord </option>
                                                                        <option value="Coree_du_Sud">Coree du Sud </option>
                                                                        <option value="Costa_Rica">Costa Rica </option>
                                                                        <option value="Cote_d_Ivoire">Côte d'Ivoire </option>
                                                                        <option value="Croatie">Croatie </option>
                                                                        <option value="Cuba">Cuba </option>

                                                                        <option value="Danemark">Danemark </option>
                                                                        <option value="Djibouti">Djibouti </option>
                                                                        <option value="Dominique">Dominique </option>

                                                                        <option value="Egypte">Egypte </option>
                                                                        <option value="Emirats_Arabes_Unis">Emirats Arabes Unis </option>
                                                                        <option value="Equateur">Equateur </option>
                                                                        <option value="Erythree">Erythree </option>
                                                                        <option value="Espagne">Espagne </option>
                                                                        <option value="Estonie">Estonie </option>
                                                                        <option value="Etats_Unis">Etats Unis </option>
                                                                        <option value="Ethiopie">Ethiopie </option>

                                                                        <option value="Falkland">Falkland </option>
                                                                        <option value="Feroe">Feroe </option>
                                                                        <option value="Fidji">Fidji </option>
                                                                        <option value="Finlande">Finlande </option>
                                                                        <option value="France">France </option>

                                                                        <option value="Gabon">Gabon </option>
                                                                        <option value="Gambie">Gambie </option>
                                                                        <option value="Georgie">Georgie </option>
                                                                        <option value="Ghana">Ghana </option>
                                                                        <option value="Gibraltar">Gibraltar </option>
                                                                        <option value="Grece">Grece </option>
                                                                        <option value="Grenade">Grenade </option>
                                                                        <option value="Groenland">Groenland </option>
                                                                        <option value="Guadeloupe">Guadeloupe </option>
                                                                        <option value="Guam">Guam </option>
                                                                        <option value="Guatemala">Guatemala</option>
                                                                        <option value="Guernesey">Guernesey </option>
                                                                        <option value="Guinee">Guinee </option>
                                                                        <option value="Guinee_Bissau">Guinee Bissau </option>
                                                                        <option value="Guinee equatoriale">Guinee Equatoriale </option>
                                                                        <option value="Guyana">Guyana </option>
                                                                        <option value="Guyane_Francaise ">Guyane Francaise </option>

                                                                        <option value="Haiti">Haiti </option>
                                                                        <option value="Hawaii">Hawaii </option>
                                                                        <option value="Honduras">Honduras </option>
                                                                        <option value="Hong_Kong">Hong Kong </option>
                                                                        <option value="Hongrie">Hongrie </option>

                                                                        <option value="Inde">Inde </option>
                                                                        <option value="Indonesie">Indonesie </option>
                                                                        <option value="Iran">Iran </option>
                                                                        <option value="Iraq">Iraq </option>
                                                                        <option value="Irlande">Irlande </option>
                                                                        <option value="Islande">Islande </option>
                                                                        <option value="Israel">Israel </option>
                                                                        <option value="Italie">italie </option>

                                                                        <option value="Jamaique">Jamaique </option>
                                                                        <option value="Jan Mayen">Jan Mayen </option>
                                                                        <option value="Japon">Japon </option>
                                                                        <option value="Jersey">Jersey </option>
                                                                        <option value="Jordanie">Jordanie </option>

                                                                        <option value="Kazakhstan">Kazakhstan </option>
                                                                        <option value="Kenya">Kenya </option>
                                                                        <option value="Kirghizstan">Kirghizistan </option>
                                                                        <option value="Kiribati">Kiribati </option>
                                                                        <option value="Koweit">Koweit </option>

                                                                        <option value="Laos">Laos </option>
                                                                        <option value="Lesotho">Lesotho </option>
                                                                        <option value="Lettonie">Lettonie </option>
                                                                        <option value="Liban">Liban </option>
                                                                        <option value="Liberia">Liberia </option>
                                                                        <option value="Liechtenstein">Liechtenstein </option>
                                                                        <option value="Lituanie">Lituanie </option>
                                                                        <option value="Luxembourg">Luxembourg </option>
                                                                        <option value="Lybie">Lybie </option>

                                                                        <option value="Macao">Macao </option>
                                                                        <option value="Macedoine">Macedoine </option>
                                                                        <option value="Madagascar">Madagascar </option>
                                                                        <option value="Madère">Madère </option>
                                                                        <option value="Malaisie">Malaisie </option>
                                                                        <option value="Malawi">Malawi </option>
                                                                        <option value="Maldives">Maldives </option>
                                                                        <option value="Mali">Mali </option>
                                                                        <option value="Malte">Malte </option>
                                                                        <option value="Man">Man </option>
                                                                        <option value="Mariannes du Nord">Mariannes du Nord </option>
                                                                        <option value="Maroc">Maroc </option>
                                                                        <option value="Marshall">Marshall </option>
                                                                        <option value="Martinique">Martinique </option>
                                                                        <option value="Maurice">Maurice </option>
                                                                        <option value="Mauritanie">Mauritanie </option>
                                                                        <option value="Mayotte">Mayotte </option>
                                                                        <option value="Mexique">Mexique </option>
                                                                        <option value="Micronesie">Micronesie </option>
                                                                        <option value="Midway">Midway </option>
                                                                        <option value="Moldavie">Moldavie </option>
                                                                        <option value="Monaco">Monaco </option>
                                                                        <option value="Mongolie">Mongolie </option>
                                                                        <option value="Montserrat">Montserrat </option>
                                                                        <option value="Mozambique">Mozambique </option>

                                                                        <option value="Namibie">Namibie </option>
                                                                        <option value="Nauru">Nauru </option>
                                                                        <option value="Nepal">Nepal </option>
                                                                        <option value="Nicaragua">Nicaragua </option>
                                                                        <option value="Niger">Niger </option>
                                                                        <option value="Nigeria">Nigeria </option>
                                                                        <option value="Niue">Niue </option>
                                                                        <option value="Norfolk">Norfolk </option>
                                                                        <option value="Norvege">Norvege </option>
                                                                        <option value="Nouvelle_Caledonie">Nouvelle Caledonie </option>
                                                                        <option value="Nouvelle_Zelande">Nouvelle Zelande </option>

                                                                        <option value="Oman">Oman </option>
                                                                        <option value="Ouganda">Ouganda </option>
                                                                        <option value="Ouzbekistan">Ouzbekistan </option>

                                                                        <option value="Pakistan">Pakistan </option>
                                                                        <option value="Palau">Palau </option>
                                                                        <option value="Palestine">Palestine </option>
                                                                        <option value="Panama">Panama </option>
                                                                        <option value="Papouasie_Nouvelle_Guinee">Papouasie Nouvelle Guinee </option>
                                                                        <option value="Paraguay">Paraguay </option>
                                                                        <option value="Pays_Bas">Pays_Bas </option>
                                                                        <option value="Perou">Perou </option>
                                                                        <option value="Philippines">Philippines </option>
                                                                        <option value="Pologne">Pologne </option>
                                                                        <option value="Polynesie">Polynesie </option>
                                                                        <option value="Porto_Rico">Porto Rico </option>
                                                                        <option value="Portugal">Portugal </option>

                                                                        <option value="Qatar">Qatar </option>

                                                                        <option value="Republique_Dominicaine">Republique Dominicaine </option>
                                                                        <option value="Republique_Tcheque">Republique Tcheque </option>
                                                                        <option value="Reunion">Reunion </option>
                                                                        <option value="Roumanie">Roumanie </option>
                                                                        <option value="Royaume_Uni">Royaume_Uni </option>
                                                                        <option value="Russie">Russie </option>
                                                                        <option value="Rwanda">Rwanda </option>

                                                                        <option value="Sahara Occidental">Sahara Occidental </option>
                                                                        <option value="Sainte_Lucie">Sainte_Lucie </option>
                                                                        <option value="Saint_Marin">Saint_Marin </option>
                                                                        <option value="Salomon">Salomon </option>
                                                                        <option value="Salvador">Salvador </option>
                                                                        <option value="Samoa_Occidentales">Samoa Occidentales</option>
                                                                        <option value="Samoa_Americaine">Samoa Americaine </option>
                                                                        <option value="Sao_Tome_et_Principe">Sao Tome et Principe </option>
                                                                        <option value="Senegal">Senegal </option>
                                                                        <option value="Seychelles">Seychelles </option>
                                                                        <option value="Sierra Leone">Sierra Leone </option>
                                                                        <option value="Singapour">Singapour </option>
                                                                        <option value="Slovaquie">Slovaquie </option>
                                                                        <option value="Slovenie">Slovenie</option>
                                                                        <option value="Somalie">Somalie </option>
                                                                        <option value="Soudan">Soudan </option>
                                                                        <option value="Sri_Lanka">Sri Lanka </option>
                                                                        <option value="Suede">Suede </option>
                                                                        <option value="Suisse">Suisse </option>
                                                                        <option value="Surinam">Surinam </option>
                                                                        <option value="Swaziland">Swaziland </option>
                                                                        <option value="Syrie">Syrie </option>

                                                                        <option value="Tadjikistan">Tadjikistan </option>
                                                                        <option value="Taiwan">Taiwan </option>
                                                                        <option value="Tonga">Tonga </option>
                                                                        <option value="Tanzanie">Tanzanie </option>
                                                                        <option value="Tchad">Tchad </option>
                                                                        <option value="Thailande">Thailande </option>
                                                                        <option value="Tibet">Tibet </option>
                                                                        <option value="Timor_Oriental">Timor Oriental </option>
                                                                        <option value="Togo">Togo </option>
                                                                        <option value="Trinite_et_Tobago">Trinite et Tobago </option>
                                                                        <option value="Tristan da cunha">Tristan de cuncha </option>
                                                                        <option value="Tunisie">Tunisie </option>
                                                                        <option value="Turkmenistan">Turmenistan </option>
                                                                        <option value="Turquie">Turquie </option>

                                                                        <option value="Ukraine">Ukraine </option>
                                                                        <option value="Uruguay">Uruguay </option>

                                                                        <option value="Vanuatu">Vanuatu </option>
                                                                        <option value="Vatican">Vatican </option>
                                                                        <option value="Venezuela">Venezuela </option>
                                                                        <option value="Vierges_Americaines">Vierges Americaines </option>
                                                                        <option value="Vierges_Britanniques">Vierges Britanniques </option>
                                                                        <option value="Vietnam">Vietnam </option>

                                                                        <option value="Wake">Wake </option>
                                                                        <option value="Wallis et Futuma">Wallis et Futuma </option>

                                                                        <option value="Yemen">Yemen </option>
                                                                        <option value="Yougoslavie">Yougoslavie </option>

                                                                        <option value="Zambie">Zambie </option>
                                                                        <option value="Zimbabwe">Zimbabwe </option>
                                                                    </select>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-e-mail">E-mail</label>
                                                                    <input name="email" value="<?php echo $user['email']; ?>" type="email" class="form-control"
                                                                        id="account-e-mail" placeholder="Email"
                                                                        required
                                                                        data-validation-required-message="Ce champ est requis">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                        <!-- 
                                                            <div class="alert alert-warning alert-dismissible mb-2"
                                                                role="alert">
                                                                <button type="button" class="close" data-dismiss="alert"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                                <p class="mb-0">
                                                                    Votre email n'est pas confirmé. Veuillez vérifier votre 
                                                                    boîte mail s'il vous plaît.
                                                                </p>
                                                                <a href="javascript: void(0);">Renvoyez un mail</a>
                                                            </div>
                                                        -->
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="phone-number">Numéro de téléphone</label>
                                                                <input value="<?php echo $user['tel']; ?>" name="tel" type="number" class="form-control"
                                                                    id="phone-number" placeholder="Votre numéro de téléphone">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button name="confirm_infos" type="submit"
                                                                class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Enregistrer</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-password" role="tabpanel"
                                                aria-labelledby="account-pill-password" aria-expanded="false">
                                                <form method="post">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-new-password">Nouveau mot de passe</label>
                                                                    <input type="password" name="mdp"
                                                                        id="account-new-password" class="form-control"
                                                                        placeholder="Choisissez un nouveau mot de passe" required
                                                                        data-validation-required-message="Ce champ est requis"
                                                                        minlength="6">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-retype-new-password">Confirmer le nouveau mot de passe</label>
                                                                    <input type="password" name="mdpconfirm"
                                                                        class="form-control" required
                                                                        id="account-retype-new-password"
                                                                        data-validation-match-match="password"
                                                                        placeholder="Confirmez votre nouveau mot de passe"
                                                                        data-validation-required-message="Ce champ est requis"
                                                                        minlength="6">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" name="confirm_mdp"
                                                                class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Enregistrer</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-info" role="tabpanel"
                                                aria-labelledby="account-pill-info" aria-expanded="false">
                                                <form method="post">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-paypal">Adresse e-mail PayPal</label>
                                                                <input type="email" name="paypal" value="<?php echo $user['paypal']; ?>" class="form-control"
                                                                    id="account-paypal" placeholder="Votre adresse e-mail PayPal">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="account-btc">Adresse Bitcoin</label>
                                                                <input type="text" value="<?php echo $user['btc']; ?>" name="btc" class="form-control"
                                                                    id="account-btc" placeholder="Adresse de votre Wallet Bitcoin">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="account-eth">Adresse Ethereum</label>
                                                                <input type="text" value="<?php echo $user['eth']; ?>" name="eth" class="form-control"
                                                                    id="account-eth" placeholder="Adresse de votre Wallet Ethereum">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" name="confirm_payments"
                                                                class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Enregistrer</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-social" role="tabpanel"
                                                aria-labelledby="account-pill-social" aria-expanded="false">
                                                <form method="post">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-twitter">Twitter</label>
                                                                <fieldset>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">@</span>
                                                                        </div>
                                                                        <input type="text" name="twitter" value="<?php echo $user['twitter']; ?>" class="form-control" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-discord">Pseudo Discord</label>
                                                                <input type="text" name="discord" value="<?php echo $user['discord']; ?>" id="account-discord"
                                                                    class="form-control" placeholder="ex: Fortool#1366" placeholder="Identifiant Discord">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-discordid">Identifiant Discord</label>
                                                                <input type="number" placeholder="ex: 672198493359833126" name="id_discord" value="<?php echo $user['id_discord']; ?>" id="account-discordid"
                                                                    class="form-control" placeholder="Identifiant Discord">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-ytb">YouTube</label>
                                                                <input type="text" name="ytb" value="<?php echo $user['ytb']; ?>" id="account-ytb"
                                                                    class="form-control" placeholder="Lien de votre chaîne YouTube"
                                                                    >
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" name="confirm_social"
                                                                class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Enregistrer</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-notifications"
                                                role="tabpanel" aria-labelledby="account-pill-notifications"
                                                aria-expanded="false">
                                                <div class="row">
                                                    <h6 class="ml-1 mb-2">Activités</h6>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input type="checkbox" class="switchery" data-size="sm"
                                                                checked id="accountSwitch1">
                                                            <label class="ml-50" for="accountSwitch1">M'avertir quand ma commande a été réalisée</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input type="checkbox" class="switchery" data-size="sm"
                                                                checked id="accountSwitch2">
                                                            <label for="accountSwitch2" class="ml-50">M'avertir quand ma commande a été reçue</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input type="checkbox" class="switchery" data-size="sm"
                                                                id="accountSwitch2">
                                                            <label for="accountSwitch2" class="ml-50">M'avertir des nouveautés de la plateforme</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input type="checkbox" class="switchery" data-size="sm"
                                                                id="accountSwitch3">
                                                            <label for="accountSwitch3" class="ml-50">Rapport mensuel de mon compte</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="ml-1 my-2">Types de communications</h6>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input type="checkbox" class="switchery" data-size="sm"
                                                                checked id="accountSwitch4">
                                                            <label for="accountSwitch4" class="ml-50">Notifications internes</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input type="checkbox" class="switchery" data-size="sm"
                                                                id="accountSwitch5">
                                                            <label for="accountSwitch5" class="ml-50">E-mail</label>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Enregistrer</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-settings"
                                                role="tabpanel" aria-labelledby="account-pill-settings"
                                                aria-expanded="false">
                                                <div class="row">
                                                    <h6 class="ml-1 mb-2">Paramètres du site</h6>
                                                    <div class="col-12">
                                                        <fieldset class="form-group position-relative">
                                                            <label for="languages">Langues du site</label>
                                                            <select class="form-control" id="DefaultSelect">
                                                                <option selected="">Français</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input disabled type="checkbox" class="switchery" data-size="sm"
                                                                id="accountSwitch1">
                                                            <label class="ml-50" for="accountSwitch1">Mode sombre</label>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Enregistrer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- account setting page end -->
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