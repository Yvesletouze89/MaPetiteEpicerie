<?php $this->layout('layout', ['title' => 'Liste des produits']) ?>

<?php $this->start('main_content') ?>

<?php 
foreach ($result as $produits ) { ?>

	<p>
	<?= "nom du produit ".$produits['product_name']?> - 
	<?= "Prix du produit ".$produits['product_price']?> - 
	<?= "Quantite du produit ".$produits['product_quantity']?> -

	<a class="glyphicon glyphicon-trash" href="produit_suppr/<?= $produits['product_id']?>"></a>
	<br />
	

	</p>

<?php } ?>
<a href="ajout">Ajouter produit</a>
<br />
<a href="accueil">Retour page d'accueil</a>
<?php $this->stop('main_content') ?>