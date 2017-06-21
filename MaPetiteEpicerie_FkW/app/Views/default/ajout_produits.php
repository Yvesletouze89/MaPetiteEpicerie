<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>




<form method="POST" action="ajout_produits">
	<div>
		<label>Votre produit :</label>
		<input type="text" name="product_name" style="color:black" />
		<h1></h1>
		<label>Le prix :</label>
		<input type="number" name="product_price" style="color:black"/>
		<h1></h1>
		<label>La quantité :</label>
		<input type="number" name="product_quantity" style="color:black"/>
		<h1></h1>
		<input type="submit" name="valid">
		<h1></h1>
		<h1 style="color:black"><?php echo $message;  ?></h1> 
	</div>
</form>

		
<?php $this->stop('main_content') ?>
