$(function(){
	$('#select_cat')on('change',selectCat);
});

function selectCat()
{
	var content = "";
	$.ajax({
		type: "POST";
		url: "categorie_stock";
		data: "ajax = true&product_cat="+$("#select_cat").val(),
		success: function data()
		{
			var result = JSON.parse(data);

			$.each( result, function($key, val){
				content += "<p>"+ val.product_name+" _ "+ val.product_price + " _ " + val.product_quantity + "_ <a href='supprimerproduit/" + val.product_id+"'>Supprimer</a></p>";
			});
			$('#product_table').html(content);	
		}
	});
}