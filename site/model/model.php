<?php
require "config.php";

try
{
$bdd = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
