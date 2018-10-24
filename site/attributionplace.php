<?php
require dirname(__FILE__).'/model/model.php';

function attribuerPlace($iduAplacer, $idpDuPlace){
    global $bdd;
    $requete = $bdd->prepare("INSERT INTO reserver (id_p, id_u, datefin) VALUE ($idpDuPlace, $iduAplacer,(ADDDATE(CURRENT_DATE, INTERVAL 1 MONTH)))");
    $reponse4 = $requete->execute();
    //print_r($requete);
    $requete = $bdd -> query("SELECT historique FROM user WHERE id_u = '$iduAplacer'");
    $histo = $requete -> fetchAll();
    //print_r($requete);

        $requete = $bdd-> prepare("UPDATE user SET historique = CONCAT(historique, '$idpDuPlace',',') WHERE id_u = '$iduAplacer'");
        $requete->execute();
        //print_r($requete);
}

global $bdd;

$requete = $bdd->query("SELECT CURRENT_DATE");
$reponse = $requete->fetch();
$dateToday = $reponse;

$requete = $bdd->query("SELECT p.id_p FROM place p WHERE NOT EXISTS (SELECT 1 FROM reserver r where r.id_p = p.id_p)");
$reponse1 = $requete->fetchall();

$requete = $bdd->query("SELECT count(p.id_p) as placelibre FROM place p WHERE NOT EXISTS (SELECT 1 FROM reserver r where r.id_p = p.id_p)");
$reponse2 = $requete->fetch();

$requete = $bdd->query("SELECT id_u, placefileattente FROM user WHERE placefileattente > 0");
$reponse3 = $requete->fetchall();

//print_r($dateToday);
//print_r($reponse1);
//print_r($reponse2);
//print_r($reponse3);

$listDesPlacesDispo = Array();
$listToFill = Array();
$userPlaces = Array();

$i=0;
foreach($reponse1 as $placelibre)
{
    $listDesPlacesDispo[$i] = $placelibre['id_p'];
    $i++;
}

$i=0;

foreach($reponse3 as $fileAttente)
{
     $listToFill[$i] = $fileAttente['id_u'];
     $i++;
}

for($i=0; $i < sizeof($listDesPlacesDispo) && $i < sizeof($listToFill); $i++){
    $userPlaces[$listToFill[$i]] = $listDesPlacesDispo[$i];
}

foreach($userPlaces as $idpDuPlace=>$idpPlace){
    attribuerPlace($idpDuPlace,$idpPlace);
    }

$requete = $bdd->prepare("UPDATE user SET placefileattente = GREATEST(placefileattente-$i, 0)");
//print_r($requete);
$reponse4 = $requete->execute();

$requete = $bdd->query("SELECT datefin FROM reserver");
$reponse2 = $requete->fetch();
$datefin = $reponse2;

//print_r($datefin);
//print_r($dateToday);

if($dateToday == $datefin)
{
    $requete = $bdd->prepare("DELETE FROM reserver WHERE datefin = CURRENT_DATE");
}


?>
