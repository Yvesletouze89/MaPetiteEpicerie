<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<form>
		<label>Nom : <input type="text" name="nom" value="<?= $name ?>"/></label>
		<label>Message : <textarea name="message":></textarea></label>
		<button>Valider</button>
	</form>

<?php $this->stop('main_content') ?>
