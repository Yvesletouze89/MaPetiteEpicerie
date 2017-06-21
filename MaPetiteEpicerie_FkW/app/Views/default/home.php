<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<h2>Sélectionner une page</h2>
	<h1></h1>
	<a href="entree_stock">Entrer des nouveaux produits dans le stock</a>
	<h1></h1>
	<a href="vue_produits">Voir tous les produits de la base</a>
<?php $this->stop('main_content') ?>
