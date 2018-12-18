<?php
require ("model.php");

function isFilledField($champ)
    {
      return (isset($champ) && !empty($champ));
    }

function register()
{
            global $bdd;

					if(isset($_POST['submit']))
					{
						 $Mdp = sha1($_POST['Mdp']);
						 $Email = $_POST['Email'];
						 $Nom = $_POST['Nom'];
						 $Prenom = $_POST['Prenom'];
						 $submit = $_POST['submit'];
             $exist = false;

						//echo "INSERT INTO users (nom,prenom,password,email) VALUES ('".$Nom."','".$Prenom."','".$Mdp."','".$Email."')"; //test requete sql
							$requete = $bdd->query( "SELECT * FROM user WHERE email='$Email'");

								if ($reponse = $requete->fetch()) {
									$exist = true;
								}

						if ($exist != true){
								if (isFilledField($Nom) && isFilledField($Prenom) && isFilledField($Email) && isFilledField($Mdp))
								 {
                   //echo"INSERT INTO user (email,password,nom,prenom) VALUES ('$Email','$Mdp','$Nom','$Prenom')";
									 $requete = $bdd ->query("INSERT INTO user (email,password,nom,prenom,historique) VALUES ('$Email','$Mdp','$Nom','$Prenom','')");
								 echo "Merci de vous être inscrit, " , $Prenom , " " , $Nom ;
								 }
							}
						else
            {
							echo "Le compte existe déjà. <br>";
							}
						//header("Location:login.php");

  					}
    }
?>
