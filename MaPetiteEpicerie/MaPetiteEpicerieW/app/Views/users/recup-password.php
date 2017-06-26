<?php $this->layout('layout', ['title' => 'recuperation du mot de passe']) ?>

<?php $this->start('main_content') ?>

	<?php //var_dump($utilisateur); ?>

<h2>resaissir votre nouveau mot de passe</h2>
<?php
//echo $utilisateur[0]['token'];

//echo "<a href='http://192.168.1.50/MaPetiteEpicerieW/public/recup-password/".$utilisateur[0]['token']."'>Renouveler le mdp</a>";


/*echo "<a href='http://192.168.1.50/MaPetiteEpicerieW/public/recup-password/".$utilisateur[0]['token']."'>Renouveler le mdp</a>";*/
?>

<form method="POST" action="../password-msg">


<!-- <input  class='form-control' type='text'  name='token' id='token' value="" /> -->

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