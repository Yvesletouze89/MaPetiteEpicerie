 <?php $this->layout('layout', ['title' => 'connexion']) ?>

<?php $this->start('main_content') ?>


<h2>Inscription</h2>
<div class="container">
<div class="jumbotron">


<form method="POST" action="inscription">

	<div class="form-group">
		<label>Nom :</label>	
		<input class="form-control" type="text" name="nom" />
	</div>

	<div class="form-group">
		<label>prenom :</label>	
		<input class="form-control" type="text" name="prenom" />
	</div>

	<div class="form-group">
		<label>email :</label>	
		<input class="form-control" type="text" name="email" />
	</div>

	<div class="form-group">
		<label>resaisir email  :</label>	
		<input class="form-control" type="text" name="email2" />
	</div>

	<div class="form-group">
		<label>Mot de passe :</label>
		<input class="form-control" type="password" name="password" />
	</div>

	<div class="form-group">
		<label>Retaper mot de passe :</label>
		<input class="form-control" type="password" name="password2" />
	</div>

	<div class="form-group">
		<label>Adresse :</label>
		<input class="form-control" type="text" name="adresse1" />
	</div>

	<div class="form-group">
		<label>Adresse complementaire :</label>
		<input class="form-control" type="text" name="adresse2" />
	</div>

	<div class="form-group">
		<label>Code postal :</label>
		<input class="form-control" type="text" name="CP" />
	</div>

	<div class="form-group">
		<label>Ville :</label>
		<input class="form-control" type="text" name="ville" />
	</div>

	<div class="form-group">
		<label>Telephone :</label>
		<input class="form-control" type="text" name="tel" />
	</div>

	<div class="form-group">
		<label>Mobile :</label>
		<input class="form-control" type="text" name="mobile" />									
	</div>
	<div class="form-group">	
		<button type="submit" name="envoyer">connexion</button>
	</div>

</form>

<h2><?= $message ?></h2>

<a href="accueil">Retour page d'accueil</a>


</div>	
</div>


<?php $this->stop('main_content') ?>