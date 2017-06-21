<?php $this->layout('layout', ['title' => $title]) ?>
<?php $this->start('main_content') ?>

<h2>Ajout produit</h2>
<div class="container">
<div class="jumbotron">


<form method="POST" action="ajout">

	<label>Nom produit :</label>	
	<input type="text" name="product_name" />

	<label>Prix produit :</label>
	<input type="text" name="product_price" />

	<label>Quantite produit :</label>
	<input type="text" name="product_quantity" />

	<input type="submit" name="send" value="Envoyer">
</form>
<p>
<?= $message; ?></p>
<a href="accueil">Retour page d'accueil</a>


</div>	
</div>
<?php $this->stop('main_content') ?>