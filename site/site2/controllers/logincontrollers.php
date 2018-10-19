<?php
require dirname(__FILE__).'/../models/usermodel.php';

function logg()
{
    $login = login();

    require('../views/loginviews.php');
    print_r($login);
}

/*if(login() == true)
{

    if($reponse = $requete->fetch())
            {
                $_SESSION['connecte'] = true;
                $_SESSION['id_u'] = $reponse['id_u'];
                $_SESSION['lvl'] = $reponse['lvl'];
                header("Location:?p=accueil");
                //print_r ($_SESSION);
            }
            else // si il n'existe pas affiche :
            {
                echo "Mauvais identifiants";
            }
 }*/
