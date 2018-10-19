<?php
require 'model.php';

function isFilledField($champ)
{
    return (isset($champ) && !empty($champ));
}


function islogged() 
{				
    if(isset ($_SESSION ['connecte']))
    {
        global $bdd;
        $id_u = $_SESSION['id_u'];
        $requete = $bdd->query("SELECT nom, prenom FROM user WHERE id_u = '$id_u'");
        $reponse = 	$requete->fetch();
            {
            $nom = $reponse['nom'];
            $prenom = $reponse['prenom'];
            }
        return $reponse;
    }
}

function login()
{
    global $bdd;
    echo'<div class="login">';
    if(isset($_POST['submit'])) // Verifie si le compte utilisateur existe
    {
            $email = $_POST['email'];
            $mdp = sha1($_POST['mdp']);
            
            echo "SELECT * FROM user WHERE email = '".$email."' AND password = '".$mdp."'";
            var_dump($bdd);
            
            $requete = $bdd->query("SELECT email,password FROM user WHERE email = '$email' AND password = '$mdp'");
            
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
    }

    if (isset($_POST['souvenir'])) // ajout d'un cookie de connexion si l'utilisateur coche se souvenir

    {

    $expire = time() + 365*24*3600;

    setcookie('email', $_SESSION['email'], $expire); 

    }
}

function logout()
{
    session_start();
	session_destroy();
	header("location:?p=accueil");
	exit();


if (isset ($_COOKIE['email']))

{

setcookie('email', '', -1);

}

session_destroy();
}
