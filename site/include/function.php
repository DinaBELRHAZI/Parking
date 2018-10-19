<?php
require "config.php"
try
{
<<<<<<< HEAD
$bdd = new PDO(mysql:host=$host;dbname=$dbname, $user, $password);
=======
$bdd = new PDO('mysql:host=localhost;dbname=parking', 'root', 'root');
>>>>>>> a81e9c5234ade33c061424dbb33749931bbc07a5
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

function isFilledField($champ){
return (isset($champ) && !empty($champ));
}
?>
