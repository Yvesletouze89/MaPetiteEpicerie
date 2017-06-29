 <?php $this->layout('layout', ['title' => 'connexion']) ?>

<?php $this->start('main_content') ?>

<!--ici le formulaire de connexion du site -->
<h2>connexion</h2>
<div class="container">
<div class="jumbotron">

	<form method="POST" action="connexion">
		<!--<form method="POST" action="#">-->


		<div class="form-group">
			<label>Email :
				<input  class="form-control" type="text" name="email" id="email" />
			</label>
		</div>
		<div class="form-group">
			<label>Mot de passe :
				<input class="form-control" type="password" name="password" id="password" />
			</label>
		</div>

		<div class="form-group">
			<input class="btn btn-default" type="submit" value="connexion" />
		</div>
	</form>

	<h2><?= $message; ?></h2>

<a href="oublie">Mot de passe oublié ?</a>
<a href="/MaPetiteEpicerieW/public">Retour page d'accueil</a>


</div>	
</div>


<?php $this->stop('main_content') ?>