<?php
    //Ce modèle permet de se connecter à la base de données, il faudra l'appeler à chaque fois que vous voulez faire une requete dans le modele.
    $hostname = "127.0.0.1";    
    $base= "xxxnugss_login";
    $port = "3306";           
    $loginBD= "xxxnugss_hosni";    
    $passBD="C94GrZjbKcpAwV";  
try {

    $pdo = new PDO ("mysql:host=$hostname;port=$port;dbname=$base", "$loginBD", "$passBD",
    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)
    );
    //die('OK connexion');
}

catch (PDOException $e) {
    die  ("Echec de connexion : " . utf8_encode($e->getMessage()) . "\n");
}

require 'fonction.php';

?>