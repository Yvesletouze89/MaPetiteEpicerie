// CHRISTOPHE, il faut que tu changes dans les parties AJAX :

// url : 'fichier-verifemail-de-christophe.php', 
// avec l'url de ton fichier qui va chercher l'email pour l'envoi du token par mail


// DECLARATION DES VARIABLES DE MDP OUBLIE - ENVOI EMAIL
var emailOubliSaisi; //contiendra le mail saisi par l'utilisateur pour son mdp oublié

// DECLARATION DES VARIABLES DE MDP OUBLIE - GENERE NOUVEAU MDP
var nvMdpSaisi1; //contiendra le premier mdp saisi par l'utilisateur pour son mdp oublié
var nvMdpSaisi2; //contiendra le deuxieme mdp saisi par l'utilisateur pour son mdp oublié


$(function(){// un seul $function par fichier js

// RECUPERATION DONNEES EMAIL POUR LE MDP OUBLIE ET LIEN FONCTION
    $("#mailOubli").on('focusout', verifEmailOubli); // Déclenche le "merci de remplir" si champs non rempli
    $("#mailOubli").on('focusin', stopWarningEmailOubli); // Enlève le "merci de remplir" quand on reclic dans le champs
    $("#submit3").hide(); // bouton  d'envoie de mdp oublié caché à l'affichage du formulaire, s'affiche si tout rempli

// RECUPERATION DONNEES DU NOUVEAU MDP PAR 2 POUR LE MDP OUBLIE ET LIEN FONCTION
    $("#passwordNew1").on('focusout', verifPasswordNew1); // Déclenche le "merci de remplir" si champs non rempli
    $("#passwordNew1").on('focusin', stopWarningPasswordNew1); // Enlève le "merci de remplir" quand on reclic dans le champs
    $("#passwordNew2").on('focusout', verifPasswordNew2); // Déclenche le "merci de remplir" si champs non rempli
    $("#passwordNew2").on('focusin', stopWarningPasswordNew2); // Enlève le "merci de remplir" quand on reclic dans le champs
    $("#submit4").hide(); // bouton  d'envoi du nouveau mdp caché à l'affichage du formulaire, s'affiche si tout rempli


// PARTIE AJAX D'ENVOI DU FORMULAIRE DE MDP OUBLIE A LA BASE DE DONNEES POUR ENVOI DU MAIL
    $("#formSubmit3").on("submit3", function(envoiFormulaireMdpOubli){
        envoiFormulaireMdpOubli.preventDefault();
                   $.ajax({
                        url : 'fichier-de-christophe.php',
                        type : 'POST',
                        data : 'email=' + emailOubliSaisi
                        // déclarer même les champs qui ne sont pas obligatoires
                    })
                    .done(function(){
                        $("#formOk1").html("Un mail vous a été envoyé, jetez un coup d'oeil à votre boîte de réception.");
                    })
                    .fail(function(){
                        console.log("Petit problème !");
                    });
    });


// PARTIE AJAX DE CREATION D'UN NOUVEAU MOT DE PASSE. LIEN RECU PAR MAIL
    $("#formSubmit4").on("submit4", function(envoiNouveauMotdepasse){
        envoiNouveauMotdepasse.preventDefault();
            if(nvMdpSaisi1 == nvMdpSaisi2){
                   $.ajax({
                        url : 'fichier-de-christophe.php',
                        type : 'POST',
                        data : 'password=' + nvMdpSaisi1
                        // déclarer même les champs qui ne sont pas obligatoires
                    })
                    .done(function(){
                        $("#formOk2").html("Votre nouveau mot de passe est bien généré. Merci.");
                    })
                    .fail(function(){
                        console.log("Petit problème !");
                    });
            }else{
                $("#formOk2").html("Merci d'indiquer deux mots de passe identiques.");
            }
    });

}); // Fin de mon $function 




//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

// ::::::::::::::::::::::::::EMAIL POUR MDP OUBLIE:::::::::::::::::::::::::::::::

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::


var validEmailOubli=0; // Initialisation des var à 0


// **********************
//VERIFICATION EMAIL INSCRIT
//***********************


function verifEmailOubli(){
    emailOubliSaisi = $("#mailOubli").val();
        if (emailOubliSaisi == "" ){
            $("#mailOubli").addClass("form-control-warning");
            $("#mailOubliZero").html("Merci d'indiquer votre mail pour le renvoi d'un nouveau mot de passe.");
            validEmailOubli=0;
        }else{
            validEmailOubli=1;
        }
        validButtonOubli(); // si le mail pour nouveau mdp est rentrée"var=1" donc déclenche la fonction validButton qui affiche le bouton d'envoi
}

function stopWarningEmailOubli(){
           $("#mailOubli").removeClass("form-control-warning");
           $("#mailOubliZero").html("");
        }
        



//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

// ::::::::::::::::::::::NOUVEAU MDP POUR MDP OUBLIE:::::::::::::::::::::::::::::

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::


var validNvMdp1, validNvMdp2=0; // Initialisation des var à 0


// **********************
//VERIFICATION 2 NOUVEAU MDP INSCRITS 1
//***********************


function verifPasswordNew1(){
    nvMdpSaisi1 = $("#passwordNew1").val();
        if (nvMdpSaisi1 == "" ){
            $("#passwordNew1").addClass("form-control-warning");
            $("#nvMdpZero1").html("Merci d'indiquer vottre nouveau mot de passe.");
            validNvMdp1=0;
        }else{
            validNvMdp1=1;
        }
        validButtonNvMdp(); // si le mdp pour nouveau mdp est rentrée"var=1" donc déclenche la fonction validButton qui affiche le bouton d'envoi
}

function stopWarningPasswordNew1(){
           $("#passwordNew1").removeClass("form-control-warning");
           $("#nvMdpZero1").html("");
        }
        

// **********************
//VERIFICATION 2 NOUVEAU MDP INSCRITS 2
//***********************


function verifPasswordNew2(){
    nvMdpSaisi2 = $("#passwordNew2").val();
        if (nvMdpSaisi2 == "" ){
            $("#passwordNew2").addClass("form-control-warning");
            $("#nvMdpZero2").html("Merci de rentrer à nouveau votre mot de passe.");
            validNvMdp2=0;
        }else{
            validNvMdp2=1;
        }
        validButtonNvMdp(); // si le mdp pour nouveau mdp est rentrée"var=1" donc déclenche la fonction validButton qui affiche le bouton d'envoi
}

function stopWarningPasswordNew2(){
           $("#passwordNew2").removeClass("form-control-warning");
           $("#nvMdpZero2").html("");
        }
        




//**************************************************************************************************
// **************************************************************************************************
//                         VISUALISATION DU BOUTON DE LEMAIL DE MDP OUBLIE SI TOUT REMPLI
//***************************************************************************************************


function validButtonOubli(){
    if (validEmailOubli ==1){
        $("#submit3").show();
    }else{
        $("#submit3").hide();        
    }
}

//**************************************************************************************************
// **************************************************************************************************
//                         VISUALISATION DU BOUTON DU NOUVEAU MDP x2 DE MDP OUBLIE SI TOUT REMPLI
//***************************************************************************************************


function validButtonNvMdp(){
    if (validNvMdp1 ==1 && validNvMdp2 == 1){
        $("#submit4").show();
    }else{
        $("#submit4").hide();        
    }
}