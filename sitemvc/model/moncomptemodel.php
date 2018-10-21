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
        
        return $reponse;
    } 
    
}

function modifUser(){
    global $bdd;
    if(isset($_POST['submit'])){

        $nom = htmlentities(trim($_POST['nom']));
        $prenom = htmlentities(trim($_POST['prenom']));
        $email = htmlentities(trim($_POST['email']));
        $password = htmlentities(trim($_POST['password']));

        $id_u = $_GET['id_u'];
        $requete = $bdd->query ("UPDATE parking SET nom='".$nom."', prenom='".$prenom."', email='".$email."' WHERE id_u='".$id_u."'");
        $reponse = $requete->fetch();
        
    }

}