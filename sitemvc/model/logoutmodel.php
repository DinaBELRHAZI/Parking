<?php

function logout()
{
    session_start();
	session_destroy();
	header("location:?p=accueil");
	exit();


    if (isset ($_COOKIE['email']))

        {

        setcookie('email', '', -1);

        }

    session_destroy();
}

?>