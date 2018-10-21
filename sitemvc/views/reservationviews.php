<?php
require dirname(__FILE__).'/../controllers/reservationcontrollers.php';

if(isset ($_SESSION ['connecte']) && $_SESSION ['connecte'])
    {
      //print_r($reponse['placefileattente']);
      if($reponse['placefileattente'] == 0) // verifie si l'utilisateur a reserver une place (ajouter la gestion si il a deja une place en cours) si non affiche :
      {
        echo "Vous n'avez pas reserver de place.<br>
        Voulez vous en reservez une?";
      ?>
      <form method=POST action'#'>
      <input type="checkbox" name="oui" id="oui" />
        Oui<br />
      <input type="checkbox" name="non" id="non" />
        Non (Envoie vers la page d'accueil)<br />
      <input type=submit value=Envoyer>
      </form>
      <?php
      }

      else // si l'utilisateur est deja en file d'attente affiche :
      {
        echo "Vous avez déjà reserver une place.<br>
          Pour voir votre place rendez vous <a href='?p=attente'>içi</a> .";
      }
  }
?>
