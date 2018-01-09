<section class="row">
	<div class="col-xs-12 page-header">
		<h1>Ma petite Epicerie : <small>votre drive épicier</small></h1>
	</div>
</section>

<section class="row">
	
	<form>
		<fieldset>
			<div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-1">
				<div>
					<h2>Je recherche mon épicier :</h2>
						<h3><a href="">Me géolocaliser
								<!-- <span class="iconeSearch"> --><i class="fa fa-map-marker" aria-hidden="true"></i><!-- </span> -->
							</a>
						</h3>
						<div id="infoposition"></div>
						<p>ou</p>
						<div class="input-group zoneSaisie">
							<input type="text" class="form-control search" placeholder="Entrez une ville ou un code postal"/>
							<span class="input-group-btn search2">
								<button class="btn btn-default" type="button">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
							</span>
						</div>
				</div>
			</div>

			<div class="col-xs-10 col-xs-offset-0 col-md-5 col-md-offset-0 textCenter">
				<div id="infoposition"></div>
				<iframe id="map" src="https://www.google.com/maps/d/embed?mid=1q43wFsWgrGriOmpt51FUuyEFiTY" width="640" height="480"></iframe>
				
			</div>
		<!-- hello -->
		</fieldset>

	</form>

</section>