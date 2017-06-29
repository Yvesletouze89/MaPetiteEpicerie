<?php $this->layout('layout', ['title' => 'oublie']) ?>

<?php $this->start('main_content') ?>
	<h2>Mot de passe oublié</h2>

	<form method="POST" action="oublie">
	<!--<form method="POST" action="#">-->
			<div class="form-group">
				<label>Email :
					<input  class="form-control" type="text" name="email" id="email" />
				</label>
			</div>

			<div class="form-group">
				<input  class="form-control" type="submit" name="valider" value="envoyer" />
			</div>
	</form>



	<a href="accueil">Accueil</a>
	<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>

<?php $this->stop('main_content') ?>