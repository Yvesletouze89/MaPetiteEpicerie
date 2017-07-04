$(function(){
	$("#photo1").on('focusout', insertPhoto1);
    $("#select_cat").on('change', selectCat);
    $("#select_marque").on('change', selectMarque);
    $("#button").on('click', insertStock);
    $("#select_cat2").on('change', selectCat2);
    $("#select_marque2").on('change', selectMarque2);
    $(".button2").on('click', majStock);
    $("#nouveau").on('change', nouveau);
    $("#annulPromo").on('click', annulPromo);
    $("#prixnewtemp").on('change', calculRemise);
    $("#remisetemp").on('change', calculPrix);
    $("#promo").on('change', fmPromo);
    $("#validPromo").on('click', validPromo);
    $("#valMajStock").on('click', valMajStock);
    $("#prix").on('change', majPrixUnit)
    $("#annulfm2").on('click', annulFm2);
    $(".categorie").on('click', afficheBoutiqueCategorie);
    
    $("#datepicker" ).datepicker({
        altField: "#datepicker",
        closeText: 'Fermer',
        prevText: 'Précédent',
        nextText: 'Suivant',
        currentText: 'Aujourd\'hui',
        monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
        monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
        dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
        dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
        dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
        weekHeader: 'Sem.',
        dateFormat: 'dd/mm/yy',
        showAnim: "slideDown",
        showOn: "button",
        buttonImage: "http://jqueryui.com/resources/demos/datepicker/images/calendar.gif",
        buttonImageOnly: true,
        });
    
})

function majPrixUnit() //Calcule le prix au kg ou litre 
    {
        var a = parseFloat($('#pv').html());
        var b = ($('#unit').html());
        var c = parseFloat($('#prix').val());
        var x = 0;
        var pvu = "";
        switch(b) {
            case 'g':
            x = 1000;
            pvu = 'kg';
            break;
            case 'kg':
            x = 1;
            pvu = 'kg';
            break;
            case 'cl':
            x = 100;
            pvu = 'l';
            break;
            case 'dl':
            x = 10;
            pvu = 'l';
            break;
            case 'l':
            x = 1;
            pvu = 'l';
            break;
            }
        var z = c/a*x;
        $("#prixParUnit").val(z) ;
        $("#unitBase").val(pvu) ;
        
    } 

function fmPromo() //Affiche la fm Promo
    {
    $('#messagefm').html('');
    var nv = ($('#nouveau').val());
    var promo =  ($('#promo').val());
    var prix = ($('#prix').val());

        if (nv=='OUI' && promo=='OUI') {
            $('#message').html('Une nouveauté ne peut pas être en promo');
            $('#promo').val('NON');
        }

        else if(nv=='NON' && promo=='OUI' && (prix=="" || prix==null )){
            $('#message').html('Une promo ne peut pas avoir un prix nul');
            $('#promo').val('NON');
        }

        else{
            if(promo=='OUI')
            {
            $("#message").val("") ;
            a = ($("#prix").val());
            $("#myModal").modal('show');
            $("#prixoldtemp").val(a);
            b = "";
            $("#prixnewtemp").val(b);
            $("#remisetemp").val(b);
            $("#datepickertemp").val(b);
            }
            else
            {
            var a = "";
            $("#prix_old").val(a);
            $("#remise").val(a);
            $("#datevalid").val(a);
            $("#detailPromo").css('display','none');
            $("#photoPromo").css('display','none');
            }
        }
    }

function calculRemise() //Calcule la remise en fonc du prix 
    {
    var a = $("#prixnewtemp").val();
    var b = $("#prixoldtemp").val();
    var c = (a-b)/b*100 ;
    c=parseFloat(c).toFixed(2);
    $("#remisetemp").val(c) ;
    }

function calculPrix() //Calcule le prix en fonc de la remise 
    {
    var a = parseFloat($("#remisetemp").val());
    var b = parseFloat($("#prixoldtemp").val());
    c=(b+(a*b/100));
    c=parseFloat(c).toFixed(2);
    $("#prixnewtemp").val(c) ;
    }

function validPromo()//Valide et ferme la fm Promo 
    {
    var prixold = parseFloat($("#prixoldtemp").val());
    var prixnew = parseFloat($("#prixnewtemp").val());
    var a = $("#prixoldtemp").val();
    var b = $("#remisetemp").val();
    var c = $("#datepicker").val();
    var d = $("#prixnewtemp").val();
    
    if (prixold <= prixnew){
        $("#messagefm").html("La promo ne peut pas être plus chère") ;
        }
    else{        
        if(c == ""){
            $("#messagefm").html("Veuillez indiquer une date de validité") ;
        }
        else if (a == "" || b == "" || d == "") {
            $("#messagefm").html("Tous les champs doivent être remplis") ;
        }
        else{   
            $("#prix_old").val(a);
            $("#remise").val(b);
            $("#datevalid").val(c);
            $("#prix").val(d);
            $("#myModal").modal('hide');
            $("#detailPromo").css('display','inline');
            $("#photoPromo").css('display','inline');
        }
        }
    }

function annulPromo()//Annule et ferme la fm Promo 
    {
    var a = "";
            $("#prix_old").val(a);
            $("#remise").val(a);
            $("#datevalid").val(a);
            $("#detailPromo").css('display','none');
            $("#photoPromo").css('display','none');
            $("#promo").val("NON");
    }

function valMajStock(e) //Affiche la fm de validation de maj
    {
    e.preventDefault();
    var a = $("#prix").val();
    var b = $("#remise").val();
    var c = $("#datevalid").val();
    var d = $("#prix_old").val();
    var e = $("#stock").val();
    var f = $("#nouveau").val();
    var g = $("#promo").val();
    var h = $("#idrech").html();
    var i = $("#prixParUnit").val();
    var j = $("#unitBase").val();


    if (a == "") {
        $("#message").html("Un prix ne peut pas être nul") ;
    }
    else{
    $("#c1").html(a);
    $("#c2").html(b);
    $("#c3").html(c);
    $("#c4").html(d);
    $("#c5").html(e);
    $("#c6").html(f);
    $("#c7").html(g);
    $("#c8").html(i);
    $("#c9").html(j);
    $("#c10").html(h);


    $("#myModal2").modal('show');
    }}

function annulFm2() //Ferme sans sauvegarde de la fm de validation de maj
    {
        $("#myModal2").modal('hide');
        $("#message").html("") ;
    }

function insertPhoto1()//Affiche la photo dans création de produits
    {
    $("#photo").attr('src', $("#photo1").val());
	}; 

function selectCat() //Sélectionne les produits par catégorie pour entrée en stock
    {
        var content = "<table>";  
        $('#message').html("");
        $('#select_marque').val("-- Marques --");  
            
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
                            "Mettre en stock" +
                            "</button>"+
                        "</td>" +
                        "<td style='width: 450px; border: solid 1px black; color: black; text-align: left'>" +
                            val.descriptif +                    
                        "</td>" +
                        "<td style='width: 70px; border: solid 1px black; color: black; text-align: right'>" +
                            val.poids_volume + val.unites +
                        "</td>" +
                        "<td style='width: 80px; border: solid 1px black; color: black; text-align: right'>" +
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
        $('#message').html(""); 
        $('#select_cat').val("-- Catégories --");      
            
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
                                "Mettre en stock" +
                                "</button>"+
                            "</td>" +
                            "<td style='width: 450px; border: solid 1px black; color: black; text-align: left'>" +
                                val.descriptif +                    
                            "</td>" +
                            "<td style='width: 70px; border: solid 1px black; color: black; text-align: right'>" +
                                val.poids_volume + val.unites +
                            "</td>" +
                            "<td style='width: 80px; border: solid 1px black; color: green; text-align: right'>" +
                                val.marque +
                            "</td>" +
                            "<td style='width: 150px; border: solid 1px black; color: black; text-align: center'>" +
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

        $('#message').html("");    
            
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
        $('#select_marque2').val("-- Marques --");  
        var content = "<table>";     

        $.ajax({
            url : 'affiche_stock',
            type : 'POST',
            data : 'ajax=true&product_cat2=' +$("#select_cat2").val(),
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
                        "<td style='width: 450px; border: solid 1px black; color: black; text-align: left'>" +
                            val.descriptif +                    
                        "</td>" +
                        "<td style='width: 70px; border: solid 1px black; color: black; text-align: right'>" +
                            val.poids_volume + val.unites +
                        "</td>" +
                        "<td style='width: 80px; border: solid 1px black; color: black; text-align: right'>" +
                            val.marque +
                        "</td>" +
                        "<td style='width: 150px; border: solid 1px black; color: red; text-align: center'>" +
                            val.categorie +
                        "</td>" +
                        "<td style='width: 150px; border: solid 1px black; color: black; text-align: center'>" +
                            val.prix +
                        "</td>" +
                        "<td style='width: 150px; border: solid 1px black; color: black; text-align: center'>" +
                            val.nouveau +
                        "</td>" +
                        "<td style='width: 150px; border: solid 1px black; color: black; text-align: center'>" +
                            val.promo +
                        "</td>" +
                        "<td style='width: 150px; border: solid 1px black; color: black; text-align: center'>" +
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
        $('#select_cat2').val("-- Catégories --");
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
                        "<td style='width: 450px; border: solid 1px black; color: black; text-align: left'>" +
                            val.descriptif +                    
                        "</td>" +
                        "<td style='width: 70px; border: solid 1px black; color: black; text-align: right'>" +
                            val.poids_volume + val.unites +
                        "</td>" +
                        "<td style='width: 80px; border: solid 1px black; color: green; text-align: right'>" +
                            val.marque +
                        "</td>" +
                        "<td style='width: 150px; border: solid 1px black; color: black; text-align: center'>" +
                            val.categorie +
                        "</td>" +
                        "<td style='width: 150px; border: solid 1px black; color: black; text-align: center'>" +
                            val.prix +
                        "</td>" +
                        "<td style='width: 150px; border: solid 1px black; color: black; text-align: center'>" +
                            val.nouveau +
                        "</td>" +
                        "<td style='width: 150px; border: solid 1px black; color: black; text-align: center'>" +
                            val.promo +
                        "</td>" +
                        "<td style='width: 150px; border: solid 1px black; color: black; text-align: center'>" +
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
        $('#message').html('');
        var nv = ($('#nouveau').val());
        var promo =  ($('#promo').val());
        if (nv=='OUI' && promo=='OUI') {
            $('#message').html('Une nouveauté ne peut pas être en promo');
            $('#nouveau').val('NON');
        }
        else{
            if(nv=='OUI')
            {
            $("#photoNew").css('display','inline');
            }
            else
            {
            $("#photoNew").css('display','none');
            }
        }
    }

function afficheBoutiqueCategorie()//Affiche la boutique de la catégorie demandée
    {
        var cat = ($(this).attr('id'));
        document.location.href="boutique_cat/"+cat; 
    }

