 <?php $this->layout('layout', ['title' => 'Déjà inscrit, je me connecte !']) ?>

<?php $this->start('main_content') ?>

<?php if(isset($message)) echo $message; ?>	

<!--ici le formulaire de connexion du site -->

<section  id="connexion" class="row connexion">
	<div class="col-xs-12">
		<div class="form-area"> 

			<form method="POST" action="connexion" role="form" id="formSubmit1">
	    		<div>
		    		<p class="obligations">
		    			Les Champs avec<span> * </span>sont obligatoires.
		    		</p>
	    		</div>
<!-- ***************INPUT POUR L'IDENTIFIANT (MAIL) *************** -->
				<div class="form-group col-xs-12 col-sm-6">
	    			<p><span class="fa fa-user faContact" aria-hidden="true"></span>Identifiant (email) :<span> * </span></p>
					<input type="text" class="form-control" id="identifiant" name="email" placeholder="email@email.fr"/>
					<div class="divAjout" id="identifiantZero"></div>
				</div>
<!-- ***************INPUT POUR LE PASSWORD DE LA PERSONNE QUI CONTACTE*************** -->
				<div class="form-group col-xs-12 col-sm-6">
					<p><span class="fa fa-key faContact" aria-hidden="true"></span>Mot de passe :<span> * </span></p>
					<input type="password" class="form-control" id="motDePasse" name="password" placeholder="Mot de passe"/>
					<div class="divAjout" id="mdpZero"></div>
				</div>
<!-- ***************CHECKBOX POUR LE "RESTE CONNECTE"*************** -->
				<div class="form-group col-xs-12">
					<p> <input type="checkbox" id="resterConnecte" name="rester_connecte" value="resterConnecte"> Rester connecté</p>
				</div>
<!-- ***************MOT DE PASSE OUBLIE*************** -->
				<div class="form-group col-xs-12">
					<p><a href="oublie">Mot de passe oublié ?</a></p>
				</div>
<!-- ***************BOUTON D'ENVOI DU FORMULAIRE D'INSCRIPTION*************** -->
				<button id="submit1" name="submit" class="btn btn-primary pull-right">Je me connecte</button>
			</form>
			<div id="formOk1"></div>
		</div>
	</div><!--col-xs-12 de mon formulaire de contact-->
</section><!--fin row inscription-->

<a href="accueil">Retour page d'accueil</a>


<?php $this->stop('main_content') ?>