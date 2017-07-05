<?php $this->layout('layout', ['title' => 'Mise à jour du stock']) ?>

<?php $this->start('main_content') ?>




	<h1></h1>
	<h1></h1>

	<div>
		<label>Choisir la catégorie</label>
		<select id="select_cat2" name="select_cat" style=" color: red">
			<option id="option" style=" color: red">-- Catégories --</option>
			
			<?php foreach($categories as $cat)
			{ ?>
				<option id="option" style=" color: red">
				<?php echo $cat['categorie'];?>
				</option>	
		   		<?php
		   	} ?>
		</select>
		<h1></h1>
		<label>Choisir la marque</label>	
		<select id="select_marque2" name="select_marque" style=" color: green">
			<option id="option" style=" color: green">-- Marques --</option>
			
			<?php foreach($marques as $mark)
			{ ?>
				<option id="option" style=" color: green">
				<?php echo $mark['marque'];?>
				</option>	
		   		<?php
		   	} ?>
		</select>

		<h1></h1>	
		<h1></h1>
		<table>
			<thead>
				<td style='width: 50px; border: solid 1px black; color: black; text-align: center'>Valider</td>
                <td style='width: 450px; border: solid 1px black; color: black; text-align: center'>Descriptif</td>
                <td style='width: 70px; border: solid 1px black; color: black; text-align: center'>Poids / volume</td>
                <td style='width: 80px; border: solid 1px black; color: green; text-align: center'>Marque</td>
                <td style='width: 150px; border: solid 1px black; color: red; text-align: center'>Categorie</td>
                <td style='width: 150px; border: solid 1px black; color: black; text-align: center'>Prix</td>
                <td style='width: 150px; border: solid 1px black; color: black; text-align: center'>Nouveau</td>
                <td style='width: 150px; border: solid 1px black; color: black; text-align: center'>Promo</td>
                <td style='width: 150px; border: solid 1px black; color: black; text-align: center'>Stock</td>
            </thead>
            
        	<tbody id="product_table"></tbody>    
		</table>	

		
		
	
		<h1></h1>

		<div id="message" style="border: solid 1px black; color: red; text-align: center; font-size: 25px"; >
		</div>

		<h1></h1>	
		<h1></h1>	
		
	</div>

	<h1></h1>

	
	<a href="accueil_admin" class="btn btn-danger" role="button" style="width: 450px; background-color: green">Retour à l'accueil Admin</a>


<?php $this->stop('main_content') ?>
