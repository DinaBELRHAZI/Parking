<?php $title = "Register" ; ?>
<h1>Inscription</h1>

<?php
require dirname(__FILE__).'/../controllers/registercontrollers.php';
?>

<div class="register">

<form method="post" action="<?php echo'?p=register' ?>">

    Votre nom : <input type="text" name="Nom" value="<?php
    if(isFilledField($Nom))
        echo $Nom;?>"><br>

    Votre prénom : <input type="text" name="Prenom" value="<?php
      if(isFilledField($Prenom))
        echo $Prenom;?>"> <br>

    Votre E-Mail : <input type="text" name="Email" value="<?php
      if(isFilledField($Email))
        echo $Email;?>"> <br>

    Votre mot de passe : <input type="password" name="Mdp"> <br>


    <input type="submit" name="submit">
  </form>
</div>
