<?php

	/*
	 * fonction tableau_result_fetch : affiche un tableau HTML avec les résultats de la query donnée en paramètre
	 * param $query : objet de type PDO qui contient une requête
	 * 
	 * exemple d'utilisation :
	 * $query = $db->query('SELECT * FROM table');
	 * tableau_result_fetch($query);
	 */	
	function tableau_result_fetch($query)
	{
		$result = $query->fetch();

		echo "<table class='table table-sitrped'>";

		if ($result != NULL)
		{
				
				//on créé la première ligne
				echo "<tr>";
			//pour chaque 'colonne' du premier résultat, on affiche le nom de la colonne
			foreach ($result as $key => $value) {
				echo "<td class='cle'>".$key."</td>";
			}
			echo "</tr>";
			//gestion de l'affichage des données
			do  {
				//on créé une nouvelle ligne
				echo "<tr>";
				//pour chaque 'colonne' du résultat, on affiche la donnée associée
				foreach ($result as $key => $value) {
					echo "<td class='".$key."'>".$value."</td>";
					// la ligne suivante est au cas où on voudrait faire du CSS, en associant une class qui prendra le nom de la colonne
					# echo "<td class='".$key."'>".$value."</td>";
				}
				echo "</tr>";
			}while($result = $query->fetch());
			// on fait cette boucle tant qu'on peut récupérer une nouvelle ligne de résultat
			// que l'on met dans la variable $result
			echo "</table>";
			echo "<a href='form_inscription.php'>Retour</a>";

			
		}
		else
		{
		echo "Ce nom n'existe pas";
		}
		

	}
	
	/*
	 * fonction tableau_result_fetchAll : affiche un tableau HTML avec les résultats de la query donnée en paramètre
	 * param $query : objet de type PDO qui contient une requête
	 * 
	 * exemple d'utilisation :
	 * $query = $db->query('SELECT * FROM table');
	 * tableau_result_fetchAll($query);
	 */		
	function tableau_result_fetchAll($query)
	{
		//on récupère toutes les lignes des résultats de la requête
		$result = $query->fetchAll();

		//on créé la table si les résultats ne sont pas vides (= la requ^te ne retourne rien)
		if($result != NULL) // on peut aussi faire un if(isset($result[0]) qui fera la même chose)
		{

			echo "<table>";

			//on gère la première ligne
			echo "<tr>";
			//pour chaque 'colonne' du premier résultat, on affiche le nom de la colonne
			//ici, on utilise seulement le premier résultat
			foreach ($result[0] as $key => $value) {
				echo "<td>".$key."</td>";
			}
			echo "</tr>";

			//gestion de l'affichage des données

			//on récupère chaque résultat comme étant un sous-tableau
			foreach ($result as $ss_tableau) {
				echo "<tr>";
				//pour chaque 'sous-tableau' du résultat, on affiche la donnée associée
				foreach ($ss_tableau as $key => $value) {
					echo "<td>".$value."</td>";
					// la ligne suivante est au cas où on voudrait faire du CSS, en associant une class qui prendra le nom de la colonne
					# echo "<td class='".$key."'>".$value."</td>";
				}
				echo "</tr>";
			}

			echo "</table>";

		}	
	}

?>