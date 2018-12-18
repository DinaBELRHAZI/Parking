<?php
require dirname(__FILE__).'/../model/moncomptemodel.php';

if(monCompte()){
    $reponse = monCompte();
    $id_u = $reponse['id_u'];
    $nom = $reponse['nom'];
    $prenom = $reponse['prenom'];
    $email = $reponse['email'];
    $password = $reponse['password'];
}

if(!empty($_POST)){
    $id_u = $_SESSION['id_u'];

    $postedInfos['nom'] = htmlentities(trim($_POST['nom']));
    $postedInfos['prenom'] = htmlentities(trim($_POST['prenom']));
    $postedInfos['email'] = htmlentities(trim($_POST['email']));
	
    if(!empty($_POST['pw']))
		$postedInfos['pw'] = htmlentities(sha1($_POST['pw']));
	else
		$postedInfos['pw']="";
	
    $myInfos['nom'] = $nom;
    $myInfos['prenom'] = $prenom;
    $myInfos['email'] = $email;
    $myInfos['password'] = $password;
    modifUser($id_u, $myInfos, $postedInfos);
    //echo"modifUser($id_u, $myInfos, $postedInfos)";
}

$reponse2 = place();
    if(!empty($reponse2)){
        $placefileattente = $reponse2['placefileattente'];
        $numeroplace = $reponse2['numeroplace'];
        $datefin = $reponse2['datefin'];
    }
 
