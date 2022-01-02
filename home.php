<?php
ini_set('display_errors', 'off');
session_start();
include('includes/config.php');
if (isset($_SESSION['id'])) {
  $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
  $requser->execute(array($_SESSION['id']));
  $user = $requser->fetch();
  $euro = $user['solde'] * 0.03 / 10;
  $pub = rand(0, 1);
  $pseudo = $user['pseudo'];
  // Comptage du nombre de commandes de l'utilisateur
  $res = $bdd->query("select count(*) as nb from orders WHERE pseudo = '$pseudo'");
  $data = $res->fetch();
  $nb = $data['nb'];
  // Comptage du nombre de tâches réalisées
  $tr = $bdd->query("select count(*) as nbtr from activity WHERE pseudo = '$pseudo'");
  $datatr = $tr->fetch();
  $nbtr = $datatr['nbtr'];
  // Comptage des parrains
  $parrainages = $bdd->prepare('SELECT id FROM users WHERE id_parrain = ?');
  $parrainages->execute(array($_SESSION['id']));
  $parrainages = $parrainages->rowCount();
  ////////////////////////////////////////
  $orders = $bdd->query('SELECT * FROM orders ORDER BY date DESC LIMIT 5');
  $activity = $bdd->query('SELECT * FROM activity ORDER BY activity_date DESC LIMIT 5');
  // AdscendMedia API
  $json = file_get_contents("http://adscendmedia.com/adwall/api/publisher/115180/profile/16970/offers.json?subid1=" . $user['id'] . "&limit=5");
  $data = array();
  $data = json_decode($json, true);

  if(!$user['uniqid']) {
    $insertmail = $bdd->prepare("UPDATE users SET uniqid = ? WHERE id = ?");
    $insertmail->execute(array(uniqid(), $_SESSION['id']));
  }
?>
  <!DOCTYPE html>
  <html class="loading" lang="fr" data-textdirection="ltr">
  <!-- BEGIN: Head-->

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Gagnez une multitude de récompenses, argents, bons d'achats et bien plus en quelques clics à travers différents moyens de rémunérations innovants (sondages, vidéos, offerwalls...) !">
    <meta name="keywords" content="fortool, money, rewards, surveys, videos">
    <meta name="author" content="Fortool Technologies">
    <title>Fortool</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/circleo.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/card-statistics.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/vertical-timeline.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: FAI -->
    <script src="https://kit.fontawesome.com/7a293f3dad.js" crossorigin="anonymous"></script>
    <script async type="application/javascript" src="//ad.bitmedia.io/js/adbybm.js/5e735e747f1e6dca71540ac6"></script>
    <!-- END: FAI -->

    <!-- AntiAdblock -->
    <style>
      #jb65 {
        position: fixed !important;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #fff;
        opacity: 0.9;
        filter: alpha(opacity=90);
        display: block
      }

      #jb65 p {
        opacity: 1;
        filter: none;
        font: bold 16px Verdana, Arial, sans-serif;
        text-align: center;
        margin: 20% 0
      }

      #jb65 p a,
      #jb65 p i {
        font-size: 12px
      }

      #jb65~* {
        display: none
      }
    </style>
    <noscript>
      <strong id=jb65>
        <p>S'il vous plaît activer JavaScript!</p>
      </strong>
    </noscript>
    <script>
      (function(w, u) {
        var d = w.document,
          z = typeof u;

        function jb65() {
          function c(c, i) {
            var e = d.createElement('strong'),
              b = d.body,
              s = b.style,
              l = b.childNodes.length;
            if (typeof i != z) {
              e.setAttribute('id', i);
              s.margin = s.padding = 0;
              s.height = '100%';
              l = Math.floor(Math.random() * l) + 1
            }
            e.innerHTML = c;
            b.insertBefore(e, b.childNodes[l - 1])
          }

          function g(i, t) {
            return !t ? d.getElementById(i) : d.getElementsByTagName(t)
          };

          function f(v) {
            if (!g('jb65')) {
              c('<p>Désactiver votre bloqueur de publicité pour continuer à utiliser Fortool 😃<br>En acceptant la diffusion de publicités vous soutenez le développement de la plateforme 👏<br><br>Aucun abus promis 🤞</p>', 'jb65')
            }
          };
          (function() {
            var a = ['ad-box-second', 'addiv-bottom', 'adlinks', 'adzoneheader', 'divBottomad1', 'global_header_ad_area', 'qm-ad-sky', 'ad', 'ads', 'adsense'],
              l = a.length,
              i, s = '',
              e;
            for (i = 0; i < l; i++) {
              if (!g(a[i])) {
                s += '<a id="' + a[i] + '"></a>'
              }
            }
            c(s);
            l = a.length;
            setTimeout(function() {
              for (i = 0; i < l; i++) {
                e = g(a[i]);
                if (e.offsetParent == null || (w.getComputedStyle ? d.defaultView.getComputedStyle(e, null).getPropertyValue('display') : e.currentStyle.display) == 'none') {
                  return f('#' + a[i])
                }
              }
            }, 250)
          }());
          (function() {
            var t = g(0, 'img'),
              a = ['/ad-local.', '/ad_agency/ad', '/ad_jnaught/ad', '/adruptive.', '/external/ad.', '/satnetgoogleads.', '/squaread.', '/x5advcorner.', '_ad_code.', '_adbreak.'],
              i;
            if (typeof t[0] != z && typeof t[0].src != z) {
              i = new Image();
              i.onload = function() {
                this.onload = z;
                this.onerror = function() {
                  f(this.src)
                };
                this.src = t[0].src + '#' + a.join('')
              };
              i.src = t[0].src
            }
          }());
          (function() {
            var o = {
                'http://pagead2.googlesyndication.com/pagead/show_ads.js': 'google_ad_client',
                'http://js.adscale.de/getads.js': 'adscale_slot_id',
                'http://get.mirando.de/mirando.js': 'adPlaceId'
              },
              S = g(0, 'script'),
              l = S.length - 1,
              n, r, i, v, s;
            d.write = null;
            for (i = l; i >= 0; --i) {
              s = S[i];
              if (typeof o[s.src] != z) {
                n = d.createElement('script');
                n.type = 'text/javascript';
                n.src = s.src;
                v = o[s.src];
                w[v] = u;
                r = S[0];
                n.onload = n.onreadystatechange = function() {
                  if (typeof w[v] == z && (!this.readyState || this.readyState === "loaded" || this.readyState === "complete")) {
                    n.onload = n.onreadystatechange = null;
                    r.parentNode.removeChild(n);
                    w[v] = null
                  }
                };
                r.parentNode.insertBefore(n, r);
                setTimeout(function() {
                  if (w[v] === u) {
                    f(n.src)
                  }
                }, 2000);
                break
              }
            }
          }())
        }
        if (d.addEventListener) {
          w.addEventListener('load', jb65, false)
        } else {
          w.attachEvent('onload', jb65)
        }
      })(window);
    </script>
    <!-- -->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->

  <body class="horizontal-layout horizontal-menu 2-columns  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-static-top navbar-dark bg-gradient-x-grey-blue navbar-border navbar-brand-center">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto">
              <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                <i class="fas fa-2x fa-bars"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="navbar-brand" href="home.php">
                <img class="brand-logo" width="120" src="app-assets/images/logo/new_logo.png">
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
                  <img width="20" src="app-assets/images/logo/circleo.png">&nbsp;&nbsp;
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
                  <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Voir toutes les notifications</a></li>
                </ul>
              </li>
              <li class="dropdown dropdown-user nav-item">
                <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="app-assets/images/logo/circleo.png" alt="avatar"><i></i>
                  </div>
                  <span class="user-name"><?php echo $user['pseudo']; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <?php if ($user['admin'] == 1) { ?>
                    <a class="dropdown-item" href="admin">
                      <i class="fas fa-user-shield"></i> Administration
                    </a>
                  <?php } ?>
                  <a class="dropdown-item" href="settings">
                    <i class="fas fa-user"></i> Profil
                  </a>
                  <a class="dropdown-item" href="activity">
                    <i class="fas fa-history"></i> Activités
                  </a>
                  <a class="dropdown-item" href="orders">
                    <i class="fas fa-receipt"></i> Commandes
                  </a>
                  <a class="dropdown-item" href="sponsorship">
                    <i class="fas fa-users"></i> Parrainage
                  </a>
                  <a class="dropdown-item" href="settings">
                    <i class="fas fa-cog"></i> Paramètres
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="account/logout.php">
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
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
      <!-- Horizontal menu content-->
      <div class="navbar-container main-menu-content" data-menu="menu-container">
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
          <li class="nav-item active">
            <a class="nav-link" href="home.php">
              <i class="fas fa-home"></i>
              <span data-i18n="Dashboard">
                Vue d'ensemble
              </span>
            </a>
          </li>
          <li class="dropdown nav-item" data-menu="dropdown">
            <a class="nav-link" href="earn">
              <i class="fas fa-dollar-sign"></i>
              <span data-i18n="Templates">Gagner</span>
            </a>
            <ul class="dropdown-menu">
              <li data-menu="">
                <a class="dropdown-item" href="earn/surveys" data-i18n="Surveys" data-toggle="dropdown">
                  Sondages
                </a>
              </li>
              <li data-menu="">
                <a class="dropdown-item" href="earn/registrations" data-i18n="Registrations" data-toggle="dropdown">
                  Inscriptions
                </a>
              </li>
              <li data-menu="">
                <a class="dropdown-item" href="earn/videos" data-i18n="Videos" data-toggle="dropdown">
                  Vidéos
                </a>
              </li>
              <li data-menu="">
                <a class="dropdown-item" href="earn/offerwalls" data-i18n="OfferWalls" data-toggle="dropdown">
                  OfferWalls
                </a>
              </li>
            </ul>
          </li>
          <li class="dropdown nav-item" data-menu="dropdown">
            <a class="nav-link" href="shop">
              <i class="fas fa-shopping-cart"></i>
              <span data-i18n="Layouts">Boutique</span>
            </a>
            <ul class="dropdown-menu">
              <li data-menu="">
                <a class="dropdown-item" href="shop/money" data-i18n="PayPal" data-toggle="dropdown">
                  PayPal
                </a>
              </li>
              <li data-menu="">
                <a class="dropdown-item" href="shop/cryptocurrencies" data-i18n="Cryptocurrencies" data-toggle="dropdown">
                  Cryptomonnaies
                </a>
              </li>
              <li data-menu="">
                <a class="dropdown-item" href="shop/subscriptions" data-i18n="Subscriptions" data-toggle="dropdown">
                  Abonnements
                </a>
              </li>
              <li data-menu="">
                <a class="dropdown-item" href="shop/gc" data-i18n="Gifts Cards" data-toggle="dropdown">
                  Cartes cadeaux
                </a>
              </li>
              <li data-menu="">
                <a class="dropdown-item" href="shop/games" data-i18n="Games" data-toggle="dropdown">
                  Jeux
                </a>
              </li>
            </ul>
          </li>
          <li class="dropdown nav-item" data-menu="dropdown">
            <a class="nav-link" href="sponsorship">
              <i class="fas fa-users"></i>
              <span data-i18n="Apps">Parrainage</span>
            </a>
            <ul class="dropdown-menu">
              <li data-menu="">
                <a class="dropdown-item" href="sponsorship" data-i18n="Invite" data-toggle="dropdown">
                  Inviter
                </a>
              </li>
              <li data-menu="">
                <a class="dropdown-item" href="sponsorship/referrals.php" data-i18n="Referrals" data-toggle="dropdown">
                  Mes filleuls
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="leaderboard">
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
                <a class="dropdown-item" href="help" data-i18n="Tickets" data-toggle="dropdown">
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
        </div>
        <div class="content-body">
          <!-- Grouped multiple cards for statistics starts here -->
          <div class="row grouped-multiple-statistics-card">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-6 col-xl-3 col-sm-6 col-12">
                      <div class="d-flex align-items-start mb-sm-1 mb-xl-0 border-right-blue-grey border-right-lighten-5">
                        <span class="card-icon warning d-flex justify-content-center mr-3">
                          <i class="p-1 fas fa-coins customize-icon font-large-2 p-1"></i>
                        </span>
                        <div class="stats-amount mr-3">
                          <h3 class="heading-text text-bold-600"><?php echo $user['solde']; ?> FT</h3>
                          <p class="sub-heading">Solde (en fortcoins)</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 col-sm-6 col-12">
                      <div class="d-flex align-items-start mb-sm-1 mb-xl-0 border-right-blue-grey border-right-lighten-5">
                        <span class="card-icon warning d-flex justify-content-center mr-3">
                          <i class="p-1 fas fa-shopping-cart customize-icon font-large-2 p-1"></i>
                        </span>
                        <div class="stats-amount mr-3">
                          <h3 class="heading-text text-bold-600">
                            <?php
                            echo $nb;
                            ?>
                          </h3>
                          <p class="sub-heading">Commande(s)</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 col-sm-6 col-12">
                      <div class="d-flex align-items-start border-right-blue-grey border-right-lighten-5">
                        <span class="card-icon warning d-flex justify-content-center mr-3">
                          <i class="p-1 fas fa-users customize-icon font-large-2 p-1"></i>
                        </span>
                        <div class="stats-amount mr-3">
                          <h3 class="heading-text text-bold-600"><?php echo $parrainages; ?></h3>
                          <p class="sub-heading">Filleul(s)</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 col-sm-6 col-12">
                      <div class="d-flex align-items-start">
                        <span class="card-icon warning d-flex justify-content-center mr-3">
                          <i class="p-1 fas fa-hourglass-half customize-icon font-large-2 p-1"></i>
                        </span>
                        <div class="stats-amount mr-3">
                          <h3 class="heading-text text-bold-600"><?php echo $nbtr; ?></h3>
                          <p class="sub-heading">Tâches réalisées</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Grouped multiple cards for statistics ends here -->

          <!-- 2eme ligne -->
          <div class="row">
            <!-- Activités récentes -->
            <div class="col-md-6 col-sm-12">
              <div class="card">
                <div class="card-header card-head-inverse bg-warning bg-darken-4">
                  <h4 class="card-title">Activités récentes</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a href="activity"><i class="fas fa-angle-right"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <table class="table table-borderless table-hover">
                      <thead>
                        <tr>
                          <th scope="col">REF</th>
                          <th scope="col">Date</th>
                          <th scope="col">Nom</th>
                          <th scope="col">Gains</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while ($a = $activity->fetch()) {
                          if ($user['pseudo'] == $a['pseudo']) {
                        ?>
                            <tr>
                              <td class="align-middle">
                                <span class="text-truncate"><?php echo $a['ref']; ?></span>
                              </td>
                              <td class="align-middle">
                                <span>
                                  <?php
                                    $phpdate3 = strtotime($a['activity_date']);
                                    $a['activity_date'] = date('d/m/Y H:m:s', $phpdate3);
                                    echo $a['activity_date'];
                                  ?>
                                </span>
                              </td>
                              <td class="align-right">
                                <span><?php echo $a['name']; ?></span>
                              </td>
                              <td class="align-right">
                                <span style="color: green;">+<?php echo $a['earning']; ?> Fortcoins</span>
                              </td>
                            </tr>
                        <?php }
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- FIN: Activités récentes -->
            <!-- Activités récentes -->
            <div class="col-md-6 col-sm-12">
              <div class="card">
                <div class="card-header card-head-inverse bg-warning bg-darken-4">
                  <h4 class="card-title">Tâches recommandés</h4>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <p class="card-text">
                      <table class="table table-borderless table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Gains</th>
                            <th scope="col">Voir</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach ($data["offers"] as $pc) {
                          ?>
                            <tr>
                              <td class="align-middle">
                                <span class="text-truncate"><?php echo date('d/m/Y'); ?></span>
                              </td>
                              <td class="align-middle">
                                <span><?php echo $pc["name"]; ?></span>
                              </td>
                              <td class="align-right">
                                <span><?php echo $pc["currency_count"]; ?> Fortcoins</span>
                              </td>
                              <td>
                                <span>
                                  <a target="__blank" href="<?php echo $pc["click_url"]; ?>" type="button" class="btn btn-icon white bg-primary btn-sm">
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                  </a>
                                </span>
                              </td>
                            </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                      </table>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <!-- FIN: Activités récentes -->
          </div>
          <!-- FIN: Seconde ligne -->
          <div class="row">
            <!-- -->
            <div class="col-md-8 col-sm-12">
              <div class="card">
                <div class="card-header card-head-inverse bg-warning bg-darken-4">
                  <h4 class="card-title">Dernières commandes</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a href="orders"><i class="fas fa-angle-right"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <table class="table table-borderless table-hover">
                      <thead>
                        <tr>
                          <th scope="col">REF</th>
                          <th scope="col">Date</th>
                          <th scope="col">Nom</th>
                          <th scope="col">Tarif</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while ($o = $orders->fetch()) {
                          if ($user['pseudo'] == $o['pseudo']) {
                        ?>
                            <tr>
                              <td class="align-middle">
                                <span class="text-truncate"><?php echo $o['ref'] ?></span>
                              </td>
                              <td class="align-middle">
                                <span>
                                  <?php
                                  $phpdate = strtotime($o['date']);
                                  $o['date'] = date('d/m/Y', $phpdate);
                                  echo $o['date'];
                                  ?>
                                </span>
                              </td>
                              <td class="align-right">
                                <span><?php echo $o['name']; ?></span>
                              </td>
                              <td class="align-right">
                                <span style="color: red;">-<?php echo $o['amount']; ?> Fortcoins</span>
                              </td>
                            </tr>
                        <?php }
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- -->
            <div class="col-md-4 col-sm-12">
              <div class="card">
                <div class="card-header card-head-inverse bg-warning bg-darken-4">
                  <h4 class="card-title">Publicité</h4>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body" style="text-align: center;">
                    <ins class="arunn" data-zone-arun="2fulpw41g5"></ins><script>(function(){var a=document.createElement("script"),b=document.getElementsByTagName("script")[0]; a.src="https://d.audiencerun.com/c/2fulpw41g5?d"+(new Date).getTime()+"&r="; try{a.src+=encodeURIComponent(top.document.referrer)}catch(c){a.src+=encodeURIComponent(document.referrer)}a.type="text/javascript"; a.async=!0;b.parentNode.insertBefore(a,b)})(); </script>
                  </div>
                </div>
              </div>
            </div>
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
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
    <script src="app-assets/vendors/js/charts/apexcharts/apexcharts.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.min.js"></script>
    <script src="app-assets/js/core/app.min.js"></script>
    <script src="app-assets/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->

  </body>
  <!-- END: Body-->

  </html>
<?php
} else {
  header('Location: account/login.php');
}
?>