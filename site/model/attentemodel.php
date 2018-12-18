<?php

require 'model.php';

function wait()
{
    global $bdd;
    $id_u = $_SESSION['id_u'];
    //print_r($id_u);

    $requete = $bdd->query("SELECT placefileattente FROM user WHERE id_u = '$id_u'"); // La requete verifie si l'utilisateur est en file d'attente
    $reponse = $requete->fetch();

    return $reponse;
    
}