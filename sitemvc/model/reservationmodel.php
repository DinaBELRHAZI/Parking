<?php

require ("model.php");

function Reserver()
  {
    global $bdd;
    $id_u = $_SESSION['id_u'];
    	//print_r($id_u);
      	$requete = $bdd->query("SELECT placefileattente FROM user WHERE id_u = '$id_u'");
    		//print_r ($requete);
    		$reponse = $requete->fetch();
    		//print_r($reponse);
        return $reponse;    
  }

function placemax()
{
    global $bdd;
    $id_u = $_SESSION['id_u'];
        $requete = $bdd->query("SELECT MAX(placefileattente) FROM user WHERE id_u = '$id_u'"); // recherche dans la bdd le place du dernier utilisateur en liste d'attente
        $attente = $requete->fetch();
        $attente = $attente['MAX(placefileattente)'];
        //print_r($attente);
        $attente = $attente +1; // ajoute +1 a la derniere place
        //print_r($attente);
        $requete = $bdd->query("UPDATE user SET placefileattente = '$attente' WHERE id_u ='$id_u'"); // ajoute l'utilisateur a la derniere place
        //print_r($requete);
        $attente = $requete->fetch();

        return $attente;
}
