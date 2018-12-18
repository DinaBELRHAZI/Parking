<?php

require 'model.php';

function PlaceList()
{
    global $bdd;
    $requete = $bdd->query("SELECT p.id_p, numeroplace, u.id_u, nom, prenom, email, datefin FROM place p, user u, reserver r WHERE u.id_u = r.id_u AND p.id_p = r.id_p");
    $reponse = $requete->fetchAll();

    return $reponse;

}

function addPlace()
{
    global $bdd;
    $requete = $bdd->prepare("INSERT INTO place( numeroplace ) SELECT MAX(p2.numeroplace) + 1 FROM place p2");
    $requete->execute();
    return $requete;

}

function modifyPlace()
{
    global $bdd;
	$listDispo = Array();
    $requete = $bdd->query("SELECT p.id_p, p.numeroplace FROM place p where NOT EXISTS (SELECT 1 FROM reserver r where r.id_p = p.id_p)");

    while ($res = $requete->fetch())
    {
        $listDispo[$res['id_p']]=$res['numeroplace'];
    }
    return $listDispo;
}

 function validformenvoyer()
{
    global $bdd;
    $userMod = ($_POST['idUserMod']);
    $valueMod = ($_POST['idplace']);
    $requete = $bdd->prepare("UPDATE reserver SET id_p = $valueMod WHERE id_u = $userMod");
    $requete->execute();
    //print_r($requete);
    
}

function HistoList()
{
    global $bdd;
    $requete = $bdd->query("SELECT id_u, nom, prenom, email, historique FROM user ");
    $reponse = $requete->fetchAll();

    return $reponse;

}