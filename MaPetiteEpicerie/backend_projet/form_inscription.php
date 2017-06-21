<!DOCTYPE html>
<html>
<head>
	<title>inscription</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

<style type="text/css">
.nom{
	color: blue;
}	


</style>
</head>
<body>
<div class="container">

	<h2>Formulaire d'inscription à la base de donné</h2>

	<div class="row">
	<div class="col-md-6">
			<!--<form method="POST" action="inscription.php">-->
			<form method="POST" action="inscription.php">
			<div class="form-group">
				<label>Nom *:
					<input class="form-control" type="text" name="nom" id="nom" />
				</label>
			</div>

			<div class="form-group">
				<label>Prenom *:
					<input class="form-control" type="text" name="prenom" id="prenom" />
				</label>
			</div>

			<div class="form-group">
				<label>Email *:
					<input  class="form-control" type="text" name="email" id="email" />
				</label>
			</div>
			
			<div class="form-group">
				<label>confirmation email *:
					<input  class="form-control" type="text" name="email2" id="email2" />
				</label>
			</div>


			<div class="form-group">
				<label>Mot de passe *:
					<input class="form-control" type="password" name="password" id="password" />
				</label>
			</div>
			<div class="form-group">
				<label>Confirmer mot de passe * :
					<input  class="form-control" type="password" name="password2" id="password2" />
				</label>
			</div>
		</div><!-- md6 -->
	
	<div class="col-md-6">
		<div class="form-group">
			<label>Adresse :
				<input  class="form-control" type="text" name="adress" id="adress" />
			</label>
		</div>

		<div class="form-group">
			<label>Complement d'ddresse :
				<input  class="form-control" type="text" name="adress2" id="adress2" />
			</label>
		</div>		

		<div class="form-group">
			<label>Code postal *:
				<input  class="form-control" type="text" name="cp" id="cp" />
			</label>
		</div>		
		<div class="form-group">
			<label>Ville :
				<input  class="form-control" type="text" name="ville" id="ville" />
			</label>
		</div>

		<div class="form-group">
			<label>Telephone :
				<input  class="form-control" type="text" name="tel" id="tel" />
			</label>
		</div>	

		<div class="form-group">
			<label>Mobile *:
				<input  class="form-control" type="text" name="mobile" id="mobile" />
			</label>
		</div>

		<div class="form-group">
			<label>Heure pref :
				<input  class="form-control" type="text" name="heure_pref" id="heure_pref" />
			</label>
		</div>								

		<div class="form-group">
			<input class="btn btn-default" type="submit" value="inscription" />
		</div>
		<a href="view_user.php">Voir la liste des utilisateurs enregistrés</a>

	</div> <!--ROW-->
	</form>
<!-- 	<div class="message">
		<div class="form-group">
			<?php $message; ?>
		</div>
	</div>	 -->

</div>	
</body>
</html>

