<?php
require dirname(__FILE__).'/../model/adminwaitmodel.php';

if(WaitList())
    {
        $reponse = WaitList();
            foreach ($reponse as $row)
        {
            $id_u = $row['id_u'];
            $placeattente = $row['placefileattente'];
            $nom = $row['nom'];
            $prenom = $row['prenom'];
            $email = $row['email'];
            //print_r($reponse);
        } 
    }

    function getwaitDispo(){
        $arayReturn = modifyWait();
        //print_r($arayReturn);
        return $arayReturn;
        }
    
      if(isset($_POST['envoyer'])){
        validformenvoyerwait();
        //echo"$requete";
    }
