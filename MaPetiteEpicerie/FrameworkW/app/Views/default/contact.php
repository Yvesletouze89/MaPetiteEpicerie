<?php $this->layout('layout', ['title' => $title]) ?>
<?php $this->start('main_content') ?>

<h2>Contact !</h2>
<form method="" action="">

	<div class="form-group">
		<label>Nom :</label>
		<input class="form-control" type="text" name="" value='<?= $nom ?>' />
	</div>

	<div class="form-group">
		<label>Prenom :</label>
		<input class="form-control" type="text" name="" />
	</div>
	<div class="form-group">
		<label>Email :</label>
		<input class="form-control" type="text" name="" />
	</div>
	<div class="form-group">
		<label>Ecrire message :</label>
		<textarea class="form-control"> </textarea>
	</div>	

	<input type="submit" name="envoyer" value="envoyer" />

</form>
<?php $this->stop('main_content') ?>