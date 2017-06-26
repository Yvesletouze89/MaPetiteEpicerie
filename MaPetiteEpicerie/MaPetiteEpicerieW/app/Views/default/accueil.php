<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<h2>Let's code.</h2>
	<p>Vous avez atteint la page d'accueil de tout le monde !</p>

	<p>Bienvenue</p>
	
	<a href="connexion">Se connecter</a>
	<br />
	<a href="inscription">S'inscrire</a>
	<br />
	
	<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>
<?php $this->stop('main_content') ?>
