/* scroll top */
  $(document).ready(function() {
    $('.js-scrollTo').on('click', function() { // Au clic sur un élément
      var page = $(this).attr('href'); // Page cible
      var speed = 2000; // Durée de l'animation (en ms)
      $('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
      return false;
    });
  });

/* boutton haut de page */

    jQuery(document).ready(function() {
      var duration = 800;
      jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 100) {
          // Si un défillement de 100 pixels ou plus.
          // Ajoute le bouton
          jQuery('.cRetour').fadeIn(duration);
        } else {
          // Sinon enlève le bouton
          jQuery('.cRetour').fadeOut(duration);
        }
      });
            
      jQuery('.cRetour').click(function(event) {
        // Un clic provoque le retour en haut animé.
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
      })
    });

