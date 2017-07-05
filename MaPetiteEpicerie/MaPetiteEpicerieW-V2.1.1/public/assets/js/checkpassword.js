/***********************************************************
 -Partie christophe javascript-
 Vérif des champs pour la récupération du mot de passe oublié 
 et changement de mot de passe dans espace perso
 file : modifinfo-personnel.php
 file: recup-password.php
*******************************************************/


$(function(){

$("#submit4").hide();
$("#password01").on('keyup', checkPassword);
$("#password02").on('keyup', checkPassword);

});

var password, password2;

function checkPassword(){

  password = $("#password01").val();
  password2 = $("#password02").val();


  if ((password == "" || password2 == ""))
  {
  //alert("Vous devez saisir les deux mot de passe");
    //$("#password1").addClass("form-control-warning");
    $("#password02").removeClass("form-control");
    $("#password02").addClass("form-control-warning");
    $("#formOk2").html("Merci de remplir les deux champs !");
    $("#submit4").hide();

  }else if ((password != password2)) {
    //alert("Les deux mot de passe doivent etre identiques !");
  //$("#password1").addClass("form-control-warning");
  
  $("#password02").addClass("form-control-warning");
  $("#formOk2").html("Les mots de passe sont pas identique !");
  $("#submit4").hide();

  }else if((password == password2)){
    //$("#password1").addClass("form-control-ok");
   
    $("#formOk2").html("<p class='passok'>Mot de passe identique !</p>");
    $("#password02").removeClass("form-control-warning");
     $("#password02").addClass("form-control");
    $("#submit4").show();
  }


}

