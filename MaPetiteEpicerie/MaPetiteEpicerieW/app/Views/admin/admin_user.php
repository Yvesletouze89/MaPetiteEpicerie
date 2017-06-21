<?php $this->layout('layout', ['title' => 'admin']) ?>

<?php $this->start('main_content') ?>
	<h2>Vous etes connecte!</h2>



	<p>Bienvenue sur la page Admin</p>
<?= $prenom.", ".$nom ?>

<br />
<a href="deconnexion">se deconecter ?</a>
	<a href="produits">liste des produits</a>
	<br />
	<a href="ajout">Ajouter produit</a>

	
	<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>
<?php $this->stop('main_content') ?>