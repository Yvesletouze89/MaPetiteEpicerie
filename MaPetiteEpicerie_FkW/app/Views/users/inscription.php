<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>

	<form method="POST" action="inscription" >
		<div>
			<label>Votre pseudo :</label>
			<input type="text" name="user_name" style="color:black" />
			<h1></h1>
			<label>Votre email :</label>
			<input type="email" name="user_email" style="color:black" />
			<h1></h1>
			<label>Votre mot de passe :</label>
			<input type="password" name="user_password" style="color:black"/>
			<h1></h1>
			<input type="submit" name="valid" style="color:black">
			<h1></h1>
			
		</div>
	</form>
	<h1 style="color:black"><?php echo $message;  ?></h1> 
	<!-- <a href="inscription" style="color:red"></a> -->

	<?php
	
	?>
	
<?php $this->stop('main_content') ?>
