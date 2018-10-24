<?php
require dirname(__FILE__).'/../model/reservationmodel.php';

  $reponse = reserver();
  $reserver = $reponse['placefileattente'];
  if($reponse['placefileattente'] == 0){
      if(isset($_POST['oui'])) // si l'utilisateur coche oui, ajoute l'utilisateur a la derniere place
      {
        $attente = placemax();
        $URL="?p=attente";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">'; // redirige vers la page attente


      }
       elseif(isset($_POST['non']))
       {
         $URL="?p=accueil";
         echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">'; // redirige vers la page accueil
       }
}
