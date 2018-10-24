<?php

require 'model.php';

function UserList()
{
    global $bdd;
    $requete = $bdd->query("SELECT id_u, nom, prenom, email FROM user");
    $reponse = $requete->fetchAll();

    return $reponse;

}

function UserDelete()
{
     global $bdd;
     $requete = $bdd->query("DELETE FROM user WHERE id_u = $id_u");
     $delete = $requete->fetch();

    return $delete;

}

function PlaceList()
{
    global $bdd;
    $requete = $bdd->query("SELECT p.id_p, numeroplace, u.id_u, nom, prenom, email, datefin FROM place p, user u, reserver r WHERE u.id_u = r.id_u AND p.id_p = r.id_u");
    $reponse = $requete->fetchAll();

    return $reponse;

}

function WaitList()
{
    global $bdd;
    $requete = $bdd->query("SELECT nom,prenom,email,placefileattente FROM user WHERE placefileattente > 0 ORDER BY placefileattente");
    $reponse = $requete->fetchAll();

    return $reponse;

}

