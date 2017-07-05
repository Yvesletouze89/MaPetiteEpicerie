<?php $this->layout('layout', ['title' => 'Je génère un nouveau mot de passe !']) ?>

<?php $this->start('main_content') ?>
<?php if(isset($message)) echo $message; ?>


<!--********************************************
DEMANDE MDP OUBLIE
*********************************************-->


	<section  id="nvMDP" class="row nvMDP">
		<div class="col-xs-12">
			<div class="form-area"> 
		
				<form method="POST" action="../password-msg" role="form" id="formSubmit3">
<input  class='form-control' type='hidden' name='email' id='email' value="<?= $utilisateur[0]['email'] ?>" />

		    		<div><p class="obligations">Les Champs avec<span> * </span>sont obligatoires.</p></div>
<!-- ***************INPUT POUR LE NOUVEAU MOT DE PASSE *************** -->
					<div class="form-group col-xs-12">
		    			<p><span class="fa fa-key faContact" aria-hidden="true"></span>Mon nouveau mot de passe<span> * </span></p>
						<input type="password" class="form-control" id="password01" name="password" placeholder="Nouveau mot de passe"/>
						<div class="divAjout" id="nvMdpZero1"></div>
					</div>
<!-- ***************INPUT POUR LE NOUVEAU MOT DE PASSE VERIF *************** -->
					<div class="form-group col-xs-12">
		    			<p><span class="fa fa-key faContact" aria-hidden="true"></span>Je confirme mon nouveau mot de passe<span> * </span></p>
						<input type="password" class="form-control" id="password02" name="password2" placeholder="Vérification du nouveau mot de passe"/>
						<div class="divAjout" id="nvMdpZero2"></div>
					</div>
<!-- ***************BOUTON DE DEMANDE DE NOUVEAU MOT DE PASSE*************** -->
					<div class="form-group col-xs-12">
						<p><button id="submit4" name="submit" type="submit" class="btn btn-primary pull-right">Je valide mon nouveau mot de passe</button></p>
					</div>
				</form>
				<div id="formOk2"></div>
			</div>
		</div><!--col-xs-12 de mon formulaire de contact-->
	</section><!--fin row inscription-->


<a href="connexion">Se connecter</a>

<?php $this->stop('main_content') ?>