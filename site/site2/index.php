<?php
session_start ();

	if(!isset($_GET['p']))
	{
		$page = "accueil" ;
		
	}
	else
	{
		if(!file_exists("views/".$_GET['p']."views.php")){

		$page = "404";
		}
		else
		{
		$page = $_GET['p'];
		}
	}

	ob_start();
	include "./controllers/".$page."controllers.php" ;
	$content = ob_get_contents();
	ob_end_clean();
	include "layout.php";
?>
