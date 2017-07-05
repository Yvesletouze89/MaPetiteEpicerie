<?php $this->layout('layout', ['title' => 'Erreur 404']) ?> 
<?php $this->start('main_content') ?>
<section class="row">
	<div class="col-xs-12 col-md-6 page404">
		<p> 404 - Vous êtes perdu ?</p>
		<a href="/MaPetiteEpicerieW-V2.1.0/public/accueil">Retour à la page d'accueil</p>
	</div>
	<div class="col-xs-12 col-md-6">
		<img src="<?= $this->assetUrl('img/404.jpg') ?>" alt="Image page 404 - Vous êtes perdu">
	</div>
</section>

<?php $this->stop('main_content') ?>