<?php

require 'model.php';

function getUser()
{
    global $bdd;
    $requete = $bdd->query("SELECT * FROM user");
    $reponse = $requete->fetch();

    return $reponse;

}