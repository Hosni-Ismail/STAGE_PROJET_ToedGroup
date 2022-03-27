<?php 

require "config.php";
require "../admin/fonction.php";

$chantier = get_chantier_by_id($pdo,$_GET["id"]);
$chantier = $chantier[0];

$client = get_user_by_chantier($pdo,$_GET["user"]);


$progressetude = $pdo->prepare('SELECT * FROM chantier WHERE etapes ="etudedeterrain"');
$executionIsOk2 = $progressetude->execute();
$progressetude2 = $progressetude->fetch(PDO::FETCH_ASSOC);



$progressplan = $pdo->prepare('SELECT * FROM chantier WHERE etapes ="plandeconception"');
$executionIsOk2 = $progressplan->execute();
$progressplan2 = $progressplan->fetch(PDO::FETCH_ASSOC);



$progressdevis = $pdo->prepare('SELECT * FROM chantier WHERE etapes ="devis"');
$executionIsOk2 = $progressdevis->execute();
$progressdevis2 = $progressdevis->fetch(PDO::FETCH_ASSOC);



$progressdossier = $pdo->prepare('SELECT * FROM chantier WHERE etapes ="dossier"');
$executionIsOk2 = $progressdossier->execute();
$progressdossier2 = $progressdossier->fetch(PDO::FETCH_ASSOC);

$client_id = (int)$client["id"];
$chantier_id = (int)$chantier["chantier_id"];

$commentaires = get_commentaire_by_chantier($pdo,$chantier_id);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Votre chantier</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
   
    <link rel="stylesheet" href="assets/css/Fixed-Navbar-1.css">
    <link rel="stylesheet" href="assets/css/Fixed-Navbar-2.css">
    <link rel="stylesheet" href="assets/css/Fixed-Navbar.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Navbar---App-Toolbar--LG--MD---Mobile-Nav--SM--XS-1.css">
    <link rel="stylesheet" href="assets/css/Navbar---App-Toolbar--LG--MD---Mobile-Nav--SM--XS.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/Steps-Progressbar.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
<nav class="navbar navbar-light navbar-expand-lg sticky-top shadow-lg clean-navbar" style="border-color: var(--bs-blue);background: #27747B;color: var(--bs-blue);padding: 20.2px 0px;transform: translate(0px);">
        <div class="container"><a class="navbar-brand logo" href="../../index.php" style="color: var(--bs-gray-200);font-weight: bold;padding: 5px 0px;margin: 0px;height: 50px;width: 213.238px;">TOED GROUP</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden"></span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link link-primary" href="voir_chantier.php" style="color: var(--bs-gray-100);">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../pricing.php" style="color: var(--bs-gray-100);">Demandez un chantier</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../contact.php" style="color: var(--bs-gray-100);">Contact</a></li>
                    <li class="nav-item text-uppercase border rounded" style="background: #ffffff;border-width: 1px;border-color: rgb(150,39,39);border-radius: -1px;font-family: Montserrat, sans-serif;padding: 0px;color: var(--bs-blue);"><a class="nav-link" href="../connexion/logout.php" style="background: var(--bs-white);transform: perspective(0px);filter: blur(0px);font-size: 15.8px;color: #27747B;">Se deconnecter</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div style="padding: 0px;margin: 46px;">
        <h1 class="text-center"><?= $chantier["nom_chantier"]; ?></h1>
    </div>
    <?php if($progressetude2){ ?>
    <div class="steps-progressbar" style="margin: 16px;padding: 36px;height: 140px;width: 1500px;">
        <ul>
            <li class="active">Etude de terrain</li>
            <li>Plan de conception</li>
            <li>Devis</li>
            <li>Validation du dossier</li>
            
        </ul>
    </div>
    <?php } elseif($progressplan2){ ?>
    <div class="steps-progressbar" style="margin: 16px;padding: 36px;height: 140px;width: 1500px;">
        <ul>
            <li class="previous">Etude de terrain</li>
            <li class="active">Plan de conception</li>
            <li>Devis</li>
            <li>Validation du dossier</li>
            
        </ul>
    </div>
    <?php } elseif($progressdevis2){ ?>
    <div class="steps-progressbar" style="margin: 16px;padding: 36px;height: 140px;width: 1500px;">
        <ul>
            <li class="previous">Etude de terrain</li>
            <li class="previous">Plan de conception</li>
            <li class="active">Devis</li>
            <li>Validation du dossier</li>
            
        </ul>
    </div>
    <?php } elseif($progressdossier2){ ?>
    <div class="steps-progressbar" style="margin: 16px;padding: 36px;height: 140px;width: 1500px;">
        <ul>
            <li class="previous">Etude de terrain</li>
            <li class="previous">Plan de conception</li>
            <li class="previous">Devis</li>
            <li class="active">Validation du dossier</li>
            
        </ul>
    </div>
    <?php }?>
    <div class="card">
        <div class="card-header">
            <h3>Commentaire</h3>
        </div>
        <div class="card-body" style="height:233px;">
            <ul class="list-group">
                <li class="list-group-item" style="margin-bottom:6px;">
                    <div class="d-flex media">
                        <div></div>
                        <div class="media-body">
                            <div class="d-flex media" style="overflow:visible;">
                                <div></div>
                                <div style="overflow:visible;" class="media-body">
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                        <form method="post" action ="commentaire_traitement.php">    
                                        <p><?= $client["nom"], $client["prenom"]; echo " :";?>&nbsp;&nbsp;
                                            
                                            
                                            <input class="" type="text" name="commentaire" style="width: 500px;" placeholder=""> 
                                          
                                            <input type="text" style="position:absolute; opacity:0; left:0; bottom:0;" name="id_chantier" value="<?= $chantier_id;?>">
                                            <input type="text" style ="position:absolute; opacity:0; left:0; bottom:0;" name="client_id" value="<?= $client["id"];?>">
                                           
                                          
                                            <button class=""  type="submit" name='envoi' style="background: #27747B; border-radius: 5px; width: 150px; color: white;">Envoyer</button> <br></div> 
<!--<small class="text-muted">Août 6, 2016 10H35</small></p>!-->
    </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

        <div class="card-body" style="height:233px;">
            <ul class="list-group">
                <li class="list-group-item" style="margin-bottom:6px;">
                    <div class="d-flex media">
                        <div></div>
                        <div class="media-body">
                            <div class="d-flex media" style="overflow:visible;">
                                <div></div>
                                <div style="overflow:visible;" class="media-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php 
                                            
                                            
                                            
                                             foreach($commentaires as $commentaire){
                                            ?>
                                            <p><?= $client["name"]; echo " :";?>&nbsp;<?php echo $commentaire['text_commentaire']; ?><br>
                                                <?php 
                                            }
                                            ?>


</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>