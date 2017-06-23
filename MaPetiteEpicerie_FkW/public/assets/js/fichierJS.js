$(function(){
	$("#photo1").on('focusout', insertPhoto1);
    $("#select_cat").on('change', selectCat);
    $("#select_marque").on('change', selectMarque);
    $("#button").on('click', insertStock);
    $("#select_cat2").on('change', selectCat2);
    $("#select_marque2").on('change', selectMarque2);
    $(".button2").on('click', majStock);
    $("#nouveau").on('change', nouveau);
    $("#promo").on('change', promo);

  

});

function insertPhoto1()//Affiche la photo dans création de produits
    {
    $("#photo").attr('src', $("#photo1").val());
	}; 

function selectCat() //Sélectionne les produits par catégorie pour entrée en stock
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

function selectMarque() //Sélectionne les produits par marque pour entrée en stock
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

function selectCat2() //Sélectionne les produits par catégorie pour mise à jour du stock
    {
        $.ajax({
            url : 'affiche_stock',
            type : 'POST',
            data : 'ajax=true & product_cat2=' +$("#select_cat2").val(),
            // le champ Ajax ne sert qu'à complexifier ceux qui voudrait injecter des valeurs

            success: function(data)
            {
                var result = JSON.parse(data);

                $.each(result, function(key, val)
                {
                content += 
                    "<tr>" +
                        "<td >"+
                            "<button id="+ val.ID_prod +" style='color: black' class='button2' type=submit>" +
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
                        "<td style='width: 150px; border: solid 1px black; color: white; text-align: center'>" +
                            val.prix +
                        "</td>" +
                        "<td style='width: 150px; border: solid 1px black; color: white; text-align: center'>" +
                            val.nouveau +
                        "</td>" +
                        "<td style='width: 150px; border: solid 1px black; color: white; text-align: center'>" +
                            val.promo +
                        "</td>" +
                        "<td style='width: 150px; border: solid 1px black; color: white; text-align: center'>" +
                            val.stock +
                        "</td>" +
                    "</tr>" 
                });

                $('#product_table').html(content);

                $(".button2").on('click', majStock);

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

function selectMarque2() //Sélectionne les produits par marque pour mise à jour du stock
    {  
        var content = "<table>";       
            
        $.ajax(
        {

            url : 'affiche_stock',
            type : 'POST',
            data : 'ajax=true&product_marque2=' +$("#select_marque2").val(),

            success: function(data)
            {
                var result = JSON.parse(data);

                $.each(result, function(key, val)
                {
                content += 
                    "<tr>" +
                        "<td >"+
                            "<button id="+ val.ID_prod +" style='color: black' class='button2' type=submit >" +
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
                        "<td style='width: 150px; border: solid 1px black; color: white; text-align: center'>" +
                            val.prix +
                        "</td>" +
                        "<td style='width: 150px; border: solid 1px black; color: white; text-align: center'>" +
                            val.nouveau +
                        "</td>" +
                        "<td style='width: 150px; border: solid 1px black; color: white; text-align: center'>" +
                            val.promo +
                        "</td>" +
                        "<td style='width: 150px; border: solid 1px black; color: white; text-align: center'>" +
                            val.stock +
                        "</td>" +
                    "</tr>" 
                });

                $('#product_table').html(content);

                $(".button2").on('click', majStock);

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

function majStock() //Permet de mettre à jour un produit du stock
    {
        var idproduit = ($(this).attr('id'));
        document.location.href="maj_produitStock/"+idproduit; 
    }

function nouveau() //Affiche l'image "nouveau"
    {
    var nv =  ($('#nouveau').val());
        if(nv=='OUI')
        {
            $("#photoNew").css('display','inline');
        }
        else
        {
            $("#photoNew").css('display','none');
        }
    }

function promo() //Affiche l'image "promo"
    {
    var nv =  ($('#promo').val());
        if(nv=='OUI')
        {
            $("#photoPromo").css('display','inline');
        }
        else
        {
            $("#photoPromo").css('display','none');
        }
    }

       




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
