<?php
require dirname(__FILE__).'/../model/attentemodel.php';

if(isset($_SESSION['connecte']))
    {
        $reponse = wait();
        $attente = $reponse['placefileattente'];
    }