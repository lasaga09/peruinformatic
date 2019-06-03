/*valores de items para mandar a guardar a un array*/

$(document).on("click","#btnaddItem",function(){
var idcompra = document.getElementById("idcompra").value;
var producto = document.getElementById("producto").value;
var verproducto = document.getElementById("verproducto").value;

var generico = document.getElementById("generico").value;
var alternativo = document.getElementById("alternativo").value;
var original = document.getElementById("original").value;
var descripcion = document.getElementById("descripcion").value;
var precio = document.getElementById("precio").value;
var cantidad = document.getElementById("cantidad").value;


var token=document.getElementById("tokenitems");
var cont=0;
total=0;
var fila='';
subtotal=[];
subtotal[cont]=(cantidad*precio);
total = total + subtotal[cont];



fila+='<tr class="selected" id="fila'+cont+'">';
total
fila+='<td><input type="hidden" name="idproducto[]" value="'+producto+'">'+verproducto+'</td>';
fila+='<td><input type="number" hidden name="generico[]" value="'+generico+'">'+generico+'</td>';
fila+='<td><input type="number" name="alternativo[]" value="'+alternativo+'"></td>';
fila+='<td><input type="number" name="original[]" value="'+original+'"></td>';
fila+='<td><input type="number" name="precio[]" value="'+precio+'"></td>';
fila+='<td><input type="number" name="cantidad[]" value="'+cantidad+'"></td>';
fila+='<td><input type="number" name="subtotal[]" value="'+subtotal[cont]+'"></td>';
fila+='<td><button type="button" onclick="eliminarItem('+cont+')";>X</button></td>';
fila+='</tr>';
cont++;


$("#total").html(total);
$("#detalles").append(fila);
$("#total_venta").val(total);




});

function eliminarItem(item){
total=total-subtotal[item];
$("#total_venta").val(total);
$("#total").html(total);
$("#fila" + item).remove();

}













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
	
		var total=parseFloat(precio) * parseInt(cantidad);
		document.getElementById("subtotal").value=parseFloat(total);
	}else {

		
		
	}

});

$(document).on("change","#cantidad",function(){
		var precio = document.getElementById("precio").value;
	if(precio != ''){
		var cantidad = this.value;
	
		var total=parseFloat(precio) * parseInt(cantidad);
		document.getElementById("subtotal").value=parseFloat(total);
	}else {

		
		
	}

});