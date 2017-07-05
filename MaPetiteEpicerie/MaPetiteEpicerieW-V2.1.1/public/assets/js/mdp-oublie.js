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
     //$("#submit3").hide(); bouton  d'envoie de mdp oublié caché à l'affichage du formulaire, s'affiche si tout rempli

// RECUPERATION DONNEES DU NOUVEAU MDP PAR 2 POUR LE MDP OUBLIE ET LIEN FONCTION
    $("#passwordNew1").on('focusout', verifPasswordNew1); // Déclenche le "merci de remplir" si champs non rempli
    $("#passwordNew1").on('focusin', stopWarningPasswordNew1); // Enlève le "merci de remplir" quand on reclic dans le champs
    $("#passwordNew2").on('focusout', verifPasswordNew2); // Déclenche le "merci de remplir" si champs non rempli
    $("#passwordNew2").on('focusin', stopWarningPasswordNew2); // Enlève le "merci de remplir" quand on reclic dans le champs
  //  $("#submit4").hide();  bouton  d'envoi du nouveau mdp caché à l'affichage du formulaire, s'affiche si tout rempli

}); // Fin de mon $function 


// **********************
//VERIFICATION EMAIL INSCRIT
//***********************


function verifEmailOubli(){
    emailOubliSaisi = $("#mailOubli").val();
        if (emailOubliSaisi == "" ){
            $("#mailOubli").addClass("form-control-warning");
            $("#mailOubliZero").html("Merci d'indiquer votre mail pour le renvoi d'un nouveau mot de passe.");
        }
}

function stopWarningEmailOubli(){
           $("#mailOubli").removeClass("form-control-warning");
           $("#mailOubliZero").html("");
        }
        

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

// ::::::::::::::::::::::NOUVEAU MDP POUR MDP OUBLIE:::::::::::::::::::::::::::::

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::



// **********************
//VERIFICATION 2 NOUVEAU MDP INSCRITS 1
//***********************


function verifPasswordNew1(){
    nvMdpSaisi1 = $("#passwordNew1").val();
        if (nvMdpSaisi1 == "" ){
            $("#passwordNew1").addClass("form-control-warning");
            $("#nvMdpZero1").html("Merci d'indiquer vottre nouveau mot de passe.");
        }
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
        }
}

function stopWarningPasswordNew2(){
           $("#passwordNew2").removeClass("form-control-warning");
           $("#nvMdpZero2").html("");
        }









        
