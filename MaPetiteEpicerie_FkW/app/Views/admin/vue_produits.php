<?php $this->layout('layout', ['title' => 'Liste des produits']) ?>

<?php $this->start('main_content') ?>

	<h1></h1>
	<h1></h1>
	<div>
		<div>
			<table style=" border-collapse: collapse">
				<?php foreach($result as $key => $valeur)
				{ ?>
					<tr>
						<?php
						foreach($valeur as $cle )
						{ ?>
							<td style="border: solid 1px black; text-align: center;">
								<?php echo $cle;?>
							</td> <?php
				   		}?>
			   		</tr> <?php
		   		} ?>
		   	</table>
		</div>
	</div>

	<h1></h1>

	<a href="/MaPetiteEpicerie_FkW/public">Retour à page accueil</a>


<?php $this->stop('main_content') ?>
