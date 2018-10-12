<!DOCTYPE HTML>
<html>
<head>
<title>Site parking</title>
 <!--Header-->
 			<!-- Banniere -->
   
<img src="./Images/banniere.png" style="border:1px solid black;max-width:100%;">

  <h1>  Header du site</h1>
  <!-- Ecrire tout le header içi-->
  
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="?p=accueil">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?p=reservation">Reservation</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="?p=attente">Attente</a>
            </li>
             <li class="nav-item">
              <a class="nav-link disabled" href="?p=modeemploi">Mode d'emploi</a>
            </li>
			<li class="nav-item">
              <a class="nav-link disabled" href="?p=quisommenous">Qui somme nous?</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="?p=contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="?p=login">Connection / </a> <a class="nav-link disabled" href="?p=signup"> Inscription </a>
            </li>
          </ul>
 
  
</head>
  <body>
   <!--ne pas modifier cette partie-->
  <?= $content; ?>
  
  			<!-- footer -->
<h3> footer </h3>
	<h4>Pages du site</h4>
	<ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="?p=accueil">Accueil</a>
        </li>
        <li class="nav-item">
         <a class="nav-link disabled" href="?p=modeemploi">Mode d'emploi</a>
        </li>
		<li class="nav-item">
         <a class="nav-link disabled" href="?p=quisommenous">Qui somme nous?</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="?p=contact">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="?p=login">Connection / </a> <a class="nav-link disabled" href="?p=signup"> Inscription </a>
        </li>
    </ul>
	  <!-- Ecrire tout le footer içi-->
	  Copyrigth "Webmaster".
  </body>
</html>