<?php
require 'config.php';



if(isset($_POST['envoi'])){
    if(!empty($_POST['nom_chantier']) AND !empty($_POST['type_c']) AND !empty($_POST['priorite']) AND !empty($_POST['ville_chantier']) AND !empty($_POST['date_c']) AND !empty($_POST['user_id']) AND !empty($_POST['statut']) AND !empty($_POST['etapes'])){
        $nom_chantier = htmlspecialchars($_POST['nom_chantier']);
        $type_c = htmlspecialchars($_POST['type_c']);
        $priorite = htmlspecialchars($_POST['priorite']);
        $ville_chantier = htmlspecialchars($_POST['ville_chantier']);
        $date_c = htmlspecialchars($_POST['date_c']);
        $user_id = htmlspecialchars($_POST['user_id']);
        $statut = htmlspecialchars($_POST['statut']);
        $etapes = htmlspecialchars($_POST['etapes']);
    
   

        $insert = $pdo->prepare('INSERT INTO chantier(nom_chantier,type_c,priorite,ville_chantier,date_c,user_id,statut,etapes) VALUES(?,?,?,?,?,?,?,?)');
        $insert->execute(array($nom_chantier,$type_c,$priorite,$ville_chantier,$date_c,$user_id,$statut,$etapes));
    }else {
        echo "Veuillez remplir tout les champs...";
    }
}


 
?>