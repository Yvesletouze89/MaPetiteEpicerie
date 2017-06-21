<?php
/***************************************
* A voir aussi un exemple sur ...
* https://openclassrooms.com/courses/systeme-d-inscription-avec-validation-par-l-administrateur
*
***********************************/
/*define('HOST', 'localhost');
define('USER', 'root');  
define('PASS', '');
define('DB', 'exerciceBDD');

include_once('conectDB.php');

$message = "";

//Oublie d'un champ
if (isset($_POST['email']) && $_POST['email'] != NULL && isset($_POST['passe']) && $_POST['passe'] != NULL)
 //On est dans la page de formulaire
{
$email = $_POST['email'];
$passe = $_POST['passe'];
	    $query=$db->prepare('SELECT id, nom, prenom, email, passe

	    FROM utilisateur WHERE email = ?');

	    $query->bindValue(1, $email, PDO::PARAM_STR);

	    $query->execute();

	    $data=$query->fetch();

	   // var_dump($data);

	    if ($data['passe'] == sha1($_POST['passe'])) // Acces OK !

	    {
			$message = "connexion réussi";
			session_start();
			$_SESSION['id'] = $data['id'];	
			$_SESSION['nom'] = $data['nom'];	
			$_SESSION['prenom'] = $data['prenom'];
			$message = "<h1>Bienvenue</h1> <h2>".$_SESSION['prenom']." ".$_SESSION['nom']." !</h2>";

		}
		else
		{
			$message = "Mauvaise adresse ou mot de passe !";
		}				
	}*/

//$message = "";	
?> 

<!DOCTYPE html>
<?php
session_start();
?>

<html>
<head>
	<title>connexion</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

</head>
	<body>
	<div class="container">

	<h2>Connexion au site</h2>


	<form method="POST" action="connexion.php">
	<!--<form method="POST" action="#">-->
			<div class="form-group">
				<label>Email :
					<input  class="form-control" type="text" name="email" id="email" />
				</label>
			</div>
			<div class="form-group">
				<label>Mot de passe :
					<input class="form-control" type="password" name="password" id="password" />
				</label>
			</div>

			<div class="form-group">
				<input class="btn btn-default" type="submit" value="connexion" />
			</div>
			<?=$message;?>	
		</form>
		<a href="accueil.php">Retour vers la page d'accueil ?</a>
		<br />
		<a href="oubli.php">Mot de passe oublié ?</a>
	</body>
</html>		