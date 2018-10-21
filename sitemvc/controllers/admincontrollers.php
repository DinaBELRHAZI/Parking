<?php
require dirname(__FILE__).'/../model/adminmodel.php';

/* if(UserList())
    {
        $reponse = UserList();
        $id_u = $reponse['id_u'];
        $nom = $reponse['nom'];
        $prenom = $reponse['prenom'];
        $email = $reponse['email'];
    } */
    if(UserList())
    {
        $reponse = UserList();
            foreach ($reponse as $row)
        {
            $id_u = $row['id_u'];
            $nom = $row['nom'];
            $prenom = $row['prenom'];
            $email = $row['email'];
            if(isset($_POST['submit']) ){
                if($action == "supprimer"){
                    $delete = UserDelete();
                    //print_r($delete);
                }
        } 
            //print_r($reponse);
        } 
    }

    if(PlaceList())
    {
        $reponse = PlaceList();
            foreach ($reponse as $row)
        {
            $id_p = $row['id_p'];
            $numeroplace = $row['numeroplace'];
            //print_r($reponse);
        } 
    }
                 
?>