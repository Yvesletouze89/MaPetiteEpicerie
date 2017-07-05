<?php $this->layout('layout', ['title' => 'Accès au modification personnel']) ?>

<?php $this->start('main_content') ?>



<?php if(isset($message)) echo $message; ?>	

<?php $email = $_SESSION['user']['email'];?>
<br />

<h2>Saisir votre mot de passe pour modifier vos infos</h2>

<form method="POST" action="modifinfo-personnel">


<input  class='form-control' type='hidden' name='email' id='email' value="<?= $email ?>" />

<div class=" fondGris form-group col-xs-12">
	<p><span class="fa fa-key faContact" aria-hidden="true"></span>Vérification par mot de passe :<span> * </span></p>
	<input type="password" class="form-control" id="passwordMI" name="password" placeholder="Mot de passe"/>
	<div class="divAjout" id="passwordMIZero"></div>
	<p>Pour des raisons de sécurité, merci de rentrer votre mot de passe actuel pour toutes modifications d'informations.</p>
</div>


<!-- 	<div class='form-group'>
		<label>veuillez saisir votre mot de passe :
			<input  class='form-control' type='password' name='password' id='password' />
		</label>
	</div> -->

	<input class="btn btn-primary pull-right" type="submit" value="accèder">
</form>	


<a href="deconnexion">se deconnecter</a>

<a href="accueil">Accueil</a>

<?php $this->stop('main_content') ?>