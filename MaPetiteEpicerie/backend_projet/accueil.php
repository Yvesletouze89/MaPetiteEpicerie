<?php
define('HOST', 'localhost');
define('USER', 'root');  
define('PASS', '');
define('DB', 'mapetiteepicerie');
session_start();
include_once('conectDB.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>inscription</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

<style type="text/css">
.nom{
	color: blue;
}	


</style>
</head>

<body>
	<div class="container">
		<h2>Accueil du site !</h2>
		<?php if (isset($_SESSION['id_util']))
			{
				echo "<h1>Bienvenue</h1> <h2>".$_SESSION['prenom']." ".$_SESSION['nom']." !</h2>";
				?>
		<div class="form-group">
			<a class="btn btn-default" href="deconnexion.php">Me déconnecter</a>
		</div>
		<?php
			}
			else
			{
		?>
		<div class="form-group">
			<a class="btn btn-default" href="form_connexion.php">Vous connecter ?</a>
		</div>

		<div class="form-group">
			<a class="btn btn-default" href="form_inscription.php">Vous inscrire sur le site ?</a>
		</div>
		<?php } ?>
	</div>
</body>
</html>