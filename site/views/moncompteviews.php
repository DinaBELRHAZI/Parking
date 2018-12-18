<?php $title = "Mon Compte"; 
require dirname(__FILE__).'/../controllers/moncomptecontrollers.php';
?>


<h1> Mon Compte </h1>

<form method="post" action="<?php echo'?p=moncompte' ?>">

<label for="nom">Nom :</label>
<input type="text" name="nom" value="<?php echo $nom; ?>" required /><br>

 <label for="prenom">Prenom :</label>
 <input Type="text" name="prenom"  value="<?php echo $prenom; ?>" required><br>


<label for="email">Email :</label>
 <input Type="text" name="email"  value="<?php echo $email; ?>" required><br>

 <label for="pw">Mot de passe :</label>
 <input Type="password" name="pw"><br>

<input type="submit" value="Envoyer"/>
</form>


<h2>Place file d'attente / place de parking</h2>

<?php
if(!empty($reponse2)){
        if($placefileattente > 0)
        {
                print_r($placefileattente);
                echo "Vous êtes actuellement à la place n°'$placefileattente' en file d'attente.";
        }
        else
        {
            print_r($numeroplace);
            print_r($datefin);
            echo "Vous avez actuellement la place $numeroplace. Elle est valable jusqu'au ". date( 'Y-m-d', strtotime($datefin)) ." .";
        }
    }
    else
    echo "Vous n'êtes pas en file d'attente. Si vous voulez reserver une place, rendez-vous <a href='?p=reservation'>içi</a>"; 
?>
