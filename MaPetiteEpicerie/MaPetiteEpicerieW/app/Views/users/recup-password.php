<?php $this->layout('layout', ['title' => 'recuperation du mot de passe']) ?>

<?php $this->start('main_content') ?>

	<?php //var_dump($utilisateur); ?>

<h2>resaissir votre nouveau mot de passe</h2>

<form method="POST" action="../password-msg">

<input  class='form-control' type='hidden' name='email' id='email' value="<?= $utilisateur[0]['email'] ?>" />

<div class='form-group'>
		<label>Enter nouveau mot de passe :
			<input  class='form-control' type='password' name='password' id='password' />
		</label>
	</div>
	<div class='form-group'>
		<label>confirmer nouveau mot de passe :
			<input class='form-control' type='password' name='password2' id='password2' />
		</label>
	</div>

	<input type="submit" value="Envoyer">
</form>	

<h2><?= $message; ?></h2>

<a href="connexion">Se connecter</a>

<?php $this->stop('main_content') ?>