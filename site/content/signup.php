<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</head>

<?php $title = "Inscription" ; ?>

<!-- inserer le formulaire d'inscription içi -->

<div id="register">
<?php
    if(isset($_POST['submit']))
    {
        $nom = htmlentities(trim($_POST['nom']));
        $prenom = htmlentities(trim($_POST['prenom']));
        $mdp = sha1(htmlentities(trim($_POST['mdp'])));
        $email = htmlentities(trim($_POST['email']));

		//echo "INSERT INTO user (nom,prenom,mdp,email) VALUES ('$nom','$prenom','$mdp','$email')"; //test requete sql

        $requete = $bdd ->query("INSERT INTO user (nom,prenom,password,email) VALUES ('$nom','$prenom','$mdp','$email')");

    }

?>

<fieldset>
    <h2>Inscription</h2>
<form action="#" method="post" enctype="multipart/from-data">
<div class="form-group">
    <label for="exampleInputPassword1"> Nom : </label>
    <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required><br />
</div>

<div class="form-group">
    <label for="exampleInputPassword1>Prenom : </label>
    <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required><br />
</div>

<div class="form-group">
    <label for="exampleInputPassword1">Mdp : </label>
    <input type="password" name="mdp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required><br />
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Email : </label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required><br />
</div>


    <input type="submit" name="submit" class="btn btn-warning"/>

</form>
</fieldset>
</div>
