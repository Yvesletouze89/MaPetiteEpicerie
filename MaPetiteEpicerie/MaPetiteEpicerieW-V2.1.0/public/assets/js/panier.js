$(function(){
	$('#listHoraires').hide();//lorsque click sur plats du jour, lance fonction affichage liste produits
    $('#livraison').on('change',choixHoraire);    
    $('#retrait').on('change',choixHoraire);
	
});


var modeRecup;
var modePaiement;
var cgv;

function confirmPanier(){
    modeRecup = $('input[type=radio][name=inlineRadioOptions]:checked').length;  //$('#modeRecup').val();
    horaire = $('input[type=radio][name=inlineRadioOptions3]:checked').length;
    modePaiement = $('input[type=radio][name=inlineRadioOptions2]:checked').length;  //$('#modePaiement').val();
    cgv = $('#cgv').is(':checked');
   
   
    
    if (modeRecup == 1 && horaire == 1)//("livraison") || (modeRecup == "retrait")
    {
        if(modePaiement == 1)// ("cb") || (modePaiement == "paypal")
        {
            if(cgv == true)
            { 
                $("#repPanier").html('Votre commande a bien été envoyée');
                $("#formPanier").toggle();
            }
            else
            {
                 $("#repPanier").html('Merci de cocher les conditions générales de ventes');
            }
        // $.ajax({
        //      url : 'action_form.php',//on passe l'id le plus récent au fichier de chargement
        //        type : 'POST',
        //        data : 'modeRecup='+ modeRecup +'&modePaiement='+ modePaiement 
        //    }).done(function(reponse){
        //          $("#responsePanier").html(reponse);
        //    }).fail(function(){
        //      console.log("Petit problème!");
        //  });
        }
        else
        {
            $("#repPanier").html('vous n\'avez pas indiquer votre moyen de paiement');

        }       
    }
    else
    {
        $("#repPanier").html('Pour valider, merci de renseigner votre choix pour la récupération de vos achats ainsi que le créseau horaire');
    }
}


function choixHoraire(){
    $('#listHoraires').show();
}