<?php
session_start();
include('../includes/config.php');
if(isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    $euro = $user['solde']*0.03/10;
    $somme = $bdd->query("SELECT SUM(solde)
        FROM users");
    $res = $bdd->query('select count(*) as nb from users');
    $data = $res->fetch();
    $nb = $data['nb'];
    if($user['admin'] == 1) {
        $orders = $bdd->query('SELECT * FROM orders WHERE status = 0 ORDER BY id LIMIT 5');
        $tickets = $bdd->query('SELECT * FROM tickets WHERE status = 0 ORDER BY id LIMIT 5');
?>
<!DOCTYPE html>

<html class="app-ui">

    <head>
        <!-- Meta -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <!-- Document title -->
        <title>Fortool &ndash; Administration</title>

        <meta name="description" content="Panneau d'administration de Fortool" />
        <meta name="author" content="Fortool Group" />
        <meta name="robots" content="noindex, nofollow" />

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="assets/img/favicons/circleo.png" />
        <link rel="icon" href="assets/img/favicons/favicon_site.ico" />

        <!-- Google fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,900%7CRoboto+Slab:300,400%7CRoboto+Mono:400" />

        <!-- AppUI CSS stylesheets -->
        <link rel="stylesheet" id="css-font-awesome" href="assets/css/font-awesome.css" />
        <link rel="stylesheet" id="css-ionicons" href="assets/css/ionicons.css" />
        <script src="https://kit.fontawesome.com/7a293f3dad.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" id="css-bootstrap" href="assets/css/bootstrap.css" />
        <link rel="stylesheet" id="css-app" href="assets/css/app.css" />
        <link rel="stylesheet" id="css-app-custom" href="assets/css/app-custom.css" />
        <!-- End Stylesheets -->
    </head>

    <body class="app-ui layout-has-drawer layout-has-fixed-header">
        <div class="app-layout-canvas">
            <div class="app-layout-container">

                <!-- Drawer -->
                <aside class="app-layout-drawer">

                    <!-- Drawer scroll area -->
                    <div class="app-layout-drawer-scroll">
                        <!-- Drawer logo -->
                        <div id="logo" class="drawer-header">
                            <a href="index.html"><img class="img-responsive" src="assets/img/logo/new_logo.png" style="margin-left: auto;margin-right: auto;margin-top: 20px;width: 70%; height: 50%;" title="Fortool" alt="Fortool" /></a>
                        </div>

                        <!-- Drawer navigation -->
                        <nav class="drawer-main">
                            <ul class="nav nav-drawer">

                                <li class="nav-item nav-drawer-header">Administration</li>

                                <li class="nav-item active">
                                    <a href=""><i class="ion-ios-speedometer-outline"></i> Tableau de bord</a>
                                </li>


                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="ion-ios-people-outline"></i> Utilisateurs</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="users/">Voir tout</a>
                                        </li>

                                        <li>
                                            <a href="users/bans.php">Bannisements</a>
                                        </li>

                                        <li>
                                            <a href="users/add.php">Ajouter</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="ion-ios-star-outline"></i> R??les</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="roles/">Voir tout</a>
                                        </li>

                                        <li>
                                            <a href="roles/add.php">Ajouter</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item nav-drawer-header">Gagner</li>

                                <li class="nav-item">
                                    <a href="tipeeestream/"><i class="ion-ios-videocam-outline"></i> Tipeeestream</a>
                                </li>

                                <li class="nav-item">
                                    <a href="utip/"><i class="ion-ios-videocam-outline"></i> uTip</a>
                                </li>

                                <li class="nav-item">
                                    <a href="offerwalls/"><i class="ion-ios-list-outline"></i> Offerwalls</a>
                                </li>

                                <li class="nav-item nav-drawer-header">Mini-jeux</li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="fas fa-ticket-alt"></i> Loteries</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="loteries/">Voir tout</a>
                                        </li>

                                        <li>
                                            <a href="loteries/winners.php">Gagnants</a>
                                        </li>

                                        <li>
                                            <a href="loteries/add.php">Ajouter</a>
                                        </li>

                                    </ul>
                                </li>
                                
                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="fas fa-angle-double-up"></i> Upgrades</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="upgrades/">Voir tout</a>
                                        </li>

                                        <li>
                                            <a href="upgrades/winners.php">Gagnants</a>
                                        </li>

                                        <li>
                                            <a href="upgrades/add.php">Ajouter</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="fas fa-dharmachakra"></i> Roulette</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="wheel/">Voir tout</a>
                                        </li>

                                        <li>
                                            <a href="wheel/winners.php">Gagnants</a>
                                        </li>

                                        <li>
                                            <a href="wheel/add.php">Ajouter</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item nav-drawer-header">Boutique</li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="fas fa-gift"></i> R??compenses</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="gifts/">Voir tout</a>
                                        </li>

                                        <li>
                                            <a href="gifts/add.php">Ajouter</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="fas fa-file-invoice"></i> Commandes</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="orders/">Voir tout</a>
                                        </li>

                                        <li>
                                            <a href="orders/pending.php">En attente(s)</a>
                                        </li>

                                        <li>
                                            <a href="orders/done.php">Effectu??(s)</a>
                                        </li>

                                        <li>
                                            <a href="orders/add.php">Ajouter</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item nav-drawer-header">Support</li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="fas fa-headset"></i> Tickets</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="tickets/">Voir tout</a>
                                        </li>

                                        <li>
                                            <a href="tickets/pending.php">En attente</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="fas fa-comments"></i> Forum</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="forum/categories">Cat??gories</a>
                                        </li>

                                        <li>
                                            <a href="forum/">Topics</a>
                                        </li>

                                        <li>
                                            <a href="forum/messages.php">Messages</a>
                                        </li>
                                        

                                    </ul>
                                </li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="fas fa-question-circle"></i> FAQ</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="faq/">Voir tout</a>
                                        </li>

                                        <li>
                                            <a href="faq/add.php">Ajouter</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item nav-drawer-header">Blog</li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="fas fa-newspaper"></i> Articles</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="blog/">Voir tout</a>
                                        </li>

                                        <li>
                                            <a href="blog/articles/">Ajouter</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="fas fa-list"></i> Cat??gories</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="blog/categories/">Voir tout</a>
                                        </li>

                                        <li>
                                            <a href="blog/categories/add.php">Ajouter</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item nav-drawer-header">Param??tres</li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="fas fa-globe"></i> Site</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="/settings">Informations</a>
                                        </li>

                                        <li>
                                            <a href="/settings/payments.php">Moyens de paiements</a>
                                        </li>

                                        <li>
                                            <a href="/settings/terms.php">Conditions</a>
                                        </li>

                                        <li>
                                            <a href="/settings/translations.php">Traductions</a>
                                        </li>

                                        <li>
                                            <a href="/settings/contacts.php">Contacts</a>
                                        </li>

                                        <li>
                                            <a href="settings/maintenance.php">Maintenances</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="/logs"><i class="fas fa-history"></i> Logs</a>
                                </li>

                            </ul>
                        </nav>
                    </div>
                    <!-- End drawer scroll area -->
                </aside>
                <!-- End drawer -->

                <!-- Header -->
                <header class="app-layout-header">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar-collapse" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <button class="pull-left hidden-lg hidden-md navbar-toggle" type="button" data-toggle="layout" data-action="sidebar_toggle">
                                    <span class="sr-only">Toggle drawer</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <span class="navbar-page-title">
                                    Tableau de bord
                                </span>
                            </div>

                            <div class="collapse navbar-collapse" id="header-navbar-collapse">
                                <!-- Header search form -->
                                <form class="navbar-form navbar-left app-search-form" role="search">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input class="form-control" type="search" id="search-input" placeholder="Rechercher..." />
                                            <span class="input-group-btn">
								                <button class="btn" type="button"><i class="ion-ios-search-strong"></i></button>
							                </span>
                                        </div>
                                    </div>
                                </form>

                                <ul id="main-menu" class="nav navbar-nav navbar-left">
                                    <li class="nav-item">
                                        <a href="index.html">Mes t??ches</a>
                                    </li>
                                </ul>


                                <ul class="nav navbar-nav navbar-right navbar-toolbar hidden-sm hidden-xs">

                                    <li class="dropdown">
                                        <a href="javascript:void(0)" data-toggle="dropdown"><i class="ion-ios-bell"></i> <span class="badge">3</span></a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li class="dropdown-header">Notifications</li>
                                            <li>
                                                <a tabindex="-1" href="javascript:void(0)"><span class="badge pull-right">3</span> Tickets </a>
                                            </li>
                                            <li>
                                                <a tabindex="-1" href="javascript:void(0)"><span class="badge pull-right">1</span> Messages </a>
                                            </li>
                                            <li>
                                                <a tabindex="-1" href="javascript:void(0)"><span class="badge pull-right">1</span> T??ches </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="dropdown dropdown-profile">
                                        <a href="javascript:void(0)" data-toggle="dropdown">
                                            <span class="m-r-sm"><?php echo $user['prenom']; ?> <span class="caret"></span></span>
                                            <img class="img-avatar img-avatar-48" src="assets/img/avatars/avatar3.jpg" alt="User profile pic" />
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li class="dropdown-header">
                                                Profil
                                            </li>
                                            <li>
                                                <a href="base_pages_profile.html">Mon profil</a>
                                            </li>
                                            <li>
                                                <a href="base_pages_profile.html">Historique</a>
                                            </li>
                                            <li>
                                                <a href="../account/logout.php">Se d??connecter</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- .navbar-right -->
                            </div>
                        </div>
                        <!-- .container-fluid -->
                    </nav>
                    <!-- .navbar-default -->
                </header>
                <!-- End header -->

                <main class="app-layout-content">

                    <!-- Page Content -->
                    <div class="container-fluid p-y-md">
                        <div class="row">
                            
                            <div class="col-sm-6 col-lg-3">
                                <a class="card" href="javascript:void(0)">
                                    <div class="card-block clearfix">
                                        <div class="pull-right">
                                            <p class="h6 text-muted m-t-0 m-b-xs">Revenues estim??es</p>
                                            <p class="h3 text-blue m-t-sm m-b-0">
                                                <?php
                                                    while($s = $somme->fetch()){
                                                        echo $s[0]*0.03/10;
                                                    }
                                                ?> ???
                                            </p>
                                        </div>
                                        <div class="pull-left m-r">
                                            <span class="img-avatar img-avatar-48 bg-inverse" style="background-color: #F76700;"><i class="fas fa-wallet"></i></span>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-sm-6 col-lg-3">
                                <a class="card" href="javascript:void(0)">
                                    <div class="card-block clearfix">
                                        <div class="pull-right">
                                            <p class="h6 text-muted m-t-0 m-b-xs">Utilisateurs total</p>
                                            <p class="h3 text-blue m-t-sm m-b-0"><?php echo $nb; ?></p>
                                        </div>
                                        <div class="pull-left m-r">
                                            <span class="img-avatar img-avatar-48 bg-inverse" style="background-color: #F76700;"><i class="ion-ios-people fa-1-5x"></i></span>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            

                            <div class="col-sm-6 col-lg-3">
                                <a class="card" href="javascript:void(0)">
                                    <div class="card-block clearfix">
                                        <div class="pull-right">
                                            <p class="h6 text-muted m-t-0 m-b-xs">Commandes</p>
                                            <p class="h3 text-blue m-t-sm m-b-0">0</p>
                                        </div>
                                        <div class="pull-left m-r">
                                            <span class="img-avatar img-avatar-48 bg-inverse" style="background-color: #F76700;"><i class="fas fa-file-invoice" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-sm-6 col-lg-3">
                                <a class="card" href="javascript:void(0)">
                                    <div class="card-block clearfix">
                                        <div class="pull-right">
                                            <p class="h6 text-muted m-t-0 m-b-xs">Tickets</p>
                                            <p class="h3 text-blue m-t-sm m-b-0">0</p>
                                        </div>
                                        <div class="pull-left m-r">
                                            <span class="img-avatar img-avatar-48 bg-inverse" style="background-color: #F76700;"><i class="fas fa-headset"></i></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Trafic -->
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-success">
                                        <h4>Traffic du site</h4>
                                        <ul class="card-actions">
                                            <li>
                                                <button type="button"><i class="fas fa-angle-right"></i></button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-block">
                                        <p>Card's content..</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6 col-lg-6">
                                <div class="card">
                                    <div class="card-header bg-success">
                                        <h4>Tickets r??cents</h4>
                                        <ul class="card-actions">
                                            <li>
                                                <button type="button"><i class="fas fa-angle-right"></i></button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-block">
                                        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer table-responsive">
                                            <table class="table table-hover table-striped table-responsive table-vcenter">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Auteur</th>
                                                        <th scope="col">Objet</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php while($t = $tickets->fetch()) { ?>
                                                    <?php 
                                                        $phpdate2 = strtotime($t['date_creation']);
                                                        $t['date_creation'] = date('d/m/Y', $phpdate2 ); 
                                                    ?>  
                                                    <tr>
                                                        <th scope="row"><?php echo $t['id_ticket'] ?></th>
                                                        <th scope="row"><?php echo $t['date_creation'] ?></th>
                                                        <td><?php echo $t['auteur'] ?></td>
                                                        <td><?php echo $t['objet'] ?></td>
                                                        <td style="text-align: center;"><a target="__blank" href="../help/ticket/index.php?id=<?php echo $t['id_ticket']; ?>" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Voir"><i class="fas fa-eye"></i></a></td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6">
                                <div class="card">
                                    <div class="card-header bg-success">
                                        <h4>Commandes r??centes</h4>
                                        <ul class="card-actions">
                                            <li>
                                                <a href="/admin/orders" type="button"><i class="fas fa-angle-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-block">
                                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer table-responsive">
                                        <table class="table table-hover table-striped table-responsive table-vcenter">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Identifiant</th>
                                                    <th scope="col">Nom</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php while($o = $orders->fetch()) { ?>
                                                <?php 
                                                    $phpdate2 = strtotime($o['date']);
                                                    $o['date'] = date( 'd/m/Y', $phpdate2 ); 
                                                ?>  
                                                <tr>
                                                    <th scope="row"><?php echo $o['ref'] ?></th>
                                                    <td><?php echo $o['date'] ?></td>
                                                    <td><?php echo $o['pseudo'] ?></td>
                                                    <td><?php echo $o['name'] ?></td>
                                                    <td style="text-align: center;"><a href="orders/pending.php" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Voir"><i class="fas fa-eye"></i></a></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-lg-6">
                                <div class="card">
                                    <div class="card-header bg-success">
                                        <h4>Derniers gagnants</h4>
                                        <ul class="card-actions">
                                            <li>
                                                <button type="button"><i class="fas fa-angle-right"></i></button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-block">
                                        <p>Derni??res commandes</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6">
                                <div class="card">
                                    <div class="card-header bg-success">
                                        <h4>Cr??ditations r??centes</h4>
                                        <ul class="card-actions">
                                            <li>
                                                <button type="button"><i class="fas fa-angle-right"></i></button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-block">
                                        <p>Derni??res commandes</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header bg-success">
                                        <h4>Derniers topics</h4>
                                        <ul class="card-actions">
                                            <li>
                                                <button type="button"><i class="fas fa-angle-right"></i></button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-block">
                                        <p>Derni??res commandes</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header bg-success">
                                        <h4>Derni??res connexions</h4>
                                        <ul class="card-actions">
                                            <li>
                                                <button type="button"><i class="fas fa-angle-right"></i></button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-block">
                                        <p>Derni??res commandes</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End Page Content -->

                </main>

            </div>
            <!-- .app-layout-container -->
        </div>
        <!-- .app-layout-canvas -->

        <div class="app-ui-mask-modal"></div>

        <!-- AppUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock and App.js -->
        <script src="assets/js/core/jquery.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <script src="assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="assets/js/core/jquery.placeholder.min.js"></script>
        <script src="assets/js/app.js"></script>
        <script src="assets/js/app-custom.js"></script>
    </body>

</html>
<?php
} else {
    header('Location: ../home.php');
}
} else {
    header('Location: ../home.php');
}
?>