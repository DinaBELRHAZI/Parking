<?php

require 'model.php';

function monCompte()
{
     global $bdd;
     if(isset($_SESSION['connecte']))
    {
        $id_u = $_SESSION['id_u'];
        $requete = $bdd->query("SELECT * FROM user WHERE id_u = $id_u ");
        $reponse = $requete->fetch();
   } 
    return $reponse;
}

function updateProfilField($fieldToUpdate, $id_u, $myField, $postedField, $queryField){
    
    global $bdd;
    if($postedField != $myField && !empty($postedField)){
        if ($queryField == $postedField) {
            echo "Le champs ".$fieldToUpdate." existe déjà.<br>";
        }

        else
        {
            //echo "UPDATE user SET ".$fieldToUpdate."=:? WHERE id_u=?";
            $req = $bdd->prepare("UPDATE user SET ".$fieldToUpdate."=? WHERE id_u=?");
            $req->execute(array($postedField, $id_u));
			
            //header("refresh:5;url=?p=moncompte");
        }
    } 
}

function modifUser($id_u, $myInfos, $postedInfos){

    global $bdd;
    if(!empty($_POST)){
    
        $requete = $bdd->query( "SELECT nom, prenom, email, password FROM user WHERE id_u = '$id_u'");
        $reponse1 = $requete->fetch();

        updateProfilField('email', $id_u, $myInfos['email'], $postedInfos['email'], $reponse1['email']);
        updateProfilField('nom', $id_u, $myInfos['nom'], $postedInfos['nom'], $reponse1['nom']);
        updateProfilField('prenom', $id_u, $myInfos['prenom'], $postedInfos['prenom'], $reponse1['prenom']);
        updateProfilField('password', $id_u, $myInfos['password'], $postedInfos['pw'], $reponse1['password']);
    }  
}

function place()
{
    global $bdd;
    if(isset($_SESSION['connecte']))
    {
    $id_u = $_SESSION['id_u'];
    $requete = $bdd->query("SELECT placefileattente,numeroplace,datefin FROM place p, reserver r, user u WHERE u.id_u = $id_u AND r.id_u = u.id_u AND p.id_p = r.id_p");
    $reponse2 = $requete->fetch();
    }
    return $reponse2;
}
