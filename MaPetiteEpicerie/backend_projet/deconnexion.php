<?php
	session_start();
	if (isset($_SESSION['id_util']))
	{
		session_destroy();
		unset($_SESSION);
		echo "<p> Vous êtes maintenant déconnecté</p>";
		header('Location: accueil.php');
	  	exit();
	}
	else
	{
		echo "<p> Vous n'êtes pas connecté</p>";
	}

	//ATTENTION ! changer le nom du fichier de la page d'accueil selon le vôtre !
	echo "<p><a href='accueil.php'>Retour vers l'accueil</a></p>";

?>