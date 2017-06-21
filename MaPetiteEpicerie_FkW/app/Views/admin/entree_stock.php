<?php $this->layout('layout', ['title' => 'Entrée en stock']) ?>

<?php $this->start('main_content') ?>

	<h1></h1>
	<h1></h1>

	<div>
		<label>Choisir la catégorie</label>
		<select id="select_cat" name="select_cat" style=" color: red">
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
		<select id="select_marque" name="select_marque" style=" color: green">
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

		<div id="product_table">
		</div>
	
		<h1></h1>

		<div id="message" style="border: solid 1px black; color: red; text-align: center; font-size: 25px"; >
		</div>

		<h1></h1>	
		<h1></h1>	
		
	</div>

	<h1></h1>

	<a href="/MaPetiteEpicerie_FkW/public">Retour à page accueil</a>


<?php $this->stop('main_content') ?>
