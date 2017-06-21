<?php $this->layout('layout', ['title' => 'Connexion']) ?>

<?php $this->start('main_content') ?>

	<form method="POST" action="connexion" >
		<div>
			<label>Votre pseudo :</label>
			<input type="text" name="user_name" style="color:black" />
			<h1></h1>
			<label>Votre mot de passe :</label>
			<input type="password" name="user_password" style="color:black"/>
			<h1></h1>
			<input type="submit" name="valid" style="color:black">
			<h1></h1>
			
		</div>
	</form>
	<h1 style="color:black"><?php echo $message;  ?></h1> 
	<a href="inscription" style="color:red">Vous inscrire</a>
	<h1></h1>
	<a href="deconnexion" style="color:red">Vous déconnecter</a>
	<h1></h1>
	<a href="<?php echo $lien; ?>"><?php echo $voir; ?></a>

	<?php
	
	?>
	
<?php $this->stop('main_content') ?>
