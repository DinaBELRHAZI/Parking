<?php $title = "Inscription" ; ?>

<!-- inserer le formulaire d'inscription içi -->

<div id="register">
<?php   
    if(isset($_POST['submit']))
    {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mdp = sha1($_POST['mdp']);
        $email = $_POST['email'];
        
		//echo "INSERT INTO user (nom,prenom,mdp,email) VALUES ('$nom','$prenom','$mdp','$email')"; //test requete sql
		
        $requete = $bdd ->query("INSERT INTO user (nom,prenom,password,email) VALUES ('$nom','$prenom','$mdp','$email')");
        
    }
	
?>
	<h2>Inscription</h2>
<form action="#" method="post" enctype="multipart/from-data">
    Nom : <input type="text" name="nom" ><br />
    Prenom : <input type="text" name="prenom" ><br />
    Mdp : <input type="password" name="mdp" ><br />
    Email : <input type="email" name="email" ><br />
    <input type="submit" name="submit"/>
    
</form>
</div>