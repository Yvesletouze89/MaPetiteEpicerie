$(function(){
	$("#photo1").on('focusout', insertPhoto1);
    $("#select_cat").on('change', selectCat);
    $("#select_marque").on('change', selectMarque);
    $("#button").on('click', insertStock);
  

});

function insertPhoto1()//Affiche la photo dans création de produits
    {
    $("#photo").attr('src', $("#photo1").val());
	}; 

function selectCat() //Sélectionne les produits par catégorie
    {
        var content = "<table>";       
            
        $.ajax({
            url : 'select_stock',
            type : 'POST',
            data : 'ajax=true & product_cat=' +$("#select_cat").val(),
            // le champ Ajax ne sert qu'à complexifier ceux qui voudrait injecter des valeurs

            success: function(data)
            {
                var result = JSON.parse(data);

                $.each(result, function(key, val)
                {
                content += 
                    "<tr>" +
                        "<td >"+
                            "<button id="+ val.ID_prod +" style='color: black' class='button' >" +
                            "valid" +
                            "</button>"+
                        "</td>" +
                        "<td style='width: 450px; border: solid 1px black; color: white; text-align: left'>" +
                            val.descriptif +                    
                        "</td>" +
                        "<td style='width: 70px; border: solid 1px black; color: white; text-align: right'>" +
                            val.poids_volume + val.unites +
                        "</td>" +
                        "<td style='width: 80px; border: solid 1px black; color: white; text-align: right'>" +
                            val.marque +
                        "</td>" +
                        "<td style='width: 150px; border: solid 1px black; color: red; text-align: center'>" +
                            val.categorie +
                        "</td>" +
                    "</tr>" 
                });

                $('#product_table').html(content+"</table>");

                $(".button").on('click', insertStock);
            }
        })

        .done(function(echo)
        {
            console.log("Enregistré !");
        })

        .fail(function()
        {
            console.log("Petit problème !");
        });
    }

function selectMarque() //Sélectionne les produits par marque
    {  
        var content = "<table>";       
            
        $.ajax(
        {

            url : 'select_stock',
            type : 'POST',
            data : 'ajax=true&product_marque=' +$("#select_marque").val(),

            success: function(data)
            {
                var result = JSON.parse(data);

                $.each(result, function(key, val)
                {
                    content += 
                        "<tr>" +
                            "<td >"+
                                "<button id="+ val.ID_prod +" style='color: black' class='button' >" +
                                "valid" +
                                "</button>"+
                            "</td>" +
                            "<td style='width: 450px; border: solid 1px black; color: white; text-align: left'>" +
                                val.descriptif +                    
                            "</td>" +
                            "<td style='width: 70px; border: solid 1px black; color: white; text-align: right'>" +
                                val.poids_volume + val.unites +
                            "</td>" +
                            "<td style='width: 80px; border: solid 1px black; color: green; text-align: right'>" +
                                val.marque +
                            "</td>" +
                            "<td style='width: 150px; border: solid 1px black; color: white; text-align: center'>" +
                                val.categorie +
                            "</td>" +
                        "</tr>" 
                });

            $('#product_table').html(content+"</table>");

            $(".button").on('click', insertStock);
            }
        })

        .done(function(echo)
        {
            console.log("Enregistré !");
        })

        .fail(function()
        {
            console.log("Petit problème !");
        });
    }

function insertStock() //Insère le produit sélectionné dans la table stock_produits
    {
        var idproduit = ($(this).attr('id'));
       
        var content = "";       
            
        $.ajax(
        {
            url : 'verif_stock',
            type : 'POST',
            data : 'id_prod=' + idproduit,
        })

        .done(function(echo)
        { 
            if (echo=='[]')
            {
                $.ajax
                ({
                    url : 'insert_stock',
                    type : 'POST',
                    data : 'id_prod=' + idproduit,
                })
                .done(function()
                {
                    console.log("Enregistré !");
                    $('#message').html("Votre produit a bien été enregistré dans le stock");
                })

            }
            else
            {
                $('#message').html("Votre produit est déjà présent dans le stock");
            }
        })
    };

       




$(document).ready(function(){
    var quantity=0;
    $('.quantity-right-plus').click(function(e)
    {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        // If is not undefined
            $('#quantity').val(quantity + 1);
          
            // Increment
    });

    $('.quantity-left-minus').click(function(e)
    {
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
