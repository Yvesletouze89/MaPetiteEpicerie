<?php $this->layout('layout', ['title' => 'Mise à jour des produits du stock']) ?>

<?php $this->start('main_content') ?>

<form method="post" action="../update_stock">


	<h1></h1>
	<h1></h1>
	<div class="row" style="border: 3px solid red">
		<div class="col-xs-8">
			<p><?php echo $produit['descriptif']; ?></p>
			<span id="pv" ><?php echo $produit['poids_volume'];?></span><span id="unit"><?php echo $produit['unites']; ?></span>
			<p><?php echo $produit['marque']; ?></p>
			<p><?php echo $produit['categorie']; ?></p>
			<p><?php echo $produit['ingredients']; ?></p>
			<input type="text" name="produits_ID_prod" value="<?php echo $produit['produits_ID_prod']; ?>" style="display:none; color:black ">
			<input type="text" name="ID_prod" value="<?php echo $produit['ID_prod']; ?>" style="display:none; color:black ">
			<input type="text" name="ID_stock" value="<?php echo $produit['ID_stock']; ?>" style="display:none; color:black ">
		</div>
		<div class="col-xs-4">
			<img src="<?= $this->assetUrl($produit['photo']) ?>" style='max-height: 150px'>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-3" >
			<label>Stock</label></br>
			<input id="stock"  type="number" name="stock" value="<?php echo $produit['stock']; ?>" style="color: black; width: 35%">
		</div>

		<div class="col-xs-3" >
			<label>Prix</label></br>
			<input id="prix" type="number" value="<?php echo $produit['prix']; ?>" step="0.01" name="prix" min="0" style="width:50%; text-align: right;color:black;">
			<label>Prix (en euros) :<input id="prixParUnit" value="<?php echo $produit['prix_unit']; ?>" name="prix_unit" step="0.01" type="number" style="-moz-appearance: textfield; color:black"/></label>
			<label>Par (unités) :<input id="unitBase" value="<?php echo $produit['unite_base']; ?>" name="unite_base" type="text" style="-moz-appearance: textfield; color:black"/></label>

		</div>

		<div class="col-xs-3" >
			<label>Nouveau</label></br>
			<select id="nouveau" style="color:black" name="nouveau" >
				<option <?php if($produit['nouveau']=='NON') echo 'selected';?>>NON</option>
				<option <?php if($produit['nouveau']=='OUI') echo 'selected';?>>OUI</option>
			</select>
			<h1></h1>
			<img id="photoNew" src="<?= $this->assetUrl('img/Nouveau.gif') ?>" style='max-height: 40px; <?php if($produit['nouveau']=='NON') echo 'display:none'; else  echo 'display:inline';?>'>
		</div>

		<div class="col-xs-3" >
			<label>Promo</label></br>
			<select id="promo" style="color:black" value="bof" name="promo">
				<option <?php if($produit['promo']=='NON') echo 'selected';?>>NON</option>
				<option <?php if($produit['promo']=='OUI') echo 'selected';?>>OUI</option>
			</select>
			<h1></h1>
			<img id="photoPromo" src="<?= $this->assetUrl('img/promo.gif') ?>" style='max-height: 40px; <?php if($produit['promo']=='NON') echo 'display:none'; else  echo 'display:inline';?>'>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div id="message" style="border: solid 1px black; color: red; text-align: center; font-size: 25px"; >
			</div>
			<!-- <h1></h1>
			<h1></h1>
			<button type="submit" style="color:black" >Valider</button> -->
		</div>
	</div>

	<h1></h1>
	<h1></h1>
		
	<!-- Fenetre Modale gestion Promo -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
		<div class="modal-dialog" role="document" >
			<div class="modal-content" style=" background-color: black">
				<div class="modal-body" style="text-align: center;">
					<h1></h1>
					<label>Ancien prix :
						<input id="prixoldtemp" type="number" step="0.01" style=" -moz-appearance: textfield; color:black"/>
					</label>
					<h1></h1>
					<label>Nouveau prix :
						<input id="prixnewtemp" type="number" step="0.01"  name="" min="0" style="color:black">
					</label>
					<h1></h1>
					<label>Remise :
						<input id="remisetemp" type="number" step="0.01"  name="" value="0" max="0" style="color:black"> %
					</label>
					<h1></h1>
					<div>
					<label>Valable jusqu'au : <input type="text" id="datepicker" placeholder="JJ/MM/AAAA" style="color:black"></label>
					</div>
					<h1></h1>
					<div id="messagefm" value="" style="background-color: white; color: red; border: none;width: 100%; text-align: center; font-size: 25px" value="toto">
					</div>
					<h1 > </h1>
				</div>
				<div class="modal-footer" style="text-align: center;">
					<button type="button" id="validPromo" class="btn btn-default" >Valider</button>
					<button id="annulPromo" type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				</div>
			</div>
		</div>
	</div>

	<div id="detailPromo" class="row" style=" <?php if($produit['promo']=='NON') echo 'display:none'; else  echo 'display:inline';?>">
		
		<div class="col-xs-4">
			<h1></h1>
			<label>Ancien prix :
				<input id="prix_old" name="prix_old" step="0.01"   type="number" style=" -moz-appearance: textfield; color:black"/>
			</label>
		</div>
		<div class="col-xs-4">
			<h1></h1>
			<label>Remise : (en %)
				<input id="remise" name="remise" step="0.01" type="number" style=" -moz-appearance: textfield; color:black">
			</label>
		</div>
		<div class="col-xs-4">
			<h1></h1>
			<label>Valable jusqu'au : 
				<input type="text" id="datevalid" name="datevalid" style="color:black">
			</label>
		</div>
	</div>
	
	<h1></h1>
	<div id="message" style="border: solid 1px black; color: red; text-align: center; font-size: 25px"; >
	</div>
	<h1></h1>
	<button id="valMajStock" type="button" style="color:black">Valider</button>
	<h1></h1>
	<a href="../maj_stock" class="btn btn-danger" role="button" style="width: 450px; background-color: green">Annule et retourne à la mise à jour</a> 

	<!-- Fenetre Modale vérif Validation -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
		<div class="modal-dialog" role="document" >
			<div class="modal-content" style=" background-color: black">
				<div class="modal-body" style="text-align: center;">
					<h1></h1>
					<h1>Récapitulatif de votre mise à jour :</h1>
					<h1></h1>
					<p><?php echo ($produit['descriptif']." - ".$produit['poids_volume'] . $produit['unites']. " - ".$produit['marque']); ?></p></br>
					<span>Prix : <span id="c1"></span> €</span></br>
					<span>Prix (en €) : <span id="c8"></span> €</span></br>
					<span>Par (unités) : <span id="c9"></span> €</span></br>
					<span>Stock : </span><span id="c5"></span></br>
					<span>Nouveau : </span><span id="c6"></span></br>
					<span>Promo : </span><span id="c7"></span></br>
					<span>Ancien prix : </span><span id="c4"></span></br>
					<span>Remise : <span id="c2"></span> %</span></br>
					<span>Date de validité : </span><span id="c3"></span></br>

					
					<h1></h1>
					<div id="messagefm2" value="" style="background-color: white; color: red; border: none;width: 100%; text-align: center; font-size: 25px" value="toto">
					</div>
					<h1 > </h1>
				</div>
				<div class="modal-footer" style="text-align: center;">
					<button type="submit"  id="upda" class="btn btn-default" >Valider Modifications</button>
					<button id="annulfm2" type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				</div>
			</div>
		</div>
	</div>







</form>


<?php $this->stop('main_content') ?>
