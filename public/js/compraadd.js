/*valores de items para mandar a guardar a un array*/

$(document).on("click","#btnaddItem",function(){
var idcompra = document.getElementById("idcompra").value;
var producto = document.getElementById("producto").value;
var generico = document.getElementById("generico").value;
var alternativo = document.getElementById("alternativo").value;
var original = document.getElementById("original").value;
var descripcion = document.getElementById("descripcion").value;
var precio = document.getElementById("precio").value;
var cantidad = document.getElementById("cantidad").value;
var subtotal = document.getElementById("subtotal").value;



$.ajax({

	url: 'Items',
	type: 'GET',
	data: {'idcompra':idcompra,'precio':precio,'cantidad':cantidad,'total':subtotal},
	success:function(rs){

		var dtos='';

         console.log(rs);

		rs.forEach(function(element) {
		dtos+='<tr>';
		dtos+='<td>'+d+'</td>';
		dtos+='<td><button class="btn btn-danger"><i class="fa fa-minus-circle" aria-hidden="true"></i></button></td>';
		dtos+='	</tr>';
		});
		document.getElementById("tbody").innerHTML=dtos;

	
	}
});

});














/*calcular precio y cantidad*/

$(document).on("keyup","#precio",function(){
		var cantidad = document.getElementById("cantidad").value;
	if(cantidad != ''){
		var precio = this.value;
	
		var total=parseFloat(precio) + parseInt(cantidad);
		document.getElementById("subtotal").value=parseFloat(total);
	}else {

		
		
	}

});


$(document).on("keyup","#cantidad",function(){
		var precio = document.getElementById("precio").value;
	if(precio != ''){
		var cantidad = this.value;
	
		var total=parseFloat(precio) + parseInt(cantidad);
		document.getElementById("subtotal").value=parseFloat(total);
	}else {

		
		
	}

});

$(document).on("change","#cantidad",function(){
		var precio = document.getElementById("precio").value;
	if(precio != ''){
		var cantidad = this.value;
	
		var total=parseFloat(precio) + parseInt(cantidad);
		document.getElementById("subtotal").value=parseFloat(total);
	}else {

		
		
	}

});