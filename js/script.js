// *************************************************************
// Flexslider pour le slider du haut de la page d'accueil 
// *************************************************************

// $(function() { // un seul $function par fichier js, permet de déclencher le js dès l'arrivée sur le site

// 	$('.flexslider2').flexslider({ // Début de mon Flexslider
// 		animation: "slide"
//     	slideshowSpeed: 2500,
// 	}); // Fin de mon Flexslider

// }); // Fin de mon $function


$(function() { // un seul $function par fichier js
  $('.flexslider2').flexslider({ // défilement des compétences dans le header
    animation: "slide",
    slideshowSpeed: 2500,
    controlNav: false,
   
  });



}); // Fin de mon $function 

