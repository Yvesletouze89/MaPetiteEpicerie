
var civilite;
var nom;
var prenom;
var email; 
var tel;
var sujet; 
var message;  


function validContact(){
	civilite = $('#civilite:checked').val();
    nom = $("#nom").val(); 
    prenom = $("#prenom").val();
    tel = $("#tel").val(); 
    email = $("#email").val(); 
    sujet = $("#sujet").val();
    message = $("#message").val();
    
    if ((nom != "") && (email != "") && (sujet != "") && (message != "")){
        // $.ajax({
        //      url : 'action_form.php',//on passe l'id le plus récent au fichier de chargement
        //        type : 'POST',
        //        data : 'civilite='+ civilite +'&nom='+ nom +'&prenom='+ prenom +'&tel='+ tel +'&email='+ email +'&sujet='+ sujet +'&message='+ message
        //    }).done(function(reponse){
        //          $("#response").html(reponse);
        //    }).fail(function(){
        //      console.log("Petit problème!");
        //  });

        document.getElementById("formulaire").style.display="none";document.getElementById("validation").innerHTML = "<p>Formulaire validé</p><p>nos services traiteront votre demande dans les plus brefs délais</p>"; document.getElementsByClassName("endForm");
	}else{
		document.getElementById("validation").innerHTML = "<p> Pour valider, merci de renseigner tous les champs du formulaire précédés d'une * </p>"; $(".endForm");
	}
}

