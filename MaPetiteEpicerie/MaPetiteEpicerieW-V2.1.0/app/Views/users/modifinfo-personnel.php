<?php $this->layout('layout', ['title' => 'Bienvenue dans votre espace personnel !']) ?>

<?php $this->start('main_content') ?>

<?php if(isset($valid) && $valid == true)
		{ ?>


<?php if(isset($message)) echo $message; ?>		
	<!-- *************************************************************************
								PARTIE ESPACE PERSONNEL
	**************************************************************************-->
<section class="row"><!--  mon espace perso -->
	<div class="col-xs-12">
		<div class="jumbotron">
			<h5 class="titrecategories"><span class="fa fa-user faContact" aria-hidden="true"></span>Mes Informations Personnelles</h5>
			<p>Pour modifier à tout moment mes informations personnelles (adresse, téléphone...).</p>
			<p><a  id="infoPerso" class="btn btn-primary btn-lg" href="#" role="button">Modifier mes informations</a></p>
		</div>
		<!--********************************************
				MODIFICATION DES INFORMATIONS PERSO
		*********************************************-->
		<div id="affichediv1">
			<section  id="modifInfoPerso" class="row modifInfoPerso">
				<div class="col-xs-12">
					<div class="form-area"> 
					<div><p class="titrecategories">Je souhaite modifier mes informations personnelles&nbsp;!</p></div>

    					<form method="POST" action="updateInfo" role="form" id="formSubmit11">

    					<input class="form-control" type="hidden" name="id" value="<?= $resultat['ID_util'] ?>" />
				    		<div><p class="obligations">Les Champs avec<span> * </span>sont obligatoires.</p></div>

							

<!-- ***************INPUT POUR LE NOM DE LA PERSONNE QUI S'INSCRIT*************** -->
				    		<div class="form-group col-xs-12 col-sm-6">
				    			<p><span class="fa fa-user faContact" aria-hidden="true"></span>Votre Nom :<span> * </span></p>
								<input type="text" class="form-control" id="nomMI" name="nom" value="<?= $resultat['nom'] ?>"/>
								<div class="divAjout" id="nomMIZero"></div>
							</div>
<!-- ***************INPUT POUR LE PRENOM DE LA PERSONNE QUI S'INSCRIT*************** -->
				    		<div class="form-group col-xs-12 col-sm-6">
				    			<p><span class="fa fa-user faContact" aria-hidden="true"></span>Votre Prénom :<span> * </span></p>
								<input type="text" class="form-control" id="prenomMI" name="prenom" value="<?= $resultat['prenom'] ?>" />
								<div class="divAjout" id="prenomMIZero"></div>
							</div>
<!-- ***************INPUT POUR LE MAIL DE LA PERSONNE QUI CONTACTE*************** -->
							<div class="form-group col-xs-12 col-sm-6">
								<p><span class="fa fa-envelope faContact" aria-hidden="true"></span>Votre Mail :<span> * </span></p>
								<input type="text" class="form-control" id="emailMI" name="email" value="<?= $resultat['email'] ?>" />
								<div class="divAjout" id="mailMIZero"></div>
							</div>
<!-- ***************INPUT POUR L'ADRESSE DE LA PERSONNE QUI CONTACTE*************** -->
							<div class="form-group col-xs-12 col-sm-12">
								<p><span class="fa fa-home faContact" aria-hidden="true"></span>Votre Adresse :<span> * </span></p>
								<input type="text" class="form-control" id="adresse1MI" name="adresse1" value="<?= $resultat['adresse1'] ?>" />
								<div class="divAjout" id="adresseMIZero"></div>
							</div>
<!-- ***************INPUT POUR LE COMPLEMENT D'ADRESSE DE LA PERSONNE QUI CONTACTE*************** -->
							<div class="form-group col-xs-12 col-sm-12">
								<p><span class="fa fa-home faContact" aria-hidden="true"></span>Votre Complément d'Adresse :</p>
								<input type="text" class="form-control" id="adresse2MI" name="adresse2" value="<?= $resultat['adresse2'] ?>"/>
								<div class="divAjout"></div>
							</div>
<!-- ***************INPUT POUR LE CODE POSTAL FIXE DE LA PERSONNE QUI CONTACTE*************** -->
							<div class="form-group col-xs-12 col-sm-6">
								<p><span class="fa fa-map-marker faContact" aria-hidden="true"></span>Votre Code Postal :<span> * </span></p>
								<input type="text" class="form-control" id="CPMI" name="CP" value="<?= $resultat['CP'] ?>" />
								<div class="divAjout" id="cpMIZero"></div>
							</div>
<!-- ***************INPUT POUR LA VILLE DE LA PERSONNE QUI CONTACTE*************** -->
							<div class="form-group col-xs-12 col-sm-6">
								<p><span class="fa fa-map-marker faContact" aria-hidden="true"></span>Votre Ville :<span> * </span></p>
								<input type="text" class="form-control" id="villeMI" name="ville" value="<?= $resultat['ville'] ?>" />
								<div class="divAjout" id="villeMIZero"></div>
							</div>
<!-- ***************INPUT POUR LE TELEPHONE FIXE DE LA PERSONNE QUI CONTACTE*************** -->
							<div class="form-group col-xs-12 col-sm-6">
								<p><span class="fa fa-phone faContact" aria-hidden="true"></span>Votre Téléphone Fixe :</p>
								<input type="text" class="form-control" id="telMI" name="tel" value="<?= $resultat['tel'] ?>" />
								<div class="divAjout"></div>
							</div>
<!-- ***************INPUT POUR LE MOBILE DE LA PERSONNE QUI CONTACTE*************** -->
							<div class="form-group col-xs-12 col-sm-6">
								<p><span class="fa fa-mobile faContact" aria-hidden="true"></span>Votre Téléphone Mobile :<span> * </span></p>
								<input type="text" class="form-control" id="mobileMI" name="mobile" value="<?= $resultat['mobile'] ?>" />
								<div class="divAjout" id="mobileMIZero"></div>
							</div>

<!-- ***************BOUTON D'ENVOI DU FORMULAIRE D'INSCRIPTION*************** -->
    						<button id="submit11" name="submit11" class="btn btn-primary pull-right">Je modifie mes informations</button>
    					</form>
    					<div id="formOk11"></div>
					</div>
				</div><!--col-xs-12 de mon formulaire de contact-->
			</section><!--fin row inscription-->
		</div>
	</div><!-- Fin espace perso -->



	<div class="col-xs-12">
		<div class="jumbotron">
			<h5 class="titrecategories"><span class="fa fa-magic faContact" aria-hidden="true"></span>Modifier mon Mot de Passe</h5>
			<p>Pour modifier votre mot de passe à tout moment.</p>
			<p><a id="modifMdp" class="btn btn-primary btn-lg" href="#" role="button">Modifier mon mot de passe</a></p>
		</div>
	
		
<!--********************************************
Changement de mon mot de passe
*********************************************-->
		<div id="affichediv2">

			<section  id="changementMDP" class="row changementMDP">
				<div class="col-xs-12">
					<div class="form-area"> 
					<div><p class="titrecategories">Je souhaite modifier mon mot de passe&nbsp;!</p></div>

<?php $email = $_SESSION['user']['email']; ?>

    					<form method="POST" action="new-password" role="form" id="formSubmit12">

				    		<div><p class="obligations">Les Champs avec<span> * </span>sont obligatoires.</p></div>

	<input  class="form-control" type="hidden" name="email" id="email" value="<?= $email ?>" />			    		

<!-- ***************INPUT POUR LE NOUVEAU MOT DE PASSE *************** -->
							<div class="form-group col-xs-12">
				    			<p><span class="fa fa-key faContact" aria-hidden="true"></span>Entrez votre nouveau mot de passe<span> * </span></p>
								<input type="password" class="form-control" id="password1" name="password" placeholder="Nouveau mot de passe"/>
								<div class="divAjout" id="passwordNewZero1"></div>
							</div>
<!-- ***************INPUT POUR LE NOUVEAU MOT DE PASSE VERIF *************** -->
							<div class="form-group col-xs-12">
				    			<p><span class="fa fa-key faContact" aria-hidden="true"></span>Entrez une seconde fois votre nouveau mot de passe<span> * </span></p>
								<input type="password" class="form-control" id="password2" name="password2" placeholder="Vérification du nouveau mot de passe"/>
								<div class="divAjout" id="passwordNewZero2"></div>
							</div>
<!-- ***************BOUTON DE DEMANDE DE NOUVEAU MOT DE PASSE*************** -->
    						<div class="form-group col-xs-12">
    							<p><button type="submit" id="submit4" name="submit" class="btn btn-primary pull-right">Je valide mon nouveau mot de passe</button></p>
    						</div>
    					</form>
    					<div id="formOk2"></div>
					</div>
				</div>
			</section>

		</div>
	</div>

	<div class="col-xs-12">
		<div class="jumbotron">


			<h5 class="titrecategories"><span class="fa fa-file-text-o faContact" aria-hidden="true"></span>Mon Historique de Commandes</h5>
			<p>Pour voir vos dernières commandes passées (dates, contenus, tarifs...).</p>
			<p><a  id="historique" class="btn btn-primary btn-lg" href="#" role="button">Voir mon historique</a></p>
		</div>
<!--********************************************
VISUALISATION ANCIENNE COMMANDE 
*********************************************-->
		<div id="accordion">
					<h6>Commande n°4</h6>
					<div>
				    <p>
				    Mauris mauris ante, blandit 
				    et, ultrices a, suscipit eget, uam. Intege ut neque. 
				    Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
				    </p>
					</div>
					<h6>Commande n°3</h6>
					<div>
				    <p>Mauris mauris ante, blandit et, ultrices a, suscipit eget, uam. Intege ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>
					</div>
					<h6>Commande n°2</h6>
					<div>
				    <p>Mauris mauris ante, blandit et, ultrices a, suscipit eget, uam. Intege ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>
					</div>
					<h6>Commande n°1</h6>
					<div>
				    <p>Mauris mauris ante, blandit et, ultrices a, suscipit eget, uam. Intege ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>
					</div>
			</div><!--fin accordion-->
</section>


<a href="deconnexion">se deconnecter</a>
<a href="accueil">Retour</a>

<?php 
	}
	else 
	{
		?>

			<h1>Les champs ne correspondent pas !</h1>
			<a class="btn btn-info" href="auth-modification-perso">Recommencer !</a>

		<?php
	}
 ?>

<?php $this->stop('main_content') ?>