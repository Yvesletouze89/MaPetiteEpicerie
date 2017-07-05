// CHRISTOPHE, il faut que tu changes dans les parties AJAX :

// 1. url : 'fichier-verifdonnees-de-christophe.php', 
// avec l'url de ton fichier qui va chercher l'identifiant et le mot de passe existant dans la base pour vérifier si il existe
                     
// 2. url : 'fichier-dinscription-de-christophe.php', 
// avec l'url de ton fichier qui permet d'insérer toutes les infos dans la base

// 3. Croiser les doigts !



// DECLARATION DES VARIABLES DE CONNEXION
var identifiantSaisi; //contiendra le nom saisi par l'utilisateur
var motdepasseSaisi; //contiendra le prenom saisi par l'utilisateur


// DECLARATION DES VARIABLES D'INSCRIPTION
var nomSaisi; //contiendra le nom saisi par l'utilisateur
var prenomSaisi; //contiendra le prenom saisi par l'utilisateur
var mailSaisi; //contiendra le mail saisi par l'utilisateur
var mail2Saisi; //contiendra le mail2 saisi par l'utilisateur
var passwordSaisi; //contiendra le password saisi par l'utilisateur
var password2Saisi; //contiendra le password2 saisi par l'utilisateur
var adresseSaisie; //contiendra l'adresse saisie par l'utilisateur
var cpSaisi; //contiendra le code postal saisi par l'utilisateur
var villeSaisie; //contiendra la ville saisie par l'utilisateur
var mobileSaisi; //contiendra le mobile saisi par l'utilisateur
var cgvCheck;// contiendra les cgv cochées par l'utilisateur
var civiliteM;// contiendra la civilite monsieur cochée par l'utilisateur
var civiliteMme;// contiendra la civilite madame cochée par l'utilisateur

$(function(){// un seul $function par fichier js

// RECUPERATION DONNEES CONNEXION ET LIEN FONCTION
    $("#identifiant").on('focusout', verifIdentifiant); // Déclenche le "merci de remplir" si champs non rempli
    $("#identifiant").on('focusin', stopWarningIdentifiant); // Enlève le "merci de remplir" quand on reclic dans le champs
    $("#motDePasse").on('focusout', verifMotDePasse);
    $("#motDePasse").on('focusin', stopWarningMotDePasse);
    //$("#submit1").hide();  bouton  de connexion caché à l'affichage du formulaire, s'affiche si tout rempli

// RECUPERATION DONNEES INSCRIPTION ET LIEN FONCTION
    $("#monsieur").on('change', verifCivilite); // bouton radio civilite monsieur madame
    $("#madame").on('change', verifCivilite); // bouton radio civilite monsieur madame
    $("#nom").on('focusout', verifNom); // Déclenche le "merci de remplir" si champs non rempli
    $("#nom").on('focusin', stopWarningNom); // Enlève le "merci de remplir" quand on reclic dans le champs
    $("#prenom").on('focusout', verifPrenom);
    $("#prenom").on('focusin', stopWarningPrenom);
    $("#email").on('focusout', verifMail1);
    $("#email").on('focusin', stopWarningMail);
    $("#email2").on('focusout', verifMail2);
    $("#email2").on('focusin', stopWarningMail2);
    $("#password").on('focusout', verifPassword);
    $("#password").on('focusin', stopWarningPassword);
    $("#password2").on('focusout', verifPassword2);
    $("#password2").on('focusin', stopWarningPassword2);
    $("#adresse1").on('focusout', verifAdresse);
    $("#adresse1").on('focusin', stopWarningAdresse);
    $("#CP").on('focusout', verifCp);
    $("#CP").on('focusin', stopWarningCp);
    $("#ville").on('focusout', verifVille);
    $("#ville").on('focusin', stopWarningVille);
    $("#mobile").on('focusout', verifMobile);
    $("#mobile").on('focusin', stopWarningMobile);
    $("#cgv").on('change', verifCGV); // Coche des CGV
    $("#submit2").hide(); // bouton  d'inscription caché à l'affichage du formulaire, s'affiche si tout rempli



}); // Fin de mon $function 



//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

// ::::::::::::::::::::::::::::::::::::CONNEXION:::::::::::::::::::::::::::::::::

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::



// **********************
//VERIFICATION IDENTIFIANT INSCRIT
//***********************


function verifIdentifiant(){
    identifiantSaisi = $("#identifiant").val();
        if (identifiantSaisi == "" ){
            $("#identifiant").addClass("form-control-warning");
            $("#identifiantZero").html("Merci d'indiquer votre identifiant (il s'agit ici de votre adresse mail).");
        }
}

function stopWarningIdentifiant(){
           $("#identifiant").removeClass("form-control-warning");
           $("#identifiantZero").html("");
        }
        

// **********************
//VERIFICATION MOT DE PASSE INSCRIT
//***********************

function verifMotDePasse(){
    motdepasseSaisi = $("#motDePasse").val();
        if (motdepasseSaisi == "" ){
            $("#motDePasse").addClass("form-control-warning");
            $("#mdpZero").html("Merci de rentrer votre mot de passe.");
        }
}

function stopWarningMotDePasse(){
           $("#motDePasse").removeClass("form-control-warning");
           $("#mdpZero").html("");
        }


//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

// ::::::::::::::::::::::::::::::::::INSCRIPTION:::::::::::::::::::::::::::::::::

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::



var validNom, validPrenom, validMail1, validMail2, validPassword1, validPassword2, validAdresse, validCP, validVille, validMobile, validCGV, validCivilite=0;  // Initialisation des var à 0



//*************************************************************************************************
// **********************
//VERIFICATION DE LA CIVILITE
//***********************


function verifCivilite(){
    civiliteM = $("#monsieur").val();
    civiliteMme = $("#madame").val();
    if (civiliteM == "monsieur" || civiliteMme == "madame"){
        validCivilite=1;
    }else{
        validCivilite=0;
    }
    validButtonInscription(); // si la civilite est rentrée "var=1" donc déclenche la fonction validButtonInscription qui affiche le bouton d'inscription
}


// **********************
//VERIFICATION NOM INSCRIT
//***********************


function verifNom(){
    nomSaisi = $("#nom").val();
        if (nomSaisi == "" ){
            $("#nom").addClass("form-control-warning");
            $("#nomZero").html("Merci d'indiquer votre nom.");
            validNom=0;
        }else{
            validNom=1;
        }
        validButtonInscription(); // si la civilite est rentrée "var=1" donc déclenche la fonction validButtonInscription qui affiche le bouton d'inscription
}

function stopWarningNom(){
           $("#nom").removeClass("form-control-warning");
           $("#nomZero").html("");
        }
        

// **********************
//VERIFICATION PRENOM INSCRIT
//***********************

function verifPrenom(){
    prenomSaisi = $("#prenom").val();
        if (prenomSaisi == "" ){
            $("#prenom").addClass("form-control-warning");
            $("#prenomZero").html("Merci d'indiquer votre prénom.");
            validPrenom=0;
        } else{
            validPrenom=1;
        }
        validButtonInscription(); // si la civilite est rentrée "var=1" donc déclenche la fonction validButtonInscription qui affiche le bouton d'inscription
}

function stopWarningPrenom(){
           $("#prenom").removeClass("form-control-warning");
           $("#prenomZero").html("");
        }
        
//*************************************************************************************************
// **********************
//VERIFICATION MAIL INSCRIT
//***********************

function verifMail1(){
    mailSaisi = $("#email").val();
        if (mailSaisi == "" ){
            $("#email").addClass("form-control-warning");
            $("#mailZero").html("Merci d'indiquer votre adresse mail.");
            validMail1=0;
        } else{
            validMail1=1;
        }
        validButtonInscription(); // si la civilite est rentrée "var=1" donc déclenche la fonction validButtonInscription qui affiche le bouton d'inscription
}

function stopWarningMail(){
            $("#email").removeClass("form-control-warning");
            $("#mailZero").html("");
        }

// **********************
//VERIFICATION MAIL2 INSCRIT
//***********************

function verifMail2(){
    mail2Saisi = $("#email2").val();
        if (mail2Saisi == "" ){
            $("#email2").addClass("form-control-warning");
            $("#mail2Zero").html("Merci de confirmer votre adresse mail.");
            validMail2=0;
        } else{
            validMail2=1;
        }
        validButtonInscription(); // si la civilite est rentrée "var=1" donc déclenche la fonction validButtonInscription qui affiche le bouton d'inscription
}

function stopWarningMail2(){
            $("#email2").removeClass("form-control-warning");
            $("#mail2Zero").html("");
        }

//*************************************************************************************************
// **********************
//VERIFICATION PASSWORD INSCRIT
//***********************

function verifPassword(){
    passwordSaisi = $("#password").val();
        if (passwordSaisi == "" ){
            $("#password").addClass("form-control-warning");
            $("#passwordZero").html("Merci d'indiquer un mot de passe.");
            validPassword1=0;
        } else{
            validPassword1=1;
        }
        validButtonInscription(); // si la civilite est rentrée "var=1" donc déclenche la fonction validButtonInscription qui affiche le bouton d'inscription
}

function stopWarningPassword(){
            $("#password").removeClass("form-control-warning");
            $("#passwordZero").html("");
        }

// **********************
//VERIFICATION PASSWORD2 INSCRIT
//***********************

function verifPassword2(){
    password2Saisi = $("#password2").val();
        if (password2Saisi == "" ){
            $("#password2").addClass("form-control-warning");
            $("#password2Zero").html("Merci de confirmer votre mot de passe.");
            validPassword2=0;
        } else{
            validPassword2=1;
        }
        validButtonInscription(); // si la civilite est rentrée "var=1" donc déclenche la fonction validButtonInscription qui affiche le bouton d'inscription
}

function stopWarningPassword2(){
            $("#password2").removeClass("form-control-warning");
            $("#password2Zero").html("");
        }


//*************************************************************************************************
// **********************
//VERIFICATION ADRESSE INSCRIT
//***********************

function verifAdresse(){
    adresseSaisie = $("#adresse1").val();
        if (adresseSaisie == "" ){
            $("#adresse1").addClass("form-control-warning");
            $("#adresseZero").html("Merci d'indiquer votre adresse.");
            validAdresse=0;
        } else{
            validAdresse=1;
        }
        validButtonInscription(); // si la civilite est rentrée "var=1" donc déclenche la fonction validButtonInscription qui affiche le bouton d'inscription
}

function stopWarningAdresse(){
            $("#adresse1").removeClass("form-control-warning");
            $("#adresseZero").html("");
        }

// **********************
//VERIFICATION CODE POSTAL INSCRIT
//***********************

function verifCp(){
    cpSaisi = $("#CP").val();
        if (cpSaisi == "" ){
            $("#CP").addClass("form-control-warning");
            $("#cpZero").html("Merci d'indiquer votre code postal.");
            validCP=0;
        } else{
            validCP=1;
        }
        validButtonInscription(); // si la civilite est rentrée "var=1" donc déclenche la fonction validButtonInscription qui affiche le bouton d'inscription
}

function stopWarningCp(){
            $("#CP").removeClass("form-control-warning");
            $("#cpZero").html("");
        }


// **********************
//VERIFICATION VILLE INSCRIT
//***********************

function verifVille(){
    villeSaisie = $("#ville").val();
        if (villeSaisie == "" ){
            $("#ville").addClass("form-control-warning");
            $("#villeZero").html("Merci d'indiquer votre ville.");
            validVille=0;
        } else{
            validVille=1;
        }
        validButtonInscription(); // si la civilite est rentrée "var=1" donc déclenche la fonction validButtonInscription qui affiche le bouton d'inscription
}

function stopWarningVille(){
            $("#ville").removeClass("form-control-warning");
            $("#villeZero").html("");
        }


//*************************************************************************************************
// **********************
//VERIFICATION MOBILE INSCRIT
//***********************

function verifMobile(){
    mobileSaisi = $("#mobile").val();
        if (mobileSaisi == "" ){
            $("#mobile").addClass("form-control-warning");
            $("#mobileZero").html("Merci d'indiquer votre mobile.");
            validMobile=0;
        } else{
            validMobile=1;
        }
        validButtonInscription(); // si la civilite est rentrée "var=1" donc déclenche la fonction validButtonInscription qui affiche le bouton d'inscription
}

function stopWarningMobile(){
            $("#mobile").removeClass("form-control-warning");
            $("#mobileZero").html("");
        }

//*************************************************************************************************
// **********************
//VERIFICATION DES CGV COCHEES OU NON
//***********************


function verifCGV(){
    cgvCheck = $("#cgv").is(':checked'); // On ne prend pas sur la valeur mais sur le check ou non
    if(cgvCheck == true){
        validCGV=1;
    }else{
        validCGV=0;
    }
    validButtonInscription(); // si la civilite est rentrée "var=1" donc déclenche la fonction validButtonInscription qui affiche le bouton d'inscription
}



//**************************************************************************************************
// **************************************************************************************************
//                         VISUALISATION DU BOUTON D'INSCRIPTION SI TOUT REMPLI
//***************************************************************************************************



function validButtonInscription(){
    if (validNom ==1 && validPrenom ==1 && validMail1 ==1 && validMail2 ==1 && validPassword1 ==1 && validPassword2 ==1 && validAdresse ==1 && validCP ==1 && validVille ==1 && validMobile ==1 && validCGV==1 && validCivilite==1){
        $("#submit2").show();
    }else{
        $("#submit2").hide();        
    }
}