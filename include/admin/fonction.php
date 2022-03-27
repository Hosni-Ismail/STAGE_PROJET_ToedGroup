<?php



function get_chantier_by_idClient($pdo,$user_id){

    $req = $pdo->prepare("SELECT * from chantier where user_id = ?");
    $req->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $req->execute(array($user_id));
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    return $result;


}
function delete_chantierById($pdo, $id){
    $req = $pdo->prepare("DELETE FROM `chantier` WHERE chantier_id = ?");
    $req->execute(array($id));
}


function get_chantier_by_id($pdo,$id){
    $req = $pdo->prepare("SELECT * from chantier where chantier_id = ?");
    $req->bindValue(':chantier_id', $id, PDO::PARAM_INT);
    $req->execute(array($id));
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}

function get_user_by_chantier($pdo,$id){ // C pas ca fdp
$req = $pdo->prepare("SELECT * FROM users where id = ?");
$req->bindValue(':id', $id, PDO::PARAM_INT);
$req->execute(array($id));
$result = $req->fetch(PDO::FETCH_ASSOC);
return $result;


}
function get_user_id_by_chantier($pdo,$id){
    $req = $pdo->prepare("SELECT * FROM chantier where chantier_id = ?");
    $req->bindValue(':chantier_id', $id, PDO::PARAM_INT);
    $req->execute(array($id));
    $result = $req->fetch(PDO::FETCH_ASSOC);
    return $result["user_id"];


}


function get_commentaire_by_chantier($pdo,$id){
    $req = $pdo->prepare("SELECT * FROM commentaire where chantier_id = ?");
    $req->bindValue(':chantier_id', $id, PDO::PARAM_INT);
    $req->execute(array($id));
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    
    
    }



?>