<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

	<div class="container">
		<h2>Accueil du site !</h2>
		<?php if (isset($_SESSION['user']['ID_util']))
			{
				echo "<h1>Bienvenue</h1> <h2>".$_SESSION['user']['prenom']." ".$_SESSION['user']['nom']." !</h2>";
				?>

<a href="admin_user">Page admin</a>
<a href="auth-modification-perso">changer mes infos perso</a>
				
		<div class="form-group">
			<a class="btn btn-default" href="deconnexion">Me déconnecter</a>
		</div>
		<?php
			}
			else
			{
		?>
		<div class="form-group">
			<a class="btn btn-default" href="connexion">Vous connecter ?</a>
		</div>

		<div class="form-group">
			<a class="btn btn-default" href="inscription">Vous inscrire sur le site ?</a>
		</div>
		<?php } ?>
	</div>








<!-- 	<h2>Let's code.</h2>
	<p>Vous avez atteint la page d'accueil de tout le monde !</p>

	<p>Bienvenue</p>
	
	<a href="connexion">Se connecter</a>
	<br />
	<a href="inscription">S'inscrire</a>
	<br />
	
	<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p> -->
<?php $this->stop('main_content') ?>
