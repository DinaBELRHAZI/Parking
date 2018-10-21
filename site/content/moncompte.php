<?php $title = "Mon Compte" ; ?>

<head>
<link rel="stylesheet" type="text/css" href="./CSS/style.css" media="all"/>

</head>

<h1>Mon Compte</h1>

<p>Bienvenue dans le pannel d'utilisateur<br>
<FONT size="4" color="#ff0000"><b> EN CONSTRUCTION</b></font><br></p>

<?php

/*Modifier*/


     if(isset($_POST['submit'])){

    $nom = htmlentities(trim($_POST['nom']));
    $prenom = htmlentities(trim($_POST['prenom']));
    $email = htmlentities(trim($_POST['email']));
    $password = htmlentities(trim($_POST['password']));
    $lvl = htmlentities(trim($_POST['lvl']));
    $placefileattente = htmlentities(trim($_POST['placefileattente']));
    $historique = htmlentities(trim($_POST['historique']));


    if ($db){
                 $id = $_GET['id_u'];
                 $sql = "UPDATE parking SET nom='".$nom."', prenom='".$prenom."', email='".$email."', password='".$password."',
                 lvl='".$lvl."', placefileattente='".$placefileattente."', historique='".$historique."' WHERE id_u='".$id."'";

                 $resultat = mysqli_query($db, $sql);
                if($resultat){
                    header("Location:index.php?action=?p=accueil");//redirection
                }
                else echo "Echec de mise à jour";
    }

else  {
        $id = $_GET['id_u'];
        $select = mysqli_query($db,"SELECT * FROM biens WHERE id_u = ".$id);
        $reponse = mysqli_fetch_assoc($select);

?>


<body>

          <form method="post" action="#" enctype="multipart/form-data">


            <div class='form-row'>
              <div class='form-group col-md-6'>
                <label for='inputnom'>Votre nom : </label>
                <input type="text" name="nom" id="nom" maxlength="50" value="<?php echo $reponse['nom']; ?>" required />
              </div>
            </div>

            <div class='form-row'>
              <div class='form-group col-md-6'>
                <label for='prenom'>Prenom : </label>
                <input type="text" name="prenom" id="prenom" maxlength="50" value="<?php echo $reponse['prenom']; ?>" required />
              </div>
            </div>

            <div class='form-row'>
              <div class='form-group col-md-6'>
                <label for='email'>Email : </label>
                <input type="text" name="email" id="email" value="<?php echo $reponse['email']; ?>" required />
              </div>
            </div>

            <div class='form-row'>
              <div class='form-group col-md-6'>
                <label for='password'>Mot de passe : </label>
                <input type="password" name="password" id="password" value="<?php echo $reponse['password']; ?>" required />
              </div>
            </div>

            <div class='form-row'>
              <div class='form-group col-md-6'>
                <label for="lvl">Level : </label>
                <input type="text" name="lvl" id="lvl" value="<?php echo $reponse['lvl']; ?>" required />
              </div>
            </div>

            <div class='form-row'>
              <div class='form-group col-md-6'>
                <label for="placefileattente">Place dans la file d'attente : </label>
                <input type="number" name="placefileattente" id="placefileattente" value="<?php echo $reponse['placefileattente']; ?>" required />
              </div>
            </div>

            <div class='form-row'>
              <div class='form-group col-md-6'>
                <label for="historique">Historique: </label>
                <input type="number" name="historique" id="historique" value="<?php echo $reponse['historique']; ?>" required />
              </div>
            </div>

            <input type="submit" name="submit" value="Envoyer"/>
          </form>


</body>




<?php

}

}else{
    die('Une erreur s\'est produite.');
}


?>
