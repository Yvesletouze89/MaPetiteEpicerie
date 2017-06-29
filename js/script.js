// var previousScroll = 0;
//             $(window).scroll(function(event){
//                var scroll = $(this).scrollTop();
//                if (scroll > previousScroll){
//                    $(".menu").filter(':not(:animated)').slideUp();
//                } else {
//                   $(".menu").filter(':not(:animated)').slideDown();
//                }
//                previousScroll = scroll;
//             });


$(function(){
	// $('#platsJour')on('click',affichePlatsjour);//lorsque click sur plats du jour, lance fonction affichage liste produits
	// $('#boissons')on('click',affiche);
	// $('#fruitLegume')on('click',affiche);
	// $('#surgeles')on('click',affiche);
	// $('#EpSalee')on('click',affiche);
	// $('#EpSucree')on('click',affiche);
	// $('#hygiene')on('click',affiche);
	// $('#entretien')on('click',affiche);
	// $('#promo')on('click',affiche);
	// $('#nouveau')on('click',affiche);


});


var nom 
var email 
var sujet 
var message 

function submitForm(){
	nom = $("#nom").val(); 
	email = $("#email").val(); 
	sujet = $("#sujet").val();
	message = $("#message").val();
	prenom = $("#prenom").val();
	tel = $("#tel").val();
	if ((nom != "") && (email != "") && (sujet != "") && (message != "")){
		$.ajax({
				url : 'action_form.php',//on passe l'id le plus récent au fichier de chargement
		       type : 'POST',
		       data : 'nom='+ nom +'&email='+ email +'&sujet='+ sujet +'&message='+ message+'&prenom='+ prenom+'&tel='+ tel
		   }).done(function(reponse){
		   		$("#response").html(reponse);
		   }).fail(function(){
				console.log("Petit problème!");
			});

	}else{
		document.getElementById("validation").innerHTML = "<p> Pour valider, merci de renseigner tous les champs du formulaire précédés d'une * </p>"; $(".endForm");
	}
}

//API MAP

// Fonction de callback en cas de succès
if(navigator.geolocation) {
    survId = navigator.geolocation.getCurrentPosition(surveillePosition,erreurPosition);
	function surveillePosition(position) 
	{
	    var infopos = "Position déterminée :\n";
	    infopos += "Latitude : "+position.coords.latitude +"\n";
	    infopos += "Longitude: "+position.coords.longitude+"\n";
	    infopos += "Altitude : "+position.coords.altitude +"\n";
	    infopos += "Vitesse  : "+position.coords.speed +"\n";
	    document.getElementById("infoposition").innerHTML = infopos;
	}
}else{
	function erreurPosition(error) {
    var info = "Erreur lors de la géolocalisation : ";
    switch(error.code) 
    {
    case error.TIMEOUT:
    	info += "Timeout !";
    break;
    case error.PERMISSION_DENIED:
	info += "Vous n’avez pas donné la permission";
    break;
    case error.POSITION_UNAVAILABLE:
    	info += "La position n’a pu être déterminée";
    break;
    case error.UNKNOWN_ERROR:
	info += "Erreur inconnue";
    break;
    }
    document.getElementById("infoposition").innerHTML = info;
	}
}


