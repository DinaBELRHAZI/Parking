<?php
require dirname(__FILE__).'/../model/adminusermodel.php';

if(getUser())
    {
        $reponse = getUser();
            $id_u = $reponse['id_u'];
            $nom = $reponse['nom'];
            $prenom = $reponse['prenom'];
            $email = $reponse['email'];
            $password = $reponse['password'];
            $lvl = $reponse['lvl'];
            $placefileattente = $reponse['placefileattente'];
            $historique = $reponse['historique'];
        } 
            print_r($reponse);
