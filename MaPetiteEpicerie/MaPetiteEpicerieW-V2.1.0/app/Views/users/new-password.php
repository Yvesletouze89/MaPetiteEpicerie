 <?php $this->layout('layout', ['title' => 'nouveau mot de passe']) ?>

<?php $this->start('main_content') ?>
<?php $email = $_SESSION['user']['email']; ?>
<!--ici le formulaire de connexion du site -->

<!-- 	<form method="POST" action="new-password">
	

<input  class="form-control" type="hidden" name="email" id="email" value="< $email ?>" />

		<div class="form-group">
			<label>Nouveau mot de passe :
				<input  class="form-control" type="password" name="password" id="password" />
			</label>
		</div>
		<div class="form-group">
			<label>confirmer nouveau mot de passe :
				<input class="form-control" type="password" name="password2" id="password2" />
			</label>
		</div>

		<div class="form-group">
			<input class="btn btn-default" type="submit" value="envoyer" />
		</div>
	</form> -->
<!-- 	<div class="col-xs-12">
		<div class="jumbotron">
			<h5 class="titrecategories"><span class="fa fa-magic faContact" aria-hidden="true"></span>Modifier mon Mot de Passe</h5>
			<p>Pour modifier votre mot de passe à tout moment.</p>
			<p><a id="modifMdp" class="btn btn-primary btn-lg" href="#" role="button">Modifier mon mot de passe</a></p>
		</div>
	</div>	 -->
<!--********************************************
Changement de mon mot de passe
*********************************************-->

<!-- 		<div id="affichediv2">

			<section  id="changementMDP" class="row changementMDP">
				<div class="col-xs-12">
					<div class="form-area"> 
					<div><p class="titrecategories">Je souhaite modifier mon mot de passe&nbsp;!</p></div> 
    					<form method="POST" action="new-password" role="form" id="formSubmit12">
    					<input  class="form-control" type="hidden" name="email" id="email" value="<= $email ?>" />
				    		<div><p class="obligations">Les Champs avec<span> * </span>sont obligatoires.</p></div> -->

<!-- ***************INPUT POUR L'ANCIEN 
MOT DE PASSE *************** -->

<!-- 							<div class="form-group col-xs-12">
				    			<p><span class="fa fa-key faContact" aria-hidden="true"></span>Entrez votre ancien mot de passe<span> * </span></p>
								<input type="password" class="form-control" id="passwordOld" name="password1" placeholder="Ancien mot de passe"/>
								<div class="divAjout" id="passwordOldZero"></div>
							</div> -->

<!-- ***************INPUT POUR LE NOUVEAU MOT DE PASSE *************** -->

<!-- 							<div class="form-group col-xs-12">
				    			<p><span class="fa fa-key faContact" aria-hidden="true"></span>Entrez votre nouveau mot de passe<span> * </span></p>
								<input type="password" class="form-control" id="passwordNew1" name="password" placeholder="Nouveau mot de passe"/>
								<div class="divAjout" id="passwordNewZero1"></div>
							</div> -->
<!-- ***************INPUT POUR LE NOUVEAU MOT DE PASSE VERIF *************** -->

<!-- 							<div class="form-group col-xs-12">
				    			<p><span class="fa fa-key faContact" aria-hidden="true"></span>Entrez une seconde fois votre nouveau mot de passe<span> * </span></p>
								<input type="password" class="form-control" id="passwordNew2" name="password2" placeholder="Vérification du nouveau mot de passe"/>
								<div class="divAjout" id="passwordNewZero2"></div>
							</div> -->

<!-- ***************BOUTON DE DEMANDE DE NOUVEAU MOT DE PASSE*************** -->

<!--     						<div class="form-group col-xs-12">
    							<p><button id="submit12" type="submit" name="submit" class="btn btn-primary pull-right">Je valide mon nouveau mot de passe</button></p>
    						</div>
    					</form>
    					<div id="formOk12"></div>
					</div>
				</div>
			</section>
		</div> -->

<?= $message ?>
<a href="accueil">Accueil</a>


<?php $this->stop('main_content') ?>