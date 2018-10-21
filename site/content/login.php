<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</head>

<body>
<?php $title = "Inscription" ; ?>

<!-- inserer le formulaire de connection içi -->



				<div class="login">
					<?php    if(isset($_POST['submit'])) // Verifie si le compte utilisateur existe
					{
							$email = $_POST['email'];
							$mdp = sha1($_POST['mdp']);

							//echo "SELECT * FROM users WHERE email = '".$email."' AND mdp = '".$mdp."'";

							$requete = $bdd->query("SELECT * FROM user WHERE email = '$email' AND password = '$mdp'");

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
					?>
					<h2>Login</h2>
					<form action="#" method="post">
						<label for="email" for="exampleInputEmail1">Email:</label>
						<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
						<!-- <input type="email" name="email" id="email"/> -->  <br />
						<label for="mdp" for="exampleInputPassword1">Mdp:</label>
						<input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
						<!-- <input type="password" name="mdp" id="mdp">--><br />
						<input type="submit" name="submit" class="btn btn-warning"/><br>
						<a href="?p=register"> Pas encore inscrit ?</a><br>
						<a href="?p=passoublier"> Mot de passe oublié?</a>
					</form>
					<input type="checkbox" name="souvenir" />
					<label>Se souvenir de moi ?</label><br />

					</div>
					<?php

					if (isset($_POST['souvenir'])) // ajout d'un cookie de connexion si l'utilisateur coche se souvenir

					{

					$expire = time() + 365*24*3600;

					setcookie('email', $_SESSION['email'], $expire);

					}

?>



</body>
