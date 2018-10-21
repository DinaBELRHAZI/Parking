<?php $title = "Mon Compte" ; ?>

<h1>Mon Compte</h1>

<p>Bienvenue dans le pannel d'utilisateur<br>
<FONT size="4" color="#ff0000"><b> EN CONSTRUCTION</b></font><br>
Malheureusement il n'est pas encore au point (ou même coder encore) revient plus tard ! <br> </p>

<?php

/*Modifier*/

if((isset($_GET['action']) AND $_GET['action'] == 'modify')){
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
                    header("Location:index.php?action=modifyanddelete");//redirection
                }
                else echo "Echec de mise à jour";
    }
}
else  {
        $id = $_GET['id_u'];
        $select = mysqli_query($db,"SELECT * FROM biens WHERE id_u = ".$id);
        $reponse = mysqli_fetch_assoc($select);

?>


<body>

          <form method="post" action="#" enctype="multipart/form-data">

              <label for="prenom">Prenom :</label>
              <input type="text" name="prenom" value="<?php echo $reponse['prenom']; ?>" required />

               <label for="email">Type de bien :</label>
               <select Type="email" name="email" id="email" value="<?php echo $reponse['email']; ?>" required>
              </select>


              <label for="surface">Surface :</label>
              <input type="range" name="surface" id="surface" max="100" value="<?php echo $reponse['surface']; ?>" required /><br/><br/>

              <label for="nom">Adr 1:</label>
              <input type="text" name="nom" id="nom" maxlength="50" value="<?php echo $reponse['nom']; ?>" required />

              <label for="lvl">Adr 2:</label>
              <input type="text" name="lvl" id="lvl" value="<?php echo $reponse['lvl']; ?>" maxlength="50" />

              <label for="placefileattente">placefileattente :</label>
              <input type="int" name="placefileattente" id="placefileattente" maxlength="10" value="<?php echo $reponse['placefileattente']; ?>" required /><br/><br/>

              <label for="historique" >historique : </label>
              <input type="text" name="historique" id="historique" placeholder="ex: Paris" maxlength="50" value="<?php echo $reponse['historique']; ?>" required />



              <input type="submit" name="submit" value="Envoyer"/>
          </form>


</body>




<?php

}

}else{
    die('Une erreur s\'est produite.');
}


?>
