<?php
session_start();
include('../../includes/config.php');
if(isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $membres = $bdd->query('SELECT * FROM bans ORDER BY id DESC LIMIT 0,5');
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
$euro = $user['solde']*0.03/10;
    if($user['admin'] == 1) {
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
        <link rel="apple-touch-icon" href="../assets/img/favicons/circleo.png" />
        <link rel="icon" href="../assets/img/favicons/favicon_site.ico" />

        <!-- Google fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,900%7CRoboto+Slab:300,400%7CRoboto+Mono:400" />

        <!-- AppUI CSS stylesheets -->
        <link rel="stylesheet" id="css-font-awesome" href="../assets/css/font-awesome.css" />
        <link rel="stylesheet" id="css-ionicons" href="../assets/css/ionicons.css" />
        <script src="https://kit.fontawesome.com/7a293f3dad.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" id="css-bootstrap" href="../assets/css/bootstrap.css" />
        <link rel="stylesheet" id="css-app" href="../assets/css/app.css" />
        <link rel="stylesheet" id="css-app-custom" href="../assets/css/app-custom.css" />
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
                            <a href="index.html"><img class="img-responsive" src="../assets/img/logo/new_logo.png" style="margin-left: auto;margin-right: auto;margin-top: 20px;width: 70%; height: 50%;" title="Fortool" alt="Fortool" /></a>
                        </div>

                        <!-- Drawer navigation -->
                        <nav class="drawer-main">
                            <ul class="nav nav-drawer">

                                <li class="nav-item nav-drawer-header">Administration</li>

                                <li class="nav-item">
                                    <a href="../"><i class="ion-ios-speedometer-outline"></i> Tableau de bord</a>
                                </li>


                                <li class="nav-item nav-item-has-subnav active open">
                                    <a href="javascript:void(0)"><i class="ion-ios-people-outline"></i> Utilisateurs</a>
                                    <ul class="nav nav-subnav">

                                        <li >
                                            <a href="index.php">Voir tout</a>
                                        </li>

                                        <li class="active">
                                            <a href="bans.php">Bannisements</a>
                                        </li>

                                        <li>
                                            <a href="add.php">Ajouter</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="ion-ios-star-outline"></i> Rôles</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="../roles/">Voir tout</a>
                                        </li>

                                        <li>
                                            <a href="../roles/add.php">Ajouter</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item nav-drawer-header">Gagner</li>

                                <li class="nav-item">
                                    <a href="../tipeeestream/"><i class="ion-ios-videocam-outline"></i> Tipeeestream</a>
                                </li>

                                <li class="nav-item">
                                    <a href="../utip/"><i class="ion-ios-videocam-outline"></i> uTip</a>
                                </li>

                                <li class="nav-item">
                                    <a href="../offerwalls/"><i class="ion-ios-list-outline"></i> Offerwalls</a>
                                </li>

                                <li class="nav-item nav-drawer-header">Mini-jeux</li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="fas fa-ticket-alt"></i> Loteries</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="../loteries/">Voir tout</a>
                                        </li>

                                        <li>
                                            <a href="../loteries/winners.php">Gagnants</a>
                                        </li>

                                        <li>
                                            <a href="../loteries/add.php">Ajouter</a>
                                        </li>

                                    </ul>
                                </li>
                                
                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="fas fa-angle-double-up"></i> Upgrades</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="../upgrades/">Voir tout</a>
                                        </li>

                                        <li>
                                            <a href="../upgrades/winners.php">Gagnants</a>
                                        </li>

                                        <li>
                                            <a href="../upgrades/add.php">Ajouter</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="fas fa-dharmachakra"></i> Roulette</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="../wheel/">Voir tout</a>
                                        </li>

                                        <li>
                                            <a href="../wheel/winners.php">Gagnants</a>
                                        </li>

                                        <li>
                                            <a href="../wheel/add.php">Ajouter</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item nav-drawer-header">Boutique</li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="fas fa-gift"></i> Récompenses</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="../gifts/">Voir tout</a>
                                        </li>

                                        <li>
                                            <a href="../gifts/add.php">Ajouter</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="fas fa-file-invoice"></i> Commandes</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="../orders/">Voir tout</a>
                                        </li>

                                        <li>
                                            <a href="../orders/pending.php">En attente(s)</a>
                                        </li>

                                        <li>
                                            <a href="../orders/done.php">Effectué(s)</a>
                                        </li>

                                        <li>
                                            <a href="../orders/add.php">Ajouter</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item nav-drawer-header">Support</li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="fas fa-headset"></i> Tickets</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="../tickets/">Voir tout</a>
                                        </li>

                                        <li>
                                            <a href="../tickets/pending.php">En attente</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="fas fa-comments"></i> Forum</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="../forum/categories">Catégories</a>
                                        </li>

                                        <li>
                                            <a href="../forum/">Topics</a>
                                        </li>

                                        <li>
                                            <a href="../forum/messages.php">Messages</a>
                                        </li>
                                        

                                    </ul>
                                </li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="fas fa-question-circle"></i> FAQ</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="../faq/">Voir tout</a>
                                        </li>

                                        <li>
                                            <a href="../faq/add.php">Ajouter</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item nav-drawer-header">Blog</li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="fas fa-newspaper"></i> Articles</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="../blog/">Voir tout</a>
                                        </li>

                                        <li>
                                            <a href="../blog/articles/">Ajouter</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="fas fa-list"></i> Catégories</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="../blog/categories/">Voir tout</a>
                                        </li>

                                        <li>
                                            <a href="../blog/categories/add.php">Ajouter</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item nav-drawer-header">Paramètres</li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="fas fa-globe"></i> Site</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="../settings/">Informations</a>
                                        </li>

                                        <li>
                                            <a href="/settings/payments.php">Moyens de paiements</a>
                                        </li>

                                        <li>
                                            <a href="../settings/terms.php">Conditions</a>
                                        </li>

                                        <li>
                                            <a href="../settings/translations.php">Traductions</a>
                                        </li>

                                        <li>
                                            <a href="../settings/contacts.php">Contacts</a>
                                        </li>

                                        <li>
                                            <a href="../settings/maintenance.php">Maintenances</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="../logs"><i class="fas fa-history"></i> Logs</a>
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
                                    Utilisateurs
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
                                        <a href="index.html">Mes tâches</a>
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
                                                <a tabindex="-1" href="javascript:void(0)"><span class="badge pull-right">1</span> Tâches </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="dropdown dropdown-profile">
                                        <a href="javascript:void(0)" data-toggle="dropdown">
                                            <span class="m-r-sm"><?php echo $user['prenom']; ?> <span class="caret"></span></span>
                                            <img class="img-avatar img-avatar-48" src="../assets/img/avatars/avatar3.jpg" alt="User profile pic" />
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
                                                <a href="../../account/logout.php">Se déconnecter</a>
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
                    <div class="card">
                            <div class="card-header">
                                <h4>Liste des utilisateurs bannis</h4>
                            </div>
                            <div class="card-block">
                                <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                                <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer table-responsive">
                                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="text-center sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" aria-sort="ascending"></th>
                                            <th class="hidden-xs sorting" tabindex="0" aria-controls="DataTables_Table_1">Date de bannissement</th>
                                            <th class="hidden-xs sorting" tabindex="0" aria-controls="DataTables_Table_1">Date de débannissement</th>
                                            <th class="hidden-xs sorting" tabindex="0" aria-controls="DataTables_Table_1">Banni par</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1">Identifiant</th>
                                            <th class="hidden-xs sorting" tabindex="0" aria-controls="DataTables_Table_1">IP</th>
                                            <th class="sorting_disabled">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($m = $membres->fetch()) { ?>
                                        <?php 
                                            $phpdate = strtotime($m['date_inscription']);
                                            $m['date_inscription'] = date( 'd/m/Y', $phpdate ); 
                                        ?>          
                                        <tr role="row" class="odd">
                                            <td class="text-center sorting_1"><?php echo $m['id'] ?></td>
                                            <td class="hidden-xs"><?php echo $m['date_inscription'] ?></td>
                                            <td class="hidden-xs"><?php echo $m['date_inscription'] ?></td>
                                            <td class="font-500"><?php echo $m['identifiant'] ?></td>
                                            <td class="font-500"><?php echo $m['identifiant'] ?></td>
                                            <td class="hidden-xs"><?php echo $_SERVER["REMOTE_ADDR"]; ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Editer"><i class="ion-edit"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Debannir"><i class="fas fa-plus-circle"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Supprimer"><i class="fas fa-trash-alt"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                            </div>
                            <!-- .card-block -->
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
        <script src="../assets/js/core/jquery.min.js"></script>
        <script src="../assets/js/core/bootstrap.min.js"></script>
        <script src="../assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="../assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="../assets/js/core/jquery.placeholder.min.js"></script>
        <script src="../assets/js/app.js"></script>
        <script src="../assets/js/app-custom.js"></script>

        <!-- Page JS Plugins -->
        <script src="../assets/js/plugins/datatables/jquery.dataTables.min.js"></script>

        <!-- Page JS Code -->
        <script src="../assets/js/pages/base_tables_datatables.js"></script>
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