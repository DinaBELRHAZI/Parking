<?php

require dirname(__FILE__).'/../model/registermodel.php';

$submit = "";
$Nom = "";
$Prenom = "";
$Email = "";
$Mdp = "";

if(isset($_POST['submit']))
{
  $Mdp = sha1($_POST['Mdp']);
  $Email = $_POST['Email'];
  $Nom = $_POST['Nom'];
  $Prenom = $_POST['Prenom'];
  $submit = $_POST['submit'];

      if(register())
      {
              //<!-- Gestion du nom : -->
              if ((!isset($Nom) || empty($Nom)) && ($submit <> ""))
              {
              echo "<font color='#FF0000'> Le Nom DOIT être rempli :</font><BR>";
              }

          //echo "Votre nom : <input type=\"text\" name=\"Nom\" value=\"";
          // if(isFilledField($Nom)){}
          //     echo $Nom;
          // echo "\"/><br>";


          //<!-- Gestion du Prénom : -->

            if ((!isset($Prenom)|| empty($Prenom)) && ($submit <> "")){
              echo "<font color='#FF0000'> Le prénom DOIT être rempli :</font><BR>";
            }

          //echo "Votre prénom : <input type=\"text\" name=\"Prenom\" value=\"";
          // if(isFilledField($Prenom)){}
          //   echo $Prenom;
          //   echo "\"/> <br> ";

          //<!-- Gestion de l'E-Mail : -->

            if ((!isset($Email)|| empty($Email)) && ($submit <> "")){
              echo "<font color='#FF0000'> L'E-Mail DOIT être rempli :</font><BR>";
            }

          //echo "Votre E-Mail : <input type=\"text\" name=\"Email\" value=\"";
          // if(isFilledField($Email)){}
          //   echo $Email;
          //   echo "\"/> <br>";

          //<!-- Gestion du mdp : -->

            if ((!isset($Mdp)|| empty($Mdp)) && ($submit <> "")){
              echo "<font color='#FF0000'> Le mot de passe DOIT être rempli :</font><BR>";
              }
          //echo "Votre mot de passe : <input type=\"password\" name=\"Mdp\" value=\"\"/> <br>";
      }
    }
?>
