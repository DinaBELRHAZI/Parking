<?php $title = "Administration des utilisateurs"; 

require dirname(__FILE__).'/../controllers/adminusercontrollers.php';
?>

<h1>Modification Utilisateurs</h1>

<h2> Compte : </h2>

<form method="post" action="<?php dirname(__FILE__).'/?p=adminuser' ?>" enctype="multipart/form-data">

<label for="nom">Nom :</label>
<input type="text" name="nom" value="<?php echo $reponse['nom']; ?>" required /><br>

 <label for="prenom">Prenom :</label>
 <input Type="text" name="prenom"  value="<?php echo $reponse['prenom']; ?>" required><br>


<label for="email">Email :</label>
 <input Type="text" name="email"  value="<?php echo $reponse['email']; ?>" required><br>

 <label for="password">Mot de passe :</label>
 <input Type="text" name="password"><br>

 <label for="lvl">lvl :</label>
 <select>
    <option value="0">0 : Non activer</option>
    <option value="1">1 : Activer</option>
    <option value="3">3 : Administrateur</option>
</select> <br>

<input type="submit" name="submit" value="Envoyer"/>
</form>

<h2> Historique : </h2>