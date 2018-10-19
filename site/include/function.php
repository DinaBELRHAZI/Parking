<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=parking', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

function isFilledField($champ){
return (isset($champ) && !empty($champ));
}
?>