<?php $this->layout('layout', ['title' => 'Mise à jour des produits du stock']) ?>

<?php $this->start('main_content') ?>
<form method="post" action="../enregistreMaj" >
	<h1></h1>
	<h1></h1>
	<div class="row" style="border: 3px solid red">
		<div class="col-xs-8">
			<p><?php echo $produit['descriptif']; ?></p>
			<p><?php echo ($produit['poids_volume'] . $produit['unites']); ?></p>
			<p><?php echo $produit['marque']; ?></p>
			<p><?php echo $produit['categorie']; ?></p>
			<p><?php echo $produit['ingredients']; ?></p>
		</div>
		<div class="col-xs-4">
			<img src="<?= $this->assetUrl($produit['photo']) ?>" style='max-height: 150px'>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-3" >
			<label>Stock</label></br>
			<input id="stock"  type="number" name="" value="<?php echo $produit['stock']; ?>" style="color: black; width: 35%">
			
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

		<div class="col-xs-3" >
			<label>Prix</label></br>
			<input type="text" name="" value="0.00" style="width:50%; text-align: right; color:black;"> 
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<h1></h1>
			<h1></h1>
			<button type="submit" style="color:black" >Valider</button>
		</div>
	</div>



	<h2></h2>
	<?php var_dump($produit); ?>
	<h1></h1>
	<input type="text" name="essai" title="essai" value="essai">
	<h1><?php echo $produit['marque']; ?></h1>
	<h1></h1>
	<a href="../maj_stock" class="btn btn-danger" role="button" style="width: 450px; background-color: green">Annuler la mise à jour</a> 
	<h1></h1>
	<a href="../accueil_admin" class="btn btn-danger" role="button" style="width: 450px; background-color: green">Retour à l'accueil Admin</a> 
</form>


<?php $this->stop('main_content') ?>

<!-- 
array(18) { ["ID_stock"]=> string(2) "17" ["produits_ID_prod"]=> string(1) "3" ["utilisateurs_ID_util"]=> string(1) "0" ["prix"]=> NULL ["prix_old"]=> NULL ["promo"]=> string(3) "OUI" ["nouveau"]=> string(3) "OUI" ["stock"]=> string(1) "0" ["ID_prod"]=> string(1) "3" ["categories_categorie"]=> string(0) "" ["descriptif"]=> string(22) "Paquet de tagliatelles" ["poids_volume"]=> string(3) "500" ["unites"]=> string(1) "g" ["marque"]=> string(7) "Panzani" ["photo"]=> NULL ["categorie"]=> string(15) "Epicerie salée" ["ingredients"]=> NULL ["code_barre"]=> NULL }  -->