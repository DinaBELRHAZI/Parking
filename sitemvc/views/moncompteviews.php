<?php $title = "Mon Compte"; 

require dirname(__FILE__).'/../controllers/moncomptecontrollers.php';
?>


<h1> Mon Compte </h1>

<form method="post" action="<?php dirname(__FILE__).'/?p=moncompte' ?>" enctype="multipart/form-data">

<label for="nom">Nom :</label>
<input type="text" name="nom" value="<?php echo $reponse['nom']; ?>" required /><br>

 <label for="prenom">Prenom :</label>
 <input Type="text" name="prenom"  value="<?php echo $reponse['prenom']; ?>" required><br>


<label for="email">Email :</label>
 <input Type="text" name="email"  value="<?php echo $reponse['email']; ?>" required><br>

 <label for="password">Mot de passe :</label>
 <input Type="text" name="password"><br>

<input type="submit" name="submit" value="Envoyer"/>
</form>