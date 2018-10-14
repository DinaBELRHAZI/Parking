<?php $title = "Inscription" ; ?>

<!-- inserer le formulaire d'inscription içi -->



			<div class="register">
				<?php  
						$EnvoyerDonnee="";
						$Nom = "";
						$Prenom = "";
						$Email = "";
						$Mdp = "";
						
					if(isset($_POST['EnvoyerDonnee']))
					{
						$Mdp = sha1($_POST['Mdp']);
						$Email = $_POST['Email'];
						$Nom = $_POST['Nom'];
						$Prenom = $_POST['Prenom'];
						$EnvoyerDonnee = $_POST['EnvoyerDonnee'];
						
						//echo "INSERT INTO users (nom,prenom,password,email) VALUES ('".$Nom."','".$Prenom."','".$Mdp."','".$Email."')"; //test requete sql
							 $sql = "SELECT 1 FROM user WHERE email='$Email'";
								$exist = false;
								foreach ($bdd->query($sql) as $row) {
									$exist = true;
								}
						
						if (!$exist){
								if (isFilledField($Nom) && isFilledField($Prenom) && isFilledField($Email) && isFilledField($Mdp))
								 {
									 $requete = $bdd ->query("INSERT INTO user (email,password,nom,prenom) VALUES ('$Email','$Mdp','$Nom','$Prenom')");
								 echo "Merci de vous être inscrit, " , $Prenom , " " , $Nom ;
								 }
							}
						else{
							echo "Le compte existe déjà.";
							}; 
						//header("Location:login.php");
  
  					}
					
				?>
  <form method="post" action="?p=register">

    <!-- Gestion du nom : -->
    <?php
        if ((!isset($Nom) || empty($Nom)) && ($EnvoyerDonnee <> ""))
        echo "<font color='#FF0000'> Le Nom DOIT être rempli :</font><BR>";

    echo "Votre nom : <input type=\"text\" name=\"Nom\" value=\"";
    if(isFilledField($Nom))
        echo $Nom;
		echo "\"/><br>";
	
?>
	<!-- Gestion du Prénom : -->
    <?php
      if ((!isset($Prenom)|| empty($Prenom)) && ($EnvoyerDonnee <> ""))
        echo "<font color='#FF0000'> Le prénom DOIT être rempli :</font><BR>";

    echo "Votre prénom : <input type=\"text\" name=\"Prenom\" value=\"";
		if(isFilledField($Prenom))
			echo $Prenom; 
			echo "\"/> <br> ";
    ?>	
	<!-- Gestion de l'E-Mail : -->
    <?php
      if ((!isset($Email)|| empty($Email)) && ($EnvoyerDonnee <> ""))
        echo "<font color='#FF0000'> L'E-Mail DOIT être rempli :</font><BR>";

    echo "Votre E-Mail : <input type=\"text\" name=\"Email\" value=\"";
		if(isFilledField($Email))
			echo $Email; 
			echo "\"/> <br>";
    ?>	
	<!-- Gestion du mdp : -->
    <?php
      if ((!isset($Mdp)|| empty($Mdp)) && ($EnvoyerDonnee <> ""))
        echo "<font color='#FF0000'> Le mot de passe DOIT être rempli :</font><BR>";

    echo "Votre mot de passe : <input type=\"password\" name=\"Mdp\" value=\"\"/> <br>";
    ?>
    <input type="submit" name="EnvoyerDonnee" value="Envoyer"/>
  </form>
		<div class="clearfix"> </div>