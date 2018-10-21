<?php
require dirname(__FILE__).'/../model/loginmodel.php';


    if(isset($_SESSION['connecte']))
    {
      //print_r ($_SESSION);
      echo"vous etes deja connecter !";
    }
    else
    {
      $reponse = getUserIFExists();
      $_SESSION['id_u'] = $reponse["id_u"];
      $_SESSION['email'] = $reponse["email"];
      $_SESSION['lvl'] = $reponse['lvl'];
      $_SESSION['nom'] = $reponse['nom'];
      $_SESSION['prenom'] = $reponse['prenom'];
    }
