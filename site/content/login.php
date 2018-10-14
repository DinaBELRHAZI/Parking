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
						<label for="email">Email:</label>
						<input type="email" name="email" id="email"/><br />
						<label for="mdp">Mdp:</label>
						<input type="password" name="mdp" id="mdp"><br />
						<input type="submit" name="submit"/><br>
						<a href="?p=register"> Pas encore inscrit ?</a><br>
						<a href="?p=passoublier"> Mot de passe oublié?</a>
					</form>

					<label>Se souvenir de moi ?</label><input type="checkbox" name="souvenir" /><br />

					</div>
					<?php

					if (isset($_POST['souvenir'])) // ajout d'un cookie de connexion si l'utilisateur coche se souvenir

					{

					$expire = time() + 365*24*3600;

					setcookie('email', $_SESSION['email'], $expire); 

					}

					?>