<?php


require "config.php";



if(isset($_GET["chantier_id"])){


    $id = $_GET["chantier_id"];
    delete_chantierById($pdo,$id);
    header("Location: all_chantier.php?delete_status=success");

}

$pdoStat2 = $pdo->prepare('SELECT * FROM chantier INNER JOIN users ON users.id = chantier.user_id WHERE statut ="Terminer" ORDER BY nom_chantier ASC');

$executionIsOk2 = $pdoStat2->execute();

$contacts2 = $pdoStat2->fetchAll(PDO::FETCH_ASSOC);


?>
 



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Lista-Productos-Canito.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search-1.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
</head>

<body>
    <style>
        .notif{
            z-index : 200000 !important;
            position: absolute;
            left : 35%;
            top : 20px;
            background-color : rgba(0,0,0,.9);
            padding : 5px;
            border-radius : 4px;
            box-shadow : 0px 10px 10px rgba(0,0,0,.02);
            color : white;
            
        }
    </style>
    <?php if(isset($_GET["delete_status"])){ ?>
    <div class="notif">
        <p>Chantier supprimé</p>
    </div>
    <?php } ?>
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: var(--bs-indigo);">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-house-door-fill">
                            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"></path>
                        </svg></div>
                    <div class="sidebar-brand-text mx-3"><span>TOEDGROUP</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-truck-monster"></i><span>Chantier</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="list_client.php"><i class="fas fa-table"></i><span>Client</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="submit"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">Admin</span></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Liste des chantiers</h3>
                    </div>
                </div>
                <div class="col-md-12 search-table-col">
                    <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Rechercher"></div><span class="counter pull-right"></span>
                    <div class="table-responsive table table-hover table-bordered results">
                        <table class="table table-hover table-bordered">
                            <thead class="bill-header cs">
                                <tr>
                                    <th id="trs-hd-1" class="col-lg-1">Id</th>
                                    <th id="trs-hd-2" class="col-lg-2">Nom du chantier</th>
                                    <th id="trs-hd-3" class="col-lg-2">Ville</th>
                                    <th id="trs-hd-4" class="col-lg-2">Nom du client</th>
                                    <th id="trs-hd-5" class="col-lg-2">Date</th>
                                    <th id="trs-hd-5" class="col-lg-2">Statut</th>
                                    <th id="trs-hd-6" class="col-lg-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="warning no-result">
                                    <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                                </tr>
                                <tr>
                                <?php foreach ($contacts2 as $contact2) : ?>
                                    <td><?= $contact2['chantier_id']?></td>
                                    <td><?= $contact2['nom_chantier']?></td>
                                    <td><?= $contact2['ville_chantier']?></td>
                                    <td><?= $contact2['name']?></td>
                                    <td><?= $contact2['date_c']?></td>
                                    <td><?= $contact2['statut']?></td>
                                    <td>
                                        <input type="hidden" name="chantier_modif">
                                      
                                    <a href="etapes_chantier2.php?id=<?php echo $contact2['chantier_id'];?>"><button class="btn btn-success" style="margin-left: 5px;" type=""><i class="fa fa-edit" style="font-size: 15px;"></i></button>
                               
                                    <form method="get">
                                    <input type="hidden" name="chantier_id" value = "<?= $contact2['chantier_id']?>">
                                    <button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>

                                </form>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © TOEDGROUP 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>