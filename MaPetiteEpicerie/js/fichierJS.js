$(function(){
	$("#photo1").on('focusout', insertPhoto1);
	});

function insertPhoto1(){
    $attr = "img/",
    $attr2 = $("#photo1").val(),
	$("#photo").attr('src', ($attr+$attr2));
	};

$(document).ready(function(){

var quantity=0;
   $('.quantity-right-plus').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
            
            $('#quantity').val(quantity + 1);

          
            // Increment
        
    });

     $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
      
            // Increment
            if(quantity>0){
            $('#quantity').val(quantity - 1);
            }
    });
    
});
	

	

	
		
