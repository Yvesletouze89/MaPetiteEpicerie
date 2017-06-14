<?php  
	define('HOST', 'localhost'); 
	define('USER', 'root'); 
	define('PASS', ''); 
	define('DB', 'mapetiteepicerie'); 

	include_once('ConnexionBDD.php');
			$query = $db->prepare('SELECT categorie FROM categories');
			$query->execute();
			$result = $query->fetchAll();
			var_dump($result);

			?>
			<select>
			<?php
	foreach($result as $cle => $valeur){
			?>
				<option><?php echo $valeur['categorie'];?></option>
			<?php
	   		}
	   		?>
			</select>
				
			

