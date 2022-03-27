<?php

require 'config.php';


if(isset($_POST)){
    if(!empty($_POST['commentaire'])){
        $client_id = $_POST['client_id'];
        $chantier_id =$_POST['id_chantier'];
       // $dateS = $_POST['date'];
        $commentaire = htmlspecialchars($_POST['commentaire']);
        
    
   // var_dump($dateS);

   

        $insert = $pdo->prepare('INSERT INTO commentaire(client_id,chantier_id,text_commentaire) VALUES(?,?,?)');
        $insert->execute(array(intval($client_id),intval($chantier_id),$commentaire));
        header("Location: page_chantier.php?id=".$chantier_id."&user=".$client_id);
    }
    else {
        echo "Veuillez remplir tout les champs...";
    }
}



?>