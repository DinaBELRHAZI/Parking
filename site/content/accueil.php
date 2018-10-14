<?php $title = "Accueil" ; ?>

<h1> Accueil </h1>

<!-- Ecrire le contenu de la page d'acceuil içi-->


<?php 
				if(isset ($_SESSION ['connecte']))	// Si l'utilisateur est connecté affiche :
				{
				$id_u = $_SESSION['id_u'];
				$requete = $bdd->query("SELECT nom, prenom FROM user WHERE id_u = '$id_u'");
				$reponse = 	$requete->fetch();{
				$nom = $reponse['nom'];
				$prenom = $reponse['prenom'];
				}
				//print_r($email);
				echo "Bienvenue ", $nom," ", $prenom ," !<br>";
				echo "Pour reserver une place rendez vous <a href='?p=reservation'>içi</a>.<br>";
				echo "Pour voir votre place dans la file d'attente rendez vous <a href='?p=attente'>içi</a>.<br>";
				}
				else // sinon il affiche :
				{
				echo"

<br/>
<br/>
Bienvenue sur le site de gestion du parking de l'entreprise.<br>
Veuillez vous inscrire et attendre que l'administrateur valide votre compte afin de pouvoir reserver une place.<br>";
				}
?>