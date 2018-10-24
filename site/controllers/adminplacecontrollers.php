<?php
require dirname(__FILE__).'/../model/adminplacemodel.php';

if(PlaceList())
{
    $reponse = PlaceList();
        foreach ($reponse as $row)
    {
        $id_p = $row['id_p'];
        $numeroplace = $row['numeroplace'];
        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $email = $row['email'];
        $datefin = $row['datefin'];
        //print_r($reponse);
    } 
}

function addPlaces(){
    if(isset($_POST['addplace'])){
        $nbPlaces = htmlentities(trim($_POST['places']));
        if($nbPlaces > 0)
            for($i=0;$i<$nbPlaces;$i++)
                addPlace();
            echoDbg($i." places ajoutées");
            return $i;
    }
}

function getPLacesDispo(){
	$arayReturn = modifyPlace();
	//print_r($arayReturn);
    return $arayReturn;
    }

  if(isset($_POST['envoyer'])){
    validformenvoyer();
    //echo"$requete";
}

if(HistoList())
{
    $reponse = HistoList();
        foreach ($reponse as $row)
    {
        $id_u = $row['id_u'];
        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $email = $row['email'];
        $historique = $row['historique'];
        //print_r($reponse);
    } 
}