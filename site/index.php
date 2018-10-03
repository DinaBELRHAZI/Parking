<?php require("include/function.php"); ?>
<?php session_start (); ?>
<?php
		if(!isset($_GET['p']))
		{
			$page = "accueil" ;
			
		}
		else {
			if(!file_exists("content/".$_GET['p'].".php"))
			$page = "404";
			
			else
			
			$page = $_GET['p'];

		}

		ob_start();
		include "content/".$page.".php" ;
		$content = ob_get_contents();
		ob_end_clean();
		include "layout.php";

?>
