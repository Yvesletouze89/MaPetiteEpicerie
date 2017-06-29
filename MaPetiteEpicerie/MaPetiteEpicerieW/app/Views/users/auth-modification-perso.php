<?php $this->layout('layout', ['title' => 'modification info perso']) ?>

<?php $this->start('main_content') ?>


<h2>Coucou</h2>

<?php //var_dump($_SESSION['user']);

$email = $_SESSION['user']['email'];


 ?>
<br />

<h2>Saisir votre mot de passe pour modifier vos infos</h2>

<form method="POST" action="modifinfo-personnel">


<input  class='form-control' type='hidden' name='email' id='email' value="<?= $email ?>" />

	<div class='form-group'>
		<label>veuillez saisir votre mot de passe :
			<input  class='form-control' type='password' name='password' id='password' />
		</label>
	</div>

	<input type="submit" value="Envoyer">
</form>	

<h2><?= $message; ?></h2>

<a href="deconnexion">se deconnecter</a>

<?php $this->stop('main_content') ?>