<?php

require "config.php";

if(isset($_POST['updatebtn'])){

        $userid = $_GET['id'];

        $nom_chantier = htmlspecialchars($_POST['nom_chantier']);
        $type_c = htmlspecialchars($_POST['type_c']);
        $priorite = htmlspecialchars($_POST['priorite']);
        $ville_chantier = htmlspecialchars($_POST['ville_chantier']);
        $date_c = htmlspecialchars($_POST['date_c']);
        $user_id = htmlspecialchars($_POST['user_id']);
        $statut = htmlspecialchars($_POST['statut']);
        $etapes = htmlspecialchars($_POST['etapes']);

        $req = "UPDATE `chantier` SET nom_chantier=:nom_chantier, type_c=:type_c, priorite=:priorite, ville_chantier=:ville_chantier, date_c=:date_c, user_id=:user_id, statut=:statut, etapes=:etapes WHERE chantier_id=:nouvelleId";
        $query = $pdo->prepare($req);
        $query->bindParam(':nom_chantier',$nom_chantier,PDO::PARAM_STR);
        $query->bindParam(':type_c',$type_c,PDO::PARAM_STR);
        $query->bindParam(':priorite',$priorite,PDO::PARAM_STR);
        $query->bindParam(':ville_chantier', $ville_chantier,PDO::PARAM_STR);
        $query->bindParam(':date_c',$date_c,PDO::PARAM_STR);
        $query->bindParam(':user_id',$user_id,PDO::PARAM_STR);
        $query->bindParam(':statut',$statut,PDO::PARAM_STR);
        $query->bindParam(':etapes',$etapes,PDO::PARAM_STR);
        $query->bindParam(':nouvelleId',$userid,PDO::PARAM_STR);


        $query->execute(); 
}






$userid = $_GET['id'];

$req="SELECT `chantier_id`,`nom_chantier`, `type_c`, `priorite`, `ville_chantier`, `date_c`, `user_id`, `statut`, `etapes` FROM `chantier` WHERE chantier_id =:nouvelleId";
$query = $pdo->prepare($req);
$query->bindParam(':nouvelleId',$userid,PDO::PARAM_STR);
$query->execute();
$resultat=$query->fetchAll(PDO::FETCH_OBJ);

$req2="SELECT * FROM chantier INNER JOIN users ON users.id = chantier.user_id";
$query2 = $pdo->prepare($req2);
$query2->execute();
$resultat2=$query2->fetchAll(PDO::FETCH_OBJ);


$req3="SELECT * FROM users";
$query3 = $pdo->prepare($req3);

$query3->execute();
$resultat3=$query3->fetchAll(PDO::FETCH_OBJ);



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
    <link rel="stylesheet" href="assets/css/Drag-Drop-File-Input-Upload.css">
    <link rel="stylesheet" href="assets/css/Lista-Productos-Canito.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/Register-form.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search-1.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
</head>

<body>
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
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
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
                        <h3 class="text-dark mb-0">Documents sur le chantier <?php ?></h3>
                    </div>
                </div>
                <div class="files color form-group mb-3"><input type="file" multiple="" name="files"></div>
                <div class="rf-register-form">
                    <?php
                    foreach($resultat as $row)
                    {

                    ?>
                    <form class="rg-form" method="POST">
                        <h2>Modifier ce chantier</h2>
                        <div class="rf-input-container"><label> Nom du chantier </label><input class="form-control rf-input-field" type="text" name ="nom_chantier"placeholder="Nom du chantier" value="<?php echo $row->nom_chantier; ?>"></div>
                        <div class="rf-input-container"><label> Type </label><input class="form-control rf-input-field" type="text" name="type_c"placeholder="Type" value="<?php echo $row->type_c; ?>"></div>
                        <div class="rf-input-container"><label> Priorite </label><input class="form-control rf-input-field" type="text" name="priorite" placeholder="Priorite" value="<?php echo $row->priorite; ?>"></div>
                        <div class="rf-input-container"><label> Ville </label><input class="form-control rf-input-field" type="text" name="ville_chantier" placeholder="Ville" value="<?php echo $row->ville_chantier; ?>"></div>
                        <div class="rf-input-container"><label> Date de commencement </label><input class="form-control rf-input-field" type="date" name="date_c"placeholder="Date" value="<?php echo $row->date_c; ?>"></div>
                        
                        <select name="statut" value=""style="border-color: rgb(218,218,218);border-radius: 4px;color: rgb(78,77,77);">
                                    <option value="<?php echo $row->statut;?>"> <?php echo $row->statut;?></option>
                                    <option value="En cours"> En cours </option>
                                    <option value="Suspendu"> Suspendu </option>
                                    <option value="Terminer"> Terminer </option>
                                    </select>


                                    <select name="etapes" style="border-color: rgb(218,218,218);border-radius: 4px;color: rgb(78,77,77);">
                                    <option value="<?php echo $row->etapes;?>"selected=><?php echo $row->etapes;?></option>
                                    <option value="etudedeterrain">Etude de terrain</option>
                                    <option value="plandeconception">Plan de conception</option>
                                    <option value="devis">Devis</option>
                                    <option value="dossier">Validation du dossier</option>
                                    </select>

                       
                   <?php } ?>

               
<select name="user_id" style="border-color: rgb(218,218,218);border-radius: 4px;color: rgb(78,77,77);">
    
<?php
                    foreach($resultat2 as $row)
                    {
                    ?>

                                    <option value="<?php echo $row->id;?>" selected=><?php echo $row->name;?> </option>
                                    <?php } 

                                   
                                        foreach($resultat3 as $row){
                                            
                                            ?>

                                    <option value="<?php echo $row->id;?>" selected=><?php echo $row->name;?> </option>
                                        <?php

                                        }
                                    ?>
                                         
                                    </select>
                                  

                                    
                                    
                  
                </div>   <button class="btn btn-primary" type="submit" name="updatebtn" style="width: 150px;height: 42px;margin: 31px;">Valider</button>
                </form>
                <?php 
                
                $id = $_GET["id"];
          
                $user_id = get_user_id_by_chantier($pdo,$id);

           
                ?>
            <a target="blank" href="<?php echo "../espace%20client/page_chantier.php?id=".$id."&user=".$user_id."" ?>">    <button class="btn btn-primary" type="submit" name="voirchantier" style="width: 150px;height: 70px;margin: 31px;">Voir le chantier</button></a>
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

