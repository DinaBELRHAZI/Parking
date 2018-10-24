<?php

require 'model.php';

function WaitList()
{
    global $bdd;
    $requete = $bdd->query("SELECT * FROM user WHERE placefileattente > 0 ORDER BY placefileattente");
    $reponse = $requete->fetchAll();

    return $reponse;

}

function modifyWait()
{
    global $bdd;
	$listDispo = Array();
    $requete = $bdd->query("SELECT placefileattente FROM user");

    while ($res = $requete->fetch())
    {
        $listDispo[$res['placefileattente']]=$res['placefileattente'];
    }
    return $listDispo;
}

 function validformenvoyerwait()
{
    global $bdd;
    $userMod = ($_POST['idUserMod']);
    $valueMod = ($_POST['placefileattente']);
    $requete = $bdd->prepare("UPDATE user SET placefileattente = $valueMod WHERE id_u = $userMod");
    $requete->execute();
    //print_r($requete);
    
}