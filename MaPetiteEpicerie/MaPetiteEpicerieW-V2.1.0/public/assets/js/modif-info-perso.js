$(function(){

// Parties cachées à l'ouverture de la page
    $("#affichediv1").hide();
    $("#affichediv2").hide();
    $("#accordion").hide();
// Click bouton pour afficher les parties cachées
    $("#infoPerso").on('click', afficheDiv1);
    $("#modifMdp").on('click', afficheDiv2);
    $("#historique").on('click', afficheDiv3);

// Affichage en accordéon des anciennes commandes 
    $("#accordion").accordion({heightStyle:'panel'}); // S'adapte au panneau


// RECUPERATION DONNEES MODIFICATIONS INFOS PERSO ET LIEN FONCTION   
    $("#passwordMI").on('focusout', verifPasswordMI);
    $("#passwordMI").on('focusin', stopWarningPasswordMI);
    $("#nomMI").on('focusout', verifNomMI); // Déclenche le "merci de remplir" si champs non rempli
    $("#nomMI").on('focusin', stopWarningNomMI); // Enlève le "merci de remplir" quand on reclic dans le champs
    $("#prenomMI").on('focusout', verifPrenomMI);
    $("#prenomMI").on('focusin', stopWarningPrenomMI);
    $("#emailMI").on('focusout', verifMailMI);
    $("#emailMI").on('focusin', stopWarningMailMI);
    $("#adresse1MI").on('focusout', verifAdresseMI);
    $("#adresse1MI").on('focusin', stopWarningAdresseMI);
    $("#CPMI").on('focusout', verifCpMI);
    $("#CPMI").on('focusin', stopWarningCpMI);
    $("#villeMI").on('focusout', verifVilleMI);
    $("#villeMI").on('focusin', stopWarningVilleMI);
    $("#mobileMI").on('focusout', verifMobileMI);
    $("#mobileMI").on('focusin', stopWarningMobileMI);

// Récuperation des données pour le changement du mdp
    /*$("#passwordOld").on('focusout', verifPasswordOld); // Déclenche le "merci de remplir" si champs non rempli
    $("#passwordOld").on('focusin', stopWarningPasswordOld);*/ // Enlève le "merci de remplir" quand on reclic dans le champs
    $("#passwordNew1").on('focusout', verifPasswordNew1);
    $("#passwordNew1").on('focusin', stopWarningPasswordNew1);
    $("#passwordNew2").on('focusout', verifPasswordNew2);
    $("#passwordNew2").on('focusin', stopWarningPasswordNew2);
    
    $("#Submit12").on('click', envoiFormulaireChangementMdp);
    $("#Submit11").on('click', envoiFormulaireChangementInfoPerso);




    
});


//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

// :::::::::::::::::CHANGEMENT INFORMATIONS PERSONNELLES:::::::::::::::::::::::::

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::


// PARTIE AJAX D'ENVOI DU FORMULAIRE DE CHANGEMENT DU MOT DE PASSE A LA BASE DE DONNEES
function envoiFormulaireChangementMdp(e)
{
    e.preventDefault();
    var id = $('.id').val();

    if($("#passwordNew1").val() == $("#passwordNew2").val()){
                $.ajax({
                    url : 'modifinfo-personnel',
                    type : 'POST',
                    data : 'submit=formSubmit12&id=' + id + '&password=' + $("#passwordNew1").val()
                    // déclarer même les champs qui ne sont pas obligatoires
                })
                .done(function(){
                    console.log('test' + id);
                    $("#formOk12").html("Votre mot de passe a bien été modifié !");
                })
                .fail(function(){
                    console.log("Petit problème !");
                });
        }else{
            $("#formOk12").html("Merci d'indiquer deux mots de passe identiques.");
        }

};




// PARTIE AJAX D'ENVOI DU FORMULAIRE DE CHANGEMENT D'INFO PERSO A LA BASE DE DONNEES
  function envoiFormulaireChangementInfoPerso(e){
        e.preventDefault();
        var id = $('id').val();
                    $.ajax({
                        url : 'ajax',
                        type : 'POST',
                        data : 'submit=formSubmit11&id=' + id + '&password=' + $("#passwordMI").val() + 'nom=' + $("#nomMI").val() + '&prenom=' + $("#prenomMI").val() + '&email=' + $("#emailMI").val()
                       + '&adresse1=' + $("#adresse1MI").val() + '&adresse2=' + $("#adresse2MI").val()
                       + '&CP=' + $("#CPMI").val() + '&ville=' + $("#villeMI").val()
                       + '&tel=' + $("#telMI").val() + '&mobile=' + $("#mobileMI").val()
                        // déclarer même les champs qui ne sont pas obligatoires
                    })
                    .done(function(){
                        $("#formOk12").html("info été modifié !");
                    })
                    .fail(function(){
                        console.log("Petit problème !");
                    });

    };









// Fonction pour l'affichage de la partie 1 cachée
function afficheDiv1(){
        $("#affichediv1").toggle();     
    }
// Fonction pour l'affichage de la partie 2 cachée
function afficheDiv2(){
        $("#affichediv2").toggle();     
    }
// Fonction pour l'affichage de la partie 3 cachée
function afficheDiv3(){
        $("#accordion").toggle();     
    }






//*************************************************************************************************
// **********************
//VERIFICATION PASSWORD INSCRIT
//***********************

function verifPasswordMI(){
        if ($("#passwordMI").val() == "" ){
            $("#passwordMI").addClass("form-control-warning");
            $("#passwordMIZero").html("Merci d'indiquer un mot de passe.");
        }
}

function stopWarningPasswordMI(){
            $("#passwordMI").removeClass("form-control-warning");
            $("#passwordMIZero").html("");
        }


// **********************
//VERIFICATION NOM INSCRIT
//***********************


function verifNomMI(){
        if ($("#nomMI").val() == "" ){
            $("#nomMI").addClass("form-control-warning");
            $("#nomMIZero").html("Merci d'indiquer votre nom.");
        }
    }

function stopWarningNomMI(){
           $("#nomMI").removeClass("form-control-warning");
           $("#nomMIZero").html("");
        }
        

// **********************
//VERIFICATION PRENOM INSCRIT
//***********************

function verifPrenomMI(){
        if ($("#prenomMI").val() == ""){
            $("#prenomMI").addClass("form-control-warning");
            $("#prenomMIZero").html("Merci d'indiquer votre prénom.");
        }
    }

function stopWarningPrenomMI(){
           $("#prenomMI").removeClass("form-control-warning");
           $("#prenomMIZero").html("");
        }
        
//*************************************************************************************************
// **********************
//VERIFICATION MAIL INSCRIT
//***********************

function verifMailMI(){
        if ($("#emailMI").val() == "" ){
            $("#emailMI").addClass("form-control-warning");
            $("#mailMIZero").html("Merci d'indiquer votre adresse mail.");
        }
    }

function stopWarningMailMI(){
            $("#emailMI").removeClass("form-control-warning");
            $("#mailMIZero").html("");
        }


//*************************************************************************************************
// **********************
//VERIFICATION ADRESSE INSCRIT
//***********************

function verifAdresseMI(){
        if ($("#adresse1MI").val() == "" ){
            $("#adresse1MI").addClass("form-control-warning");
            $("#adresseMIZero").html("Merci d'indiquer votre adresse.");
        }
    }

function stopWarningAdresseMI(){
            $("#adresse1MI").removeClass("form-control-warning");
            $("#adresseMIZero").html("");
        }

// **********************
//VERIFICATION CODE POSTAL INSCRIT
//***********************

function verifCpMI(){
        if ($("#CPMI").val() == "" ){
            $("#CPMI").addClass("form-control-warning");
            $("#cpMIZero").html("Merci d'indiquer votre code postal.");
        }
    }

function stopWarningCpMI(){
            $("#CPMI").removeClass("form-control-warning");
            $("#cpMIZero").html("");
        }


// **********************
//VERIFICATION VILLE INSCRIT
//***********************

function verifVilleMI(){
        if ($("#villeMI").val() == "" ){
            $("#villeMI").addClass("form-control-warning");
            $("#villeMIZero").html("Merci d'indiquer votre ville.");
        }
    }

function stopWarningVilleMI(){
            $("#villeMI").removeClass("form-control-warning");
            $("#villeMIZero").html("");
        }


//*************************************************************************************************
// **********************
//VERIFICATION MOBILE INSCRIT
//***********************

function verifMobileMI(){
        if ($("#mobileMI").val() == "" ){
            $("#mobileMI").addClass("form-control-warning");
            $("#mobileMIZero").html("Merci d'indiquer votre mobile.");
        }
    }

function stopWarningMobileMI(){
            $("#mobileMI").removeClass("form-control-warning");
            $("#mobileMIZero").html("");
        }


//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

// :::::::::::::::::::::::CHANGEMENT DE MOT DE PASSE:::::::::::::::::::::::::::::

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::



// ************************
//VERIFICATION ANCIEN MDP
//*************************

/*function verifPasswordOld(){
    if ($("#passwordOld").val() == ""){
            $("#passwordOld").addClass("form-control-warning");
            $("#passwordOldZero").html("Merci d'indiquer votre ancien mot de passe.");
    }
}

function stopWarningPasswordOld(){
           $("#passwordOld").removeClass("form-control-warning");
           $("#passwordOldZero").html("");
        }*/
      

// ************************
//VERIFICATION NOUVEAU MDP 1
//*************************

function verifPasswordNew1(){
    if ($("#passwordNew1").val() == ""){
            $("#passwordNew1").addClass("form-control-warning");
            $("#passwordNewZero1").html("Merci d'indiquer un nouveau mot de passe.");
    }
}

function stopWarningPasswordNew1(){
           $("#passwordNew1").removeClass("form-control-warning");
           $("#passwordNewZero1").html("");
        }
        

// ************************
//VERIFICATION NOUVEAU MDP 2
//*************************


function verifPasswordNew2(){
    if ($("#passwordNew2").val() == ""){
            $("#passwordNew2").addClass("form-control-warning");
            $("#passwordNewZero2").html("Merci d'indiquer une seconde fois votre nouveau mot de passe.");
    }
}

function stopWarningPasswordNew2(){
           $("#passwordNew2").removeClass("form-control-warning");
           $("#passwordNewZero2").html("");
        }






        