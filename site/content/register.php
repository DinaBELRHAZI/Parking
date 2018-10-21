<head>
	<link rel="stylesheet" type="text/css" href="./CSS/style.css" media="all"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</head>

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
						$Mdp = sha1(htmlentities(trim($_POST['Mdp'])));
						$Email = htmlentities(trim($_POST['Email']));
						$Nom = htmlentities(trim($_POST['Nom']));
						$Prenom = htmlentities(trim($_POST['Prenom']));
						$EnvoyerDonnee = htmlentities(trim($_POST['EnvoyerDonnee']));

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
<center>
  <form method="post" action="?p=register">

    <!-- Gestion du nom : -->
    <?php
        if ((!isset($Nom) || empty($Nom)) && ($EnvoyerDonnee <> ""))
        echo "<font color='#FF0000'> Le Nom DOIT être rempli :</font><BR>";

    echo "
		<div class='form-row'>
    	<div class='form-group col-md-6'>
				<label for='inputnom'>Votre nom : </label>
				<input type=\"text\" name=\"Nom\" value=\"";
    if(isFilledField($Nom))
        echo $Nom;
		echo "\" id='inputnom' class='form-control' required/>
		</div>
	 </div><br>";

?>
	<!-- Gestion du Prénom : -->
    <?php
      if ((!isset($Prenom)|| empty($Prenom)) && ($EnvoyerDonnee <> ""))
        echo "<font color='#FF0000'> Le prénom DOIT être rempli :</font><BR>";

    echo "
		<div class='form-row'>
    	<div class='form-group col-md-6'>
				<label for='inputprenom'> Votre prénom : </label>
				<input type=\"text\" name=\"Prenom\" value=\"" ;
				if(isFilledField($Prenom))
					echo $Prenom;
					echo "\" id='inputprenom' class='form-control' required/>
		 	</div>
		 </div><br> ";
    ?>
	<!-- Gestion de l'E-Mail : -->
    <?php
      if ((!isset($Email)|| empty($Email)) && ($EnvoyerDonnee <> ""))
        echo "<font color='#FF0000'> L'E-Mail DOIT être rempli :</font><BR>";

    echo "
		<div class='form-row'>
    	<div class='form-group col-md-6'>
				<label for='inputEmail4'>Votre E-Mail : </label>
		 			<input type=\"text\" name=\"Email\" value=\"";
				if(isFilledField($Email))
					echo $Email;
					echo "\" class='form-control' id='inputEmail4' required/>
			</div>
		 </div><br>";
    ?>
	<!-- Gestion du mdp : -->
    <?php
      if ((!isset($Mdp)|| empty($Mdp)) && ($EnvoyerDonnee <> ""))
        echo "<font color='#FF0000'> Le mot de passe DOIT être rempli :</font><BR>";

    echo "
		<div class='form-row'>
    	<div class='form-group col-md-6'>
				<label for='inputPassword4'>Votre mot de passe : </label>
				<input type=\"password\" name=\"Mdp\" value=\"";
				if(isFilledField($Email))
				 echo $Email;
				 echo "\" class='form-control' id='inputPassword4'required/> <br>";
    ?>
    <input type="submit" name="EnvoyerDonnee" value="Envoyer" class="btn btn-warning"/>
  </form>

</center>
		<div class="clearfix"> </div>
