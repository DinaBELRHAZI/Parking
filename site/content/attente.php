<?php $title = "liste d'attente" ; ?>

<h1>Attente</h1>
<br/>
<br/>
<?php 

	$id_u = $_SESSION['id_u'];
		//print_r($id_u);

		$requete = $bdd->query("SELECT placefileattente FROM user WHERE id_u = '$id_u'"); // La requete verifie si l'utilisateur est en file d'attente
		
			//print_r ($requete);
			$reponse = $requete->fetch();
			//print_r($reponse);
			$attente = $reponse['placefileattente'];
			
			echo "Votre place dans la file d'attente est : $attente .";
			
?>