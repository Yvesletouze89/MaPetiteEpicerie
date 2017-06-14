<?php
	define('HOST', 'localhost'); 
	define('USER', 'root'); 
	define('PASS', ''); 
	define('DB', 'mapetiteepicerie'); 

	include_once('ConnexionBDD.php');

	
	
	$query = $db->prepare('SELECT * FROM produits');
	$query->execute();
	$result = $query->fetch();

	
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



<?php
do{
	$id = $result["ID_prod"];
	$descriptif = $result["descriptif"];
	$poids_volume = $result["poids_volume"];
	$unit = $result["unites"];
	$marque = $result["marque"];
	$prix = $result["prix"];
	$photo = $result["photo1"];
 
	?>
							

	<div class="rayon">
		<img src="<?php  echo $photo; ?>">
		<Textarea id="descriptif"><?php  echo $descriptif." - ".$poids_volume."".$unit." - Marque : ".$marque." - Prix : ".$prix." €"; ?></Textarea>
		
		
	
            <div class="input-group" style="width:40%">
                <span class="input-group-btn" >
                    <button type="button" id="moins" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field=""  >
                        <span class="glyphicon glyphicon-minus"></span>
                    </button>
                </span>
                <span>
                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="0" min="1" max="100" style="text-align: center;">
                </span>
                <span class="input-group-btn">
                    <button type="button" id="plus"  class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="" style="text-align: left">
                    <span class="glyphicon glyphicon-plus"></span>
                    </button>
                </span>
                
            </div><h1></h1>
                <h1></h1>
                <h1></h1>
    </div>

<?php
}
while ($result = $query->fetch()
);
?>
	
<?php

	
	
	//var_dump($photo);


		
?>