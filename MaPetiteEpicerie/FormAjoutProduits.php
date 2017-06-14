<?php
	define('HOST', 'localhost'); 
	define('USER', 'root'); 
	define('PASS', ''); 
	define('DB', 'mapetiteepicerie'); 

	include_once('ConnexionBDD.php');

	$message="";
	$attr2="";
	session_start();


?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>MPE Ajout Produits</title>

		<!-- JQUERY -->
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script> 

		<!-- BOOTSTRAP -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- JAVASCRIPT -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<!-- Optional theme -->
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->
		<script type="text/javascript" src="js/fichierJS.js" ></script>

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="css/styles.css"/>
	</head>

<form method="POST" action="ExeAjoutProduits.php">

	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1>FORMULAIRE AJOUT PRODUITS</h1>
				<h1></h1>
				<div id="col1">
					<label style="vertical-align: top;" >Descriptif : </label>
					<textarea id="descriptif"  type="text" name="descriptif" ></textarea><br/>
					<label>Poids ou volume : </label>
					<input id="poids_volume" class="input" type="text" name="poids_volume" ><br/>
					<label>Unités :</label>
						<select id="unit" name="unit">
							<option></option>
							<option value="cl">cl</option>
							<option value="dl">dl</option>
							<option value="l">l</option>
							<option value="g">g</option>
							<option value="kg">kg</option>
						</select><br/>
					<label>Marque : </label>
					<input id="marque" class="input" type="text" name="marque" ><br/>
					<label>Prix : </label>
					<input id="prix" name="prix" class="input" type="text" ><br/>



					<label>Photo 1 : </label>
					<input class="input" type="file" id="photo1" name="photo1" value="img/"  /><br/>
					<h1><?php echo $attr2;?></h1>
					




					<label>Catégorie : </label>
					<select class="input" name="categorie" >
						<option></option>
						<?php			
						$query = $db->prepare('SELECT categorie FROM categories');
						$query->execute();
						$result = $query->fetchAll();
						foreach($result as $cle => $valeur){
						?>
							<option style="text-align: left"><?php echo $valeur['categorie'];?></option>
						<?php
				   		}
				   		?>
					</select><br/>
					<h1></h1>
					<img id="photo" src="">
					<h1></h1>
					<input type="file" name="">
					<h1></h1>
					<h1><?php if (isset ($_SESSION['message'])) {
						echo $_SESSION['message'];
						unset($_SESSION['message']);
						}?></h1>
					<h1></h1>
					<div style="margin-right: 20%">
						<input id="valid" type="submit" name="connexion" value="Validez" >
						<h1></h1>
					
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<?php

 
	


?>

			

	