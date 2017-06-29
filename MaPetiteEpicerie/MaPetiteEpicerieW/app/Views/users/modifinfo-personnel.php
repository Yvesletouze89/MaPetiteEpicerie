<?php $this->layout('layout', ['title' => 'modif info perso']) ?>

<?php $this->start('main_content') ?>

<?php var_dump($resultat);


?>
<br />
<a href="new-password">modifier mot de passe ?</a>
<form method="POST" action="updateInfo">

<input class="form-control" type="hidden" name="id" value="<?= $resultat['ID_util'] ?>" />

	<div class="form-group">
		<label>Nom :</label>	
		<input class="form-control" type="text" name="nom" value="<?= $resultat['nom'] ?>" />
	</div>

	<div class="form-group">
		<label>prenom :</label>	
		<input class="form-control" type="text" name="prenom" value="<?= $resultat['prenom'] ?>"/>
	</div>

	<div class="form-group">
		<label>email :</label>	
		<input class="form-control" type="text" name="email" value="<?= $resultat['email'] ?>" />
	</div>

<!-- 	<div class="form-group">
		<label>Mot de passe :</label>
		<input class="form-control" type="password" name="password" value="< //$resultat['password'] ?>" />
	</div> -->

	<div class="form-group">
		<label>Adresse :</label>
		<input class="form-control" type="text" name="adresse1" value="<?= $resultat['adresse1'] ?>"/>
	</div>

	<div class="form-group">
		<label>Adresse complementaire :</label>
		<input class="form-control" type="text" name="adresse2" value="<?= $resultat['adresse2'] ?>"/>
	</div>

	<div class="form-group">
		<label>Code postal :</label>
		<input class="form-control" type="text" name="CP" value="<?= $resultat['CP'] ?>"/>
	</div>

	<div class="form-group">
		<label>Ville :</label>
		<input class="form-control" type="text" name="ville" value="<?= $resultat['ville'] ?>"/>
	</div>

	<div class="form-group">
		<label>Telephone :</label>
		<input class="form-control" type="text" name="tel" value="<?= $resultat['tel'] ?>" />
	</div>

	<div class="form-group">
		<label>Mobile :</label>
		<input class="form-control" type="text" name="mobile" value="<?= $resultat['mobile'] ?>"/>									
	</div>
	<div class="form-group">	
		<button type="submit" name="envoyer" value="bouton">connexion</button>
	</div>

</form>

<h2><?= $message; ?></h2>



<a href="deconnexion">se deconnecter</a>


<?php $this->stop('main_content') ?>



