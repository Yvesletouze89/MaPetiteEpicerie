<?php $this->layout('layout', ['title' => 'Accueil Admin']) ?>

<?php $this->start('main_content') ?>
	<h2>Sélectionner l'action à réaliser</h2>
	
	<h1></h1>
	<a href="entree_stock" class="btn btn-danger" role="button" style="width: 450px; background-color: green">Entrer des nouveaux produits dans le stock</a>
	<h1></h1>
	<a href="vue_produits" class="btn btn-danger" role="button" style="width: 450px; background-color: green">Voir tous les produits de la base</a>
	<h1></h1>
	<a href="maj_stock" class="btn btn-danger" role="button" style="width: 450px; background-color: green">Mettre à jour le stock</a>

<?php $this->stop('main_content') ?>
