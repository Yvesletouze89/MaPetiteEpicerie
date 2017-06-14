<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Formulaire Panier</title>
		<!-- JQUERY -->
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
		<!-- BOOTSTRAP -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- JAVASCRIPT -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="styles.css"/>
		<script type="text/javascript" src="fichierJS.js" ></script>
	</head>

	<div class="container">
		<div class="row">
			<div class="texte">
				<h1>Formulaire panier</h1>
			</div>
		</div>
	</div>



	<div class="container" >
		<div class="row" id="zoneMessage">
			<div id="error" >
				<?php
	define('HOST', 'localhost'); 
	define('USER', 'root'); 
	define('PASS', ''); 
	define('DB', 'bdd ylt'); 

	include_once('ConnexionBDD.php');

		
	$query = $db->prepare('SELECT * FROM chat ORDER BY ID DESC LIMIT 0,10');
	$query->execute();
	$donnees = $query->fetchAll();
	$last =  ($donnees[0]['ID']);


	foreach($donnees as $row){
		echo "<p class='apart' id=\"" . $row['ID'] . "\"  ><strong>" . $row['date'] . " " . $row['pseudo'] . " dit :</strong><span id='red'> " . $row['message']  . "</span></p>";
	}
	

?>

			</div>
		</div>
	</div>

	<div class="container" id="footer">
		<div class="row">
			
			<div class="texte">
				<h1 id="messageVert"></h1>
				<h2>Pseudo</h2>
			</div>
		
			<input class="input" type="text" id="pseudo">

			<div class="texte">
				<h2>Message</h2>
			</div>

			<input class="input" type="text" name="message" id="message">

			<div class="texte">
				<h1></h1>
				<button id="valider" type="button" > Envoyez vos messages</button>
				<h1></h1>
				<h1></h1>
			</div>

			<input type="number" name="">
			

		</div>
	</div>
</html>


	

	






	