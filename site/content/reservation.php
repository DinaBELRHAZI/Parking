<?php $title = "Reservation" ; ?>

<h1>Reservation</h1>
<br/>
<br/>
Afin de reserver une place, veuillez remplir le formulaire suivant. Une place vous seras attribuer (si une place est disponible) sinon vous obtiendrez votre place en file d'attente.<br>

<?php 

	$id_u = $_SESSION['id_u'];
	//print_r($id_u);

	$requete = $bdd->query("SELECT placefileattente FROM user WHERE id_u = '$id_u'");
	
		//print_r ($requete);
		$reponse = $requete->fetch();
		//print_r($reponse);
		$reserver = $reponse['placefileattente'];
	
  		if($reponse['placefileattente'] == 0) // verifie si l'utilisateur a reserver une place (ajouter la gestion si il a deja une place en cours) si non affiche :
		{	
				echo "Vous n'avez pas reserver de place.
				Voulez vous en reservez une?";
	?>
		<form method=POST action'#'>
			<input type="checkbox" name="oui" id="oui" />
				Oui<br />
			<input type="checkbox" name="non" id="non" />
				Non<br />
			<input type=submit value=Envoyer>
		</form>
		
	<?php	
				if(isset($_POST['oui'])) // si l'utilisateur coche oui, ajoute l'utilisateur a la derniere place 
				{
					$requete = $bdd->query("SELECT MAX(placefileattente) FROM user"); // recherche dans la bdd le place du dernier utilisateur en liste d'attente
					$attente = $requete->fetch();
					$attente = $attente['MAX(placefileattente)'];
					//print_r($attente);
					$attente = $attente +1; // ajoute +1 a la derniere place
					//print_r($attente);
					$requete = $bdd->query("UPDATE user SET placefileattente = '$attente' WHERE id_u ='$id_u'"); // ajoute l'utilisateur a la derniere place
					//print_r($requete);
					$attente = $requete->fetch();
					$URL="?p=attente";
					echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">'; // redirige vers la page attente
					
					
				}
		}
		else // si l'utilisateur est deja en file d'attente affiche :
		{
			echo "Vous avez déjà reserver une place.<br>
				Pour voir votre place rendez vous <a href='?p=attente'>içi</a> .";
		}  
		
?>