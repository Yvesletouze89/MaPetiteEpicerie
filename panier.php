

<section class="row">
		<div class="col-xs-12">
			<p class="lien"><a href="#">Retour vers la page d'accueil</a></p>
			<div class="page-header">
				 <h1>Mon panier<small> récapitulatif de ma commande : </small></h1>
			</div>
		</div>
</section>
	<form method="POST" action="">
		<section class="row">
				<div class="col-xs-10 col-xs-offset-1">		 
					<div class="table-responsive">
						<table class="table table-condensed">
							<tr>
								<th></th>
							    <th></th>
							    <th>Libellé</th>
							    <th>Prix unitaire</th>
							    <th>Quantité</th>
							    <th>Total</th>
							  </tr>
							  <tr class="active">
							  	<td>
							  		<i class="fa fa-trash" aria-hidden="true"></i>
							  	</td>
							  	<td><img class="imgRecap" src="img/coca.jpg" name=""></td>
							    <td>Exemple</td>
							    <td class="textRight" name="">3.00€</td>
							    <td class="textCenter" name="">
							    <!-- ****************************************************bouton increment produit********************************************* -->

						            <div class="input-group" style="width:100%">
						                <span class="input-group-btn" >
						                    <button type="button" id="moins" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field=""  >
						                        <span class="glyphicon glyphicon-minus"></span>
						                    </button>
						                </span>
						                <span>
						               		 <input type="text" id="quantity" name="quantity" class="form-control input-number" value="0" min="1" max="100" style="text-align: center;">
						                </span>
						                <span class="input-group-btn">
						                    <button type="button" id="plus"  class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="" style="text-align: left">
						                    <span class="glyphicon glyphicon-plus"></span>
						                    </button>
						                </span>
						            </div>
				          	  <!-- fin bouton -->	

							    </td>
							    <td class="textRight" name="">15.00€</td>
							  </tr>
						</table>
					</div>
				</div>

				<div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-1">
					<p class="recap" name="">Nombre produits :</p>
				</div>

				<div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-0">
					<p class="recap" name="">Total : €</p>
				</div>
		</section>

		<section class="row">	
				<div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-1">
					<h2 class="title">Comment souhaitez-vous récupérer vos courses :</h2>

						<i class="fa fa-truck" aria-hidden="true"></i>
						<label class="radio-inline">
							 <p><input type="radio" name="livraison" value="livraison"/> Livraison</p>
						</label>
						<i class="fa fa-car" aria-hidden="true"></i>
						<label class="radio-inline">
							 <p><input type="radio" name="retrait" value="retrait"/> Retrait</p>
						</label> 				
				</div>

				<div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-0">
					 <h2 class="title">Choix de mon mode de paiement :</h2>
					 	 	<i class="fa fa-credit-card" aria-hidden="true"></i>
							<label class="radio-inline">				 	
								<p><input type="radio" name="cb" value="cb"/> Carte de crédit</p>
							</label>

							<i class="fa fa-cc-paypal" aria-hidden="true"></i>
							<label class="radio-inline">
								<p><input type="radio" name="paypal" value="paypal"/> Paypal</p>
							</label>		
				</div>


				<div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-1">
						<p><label class="checkbox-inline">
							 <input type="checkbox" name="retrait" value="retrait"/> J'ai lu et j'accepte les conditions <a href=""/>générales de ventes</a>
						</label></p> 
						<button id="" type="button" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i>
						Continuer vos achats</button>

				</div>

				<div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-0 lastLine">
						 <button id="validPanier" type="button" class="btn btn-primary">Je valide ma commande</button>
				</div>
		</section>		
	</form>	

</section>
