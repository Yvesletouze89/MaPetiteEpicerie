<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<?php
	foreach($result as $key){ 
		$id=$key['product_id'];?>
		<p><?= $key['product_name'] ?> - <?= $key['product_price'] ?> - <?= $key['product_quantity']?> 

		<a href="delete_produits/<?= $key['product_id']?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></p>

	<?php	
	}
	?>
	<a href="/frameworkw/public/ajout_produits" style="color:red">Ajouter un produit</a>
	
<?php $this->stop('main_content') ?>
