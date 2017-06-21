<?php
define('HOST', 'localhost');
define('USER', 'root');  
define('PASS', '');
define('DB', 'mapetiteepicerie');

include_once('conectDB.php');

//Oublie d'un champ
if (isset($_POST['email']) && $_POST['email'] != NULL && isset($_POST['password']) && $_POST['password'] != NULL)
 //On est dans la page de formulaire
{

// Declaration des variables POST 	
$email = $_POST['email'];
$password = $_POST['password'];

		// Requete select pour verifier si l'email exist bien en base 	
	    $query=$db->prepare('SELECT login.id_util, nom, prenom, email, password FROM login INNER JOIN utilisateurs ON login.ID_util = utilisateurs.`ID_util` WHERE login.email = ?');
	    $query->bindValue(1, $email, PDO::PARAM_STR);
	    $query->execute();

	    $data=$query->fetch();

	    if ($data['password'] == sha1($_POST['password'])) // Acces OK !

	    {
			echo "connexion réussi";
			session_start();
			$_SESSION['id_util'] = $data['id_util'];	
			$_SESSION['nom'] = $data['nom'];	
			$_SESSION['prenom'] = $data['prenom'];
			echo "<h1>Bienvenue</h1> <h2>".$_SESSION['prenom']." ".$_SESSION['nom']." !</h2>";
	 		header('Location: accueil.php');
	  		exit();

			echo "<br /><a href='accueil.php'>Retour vers la page d'accueil ?</a>";
		}
		else
		{
			echo "Mauvaise adresse ou mot de passe !";
		}				
	}
?>