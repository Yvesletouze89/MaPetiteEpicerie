 <?php $this->layout('layout', ['title' => 'inscription']) ?>

<?php $this->start('main_content') ?>


<!--********************************************
	INSCRIPTION
*********************************************-->

<section  id="inscription" class="row inscription">
	<div class="col-xs-12">
		<div class="form-area"> 
		<div><p class="titrecategories">Première visite, je souhaite m'inscrire&nbsp;!</p></div> 
			<form method="POST" role="form" id="formSubmit2">
	    		<div><p class="obligations">Les Champs avec<span> * </span>sont obligatoires.</p></div>
<!-- ***************INPUT POUR La CIVILITE *************** -->
				<div class="form-group col-xs-12">
	    			<p><span class="fa fa-user faContact" aria-hidden="true"></span>Civilité :<span> * </span></p>
	    			<div id="civiliteZero"></div>
	    			<p><input type="radio" id="monsieur" name="civilite" value="monsieur"/> Monsieur</p>
						<p><input type="radio" id="madame" name="civilite" value="madame"/> Madame</p>
				</div>
<!-- ***************INPUT POUR LE NOM DE LA PERSONNE QUI S'INSCRIT*************** -->
	    		<div class="form-group col-xs-12 col-sm-6">
	    			<p><span class="fa fa-user faContact" aria-hidden="true"></span>Nom :<span> * </span></p>
					<input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom" />
					<div class="divAjout" id="nomZero"></div>
				</div>
<!-- ***************INPUT POUR LE PRENOM DE LA PERSONNE QUI S'INSCRIT*************** -->
	    		<div class="form-group col-xs-12 col-sm-6">
	    			<p><span class="fa fa-user faContact" aria-hidden="true"></span>Prénom :<span> * </span></p>
					<input type="text" class="form-control" id="prenom" name="prenom" placeholder="Votre prénom" />
					<div class="divAjout" id="prenomZero"></div>
				</div>
<!-- ***************INPUT POUR LE MAIL DE LA PERSONNE QUI CONTACTE*************** -->
				<div class="form-group col-xs-12 col-sm-6">
					<p><span class="fa fa-envelope faContact" aria-hidden="true"></span>Mail :<span> * </span></p>
					<input type="text" class="form-control" id="email" name="email" placeholder="email@email.fr"/>
					<div class="divAjout" id="mailZero"></div>
				</div>
<!-- ***************INPUT POUR LA VERIF DE MAIL DE LA PERSONNE QUI CONTACTE*************** -->
				<div class="form-group col-xs-12 col-sm-6">
					<p><span class="fa fa-envelope faContact" aria-hidden="true"></span>Confirmer votre mail :<span> * </span></p>
					<input type="text" class="form-control" id="email2" name="email2" placeholder="email@email.fr"/>
					<div class="divAjout" id="mail2Zero"></div>
				</div>
<!-- ***************INPUT POUR LE PASSWORD DE LA PERSONNE QUI CONTACTE*************** -->
				<div class="form-group col-xs-12 col-sm-6">
					<p><span class="fa fa-key faContact" aria-hidden="true"></span>Choix d'un mot de passe :<span> * </span></p>
					<input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe"/>
					<div class="divAjout" id="passwordZero"></div>
				</div>
<!-- ***************INPUT POUR LA VERIF DU PASSWORD DE LA PERSONNE QUI CONTACTE*************** -->
				<div class="form-group col-xs-12 col-sm-6">
					<p><span class="fa fa-key faContact" aria-hidden="true"></span>Confirmer votre mot de passe :<span> * </span></p>
					<input type="password" class="form-control" id="password2" name="password2" placeholder="Vérification de mot de passe"/>
					<div class="divAjout" id="password2Zero"></div>
				</div>
<!-- ***************INPUT POUR L'ADRESSE DE LA PERSONNE QUI CONTACTE*************** -->
				<div class="form-group col-xs-12 col-sm-12">
					<p><span class="fa fa-home faContact" aria-hidden="true"></span>Votre adresse :<span> * </span></p>
					<input type="text" class="form-control" id="adresse1" name="adresse1" placeholder="1 rue de l'égalité"/>
					<div class="divAjout" id="adresseZero"></div>
				</div>
<!-- ***************INPUT POUR LE COMPLEMENT D'ADRESSE DE LA PERSONNE QUI CONTACTE*************** -->
				<div class="form-group col-xs-12 col-sm-12">
					<p><span class="fa fa-home faContact" aria-hidden="true"></span>Complément d'adresse :</p>
					<input type="text" class="form-control" id="adresse2" name="adresse2" placeholder="Bâtiment, étage, appartement..."/>
					<div class="divAjout"></div>
				</div>
<!-- ***************INPUT POUR LE CODE POSTAL FIXE DE LA PERSONNE QUI CONTACTE*************** -->
				<div class="form-group col-xs-12 col-sm-6">
					<p><span class="fa fa-map-marker faContact" aria-hidden="true"></span>Code Postal :<span> * </span></p>
					<input type="text" class="form-control" id="CP" name="CP" placeholder="89000"/>
					<div class="divAjout" id="cpZero"></div>
				</div>
<!-- ***************INPUT POUR LA VILLE DE LA PERSONNE QUI CONTACTE*************** -->
				<div class="form-group col-xs-12 col-sm-6">
					<p><span class="fa fa-map-marker faContact" aria-hidden="true"></span>Ville :<span> * </span></p>
					<input type="text" class="form-control" id="ville" name="ville" placeholder="Auxerre"/>
					<div class="divAjout" id="villeZero"></div>
				</div>
<!-- ***************INPUT POUR LE TELEPHONE FIXE DE LA PERSONNE QUI CONTACTE*************** -->
				<div class="form-group col-xs-12 col-sm-6">
					<p><span class="fa fa-phone faContact" aria-hidden="true"></span>Téléphone fixe :</p>
					<input type="text" class="form-control" id="tel" name="tel" placeholder="0303030303"/>
					<div class="divAjout"></div>
				</div>
<!-- ***************INPUT POUR LE MOBILE DE LA PERSONNE QUI CONTACTE*************** -->
				<div class="form-group col-xs-12 col-sm-6">
					<p><span class="fa fa-mobile faContact" aria-hidden="true"></span>Téléphone Mobile :<span> * </span></p>
					<input type="text" class="form-control" id="mobile" name="mobile" placeholder="0606060606"/>
					<div class="divAjout" id="mobileZero"></div>
				</div>
<!-- ***************CHECKBOX POUR LES CGV*************** -->
				<div class="form-group col-xs-12 col-sm-12">
					<div id="cgvZero"></div>
					<p> <input type="checkbox" id="cgv" name="cgv"><a href="#"> J'accepte les conditions générales de vente<span> * </span></a></p>
				</div>
<!-- ***************CHECKBOX POUR LES ENVOIS DE SMS/MAIL************** -->
<!-- 								<div class="form-group col-xs-12 col-sm-12">
					<p> <input type="checkbox" id="smsMail" name="sms_mail" value="smsMail"> Je souhaite recevoir des sms/mail d'informations (promos, nouveautés...)</p>
				</div> -->

<!-- ***************BOUTON D'ENVOI DU FORMULAIRE D'INSCRIPTION*************** -->
				<button id="submit2" name="submit" class="btn btn-primary pull-right">Je m'inscris</button>
			</form>
			<div id="formOk2"></div>
		</div>
	</div><!--col-xs-12 de mon formulaire de contact-->
</section><!--fin row inscription-->




<?= $message ?>

<a href="accueil">Retour page d'accueil</a>


</div>	
</div>


<?php $this->stop('main_content') ?>