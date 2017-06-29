 <?php $this->layout('layout', ['title' => 'nouveau mot de passe']) ?>

<?php $this->start('main_content') ?>
<?php $email = $_SESSION['user']['email']; ?>
<!--ici le formulaire de connexion du site -->
<h2>connexion</h2>
<div class="container">
<div class="jumbotron">

	<form method="POST" action="new-password">
	

<input  class="form-control" type="hidden" name="email" id="email" value="<?= $email ?>" />

		<div class="form-group">
			<label>Nouveau mot de passe :
				<input  class="form-control" type="password" name="password" id="password" />
			</label>
		</div>
		<div class="form-group">
			<label>confirmer nouveau mot de passe :
				<input class="form-control" type="password" name="password2" id="password2" />
			</label>
		</div>

		<div class="form-group">
			<input class="btn btn-default" type="submit" value="envoyer" />
		</div>
	</form>


<h2><?= $message ?></h2>
<a href="accueil">Accueil</a>



<!-- 		<a href="accueil.php">Retour vers la page d'accueil ?</a>
		<br />
		<a href="oubli.php">Mot de passe oublié ?</a> -->

</div>	
</div>


<?php $this->stop('main_content') ?>