/*valores de items para mandar a guardar a un array*/

/*variables para compra*/
var cont=0;
subtotal=[];
total=0;

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

if(producto !='' && precio!='' && cantidad!=''){

var fila='';

subtotal[cont]=(Math.round((cantidad*precio) * 100 )/100);

total=total+ subtotal[cont];
/*var tt=Math.round(total * 100 )/100; */
			
			fila+='<tr class="selected" id="fila'+cont+'">';
			fila+='<td><button type="button" class="btn btn-danger" onclick="eliminarItem('+cont+')";><i class="fa fa-times-circle " aria-hidden="true"></i></button></td>';
			fila+='<td><input type="hidden" name="idproducto[]" value="'+producto+'"><i>'+verproducto+'</i></td>';
			fila+='<td><input type="number" class="widthInput" name="generico[]" value="'+generico+'"></td>';
			fila+='<td><input type="number" class="widthInput" name="alternativo[]" value="'+alternativo+'"></td>';
			fila+='<td><input type="number" class="widthInput" name="original[]" value="'+original+'"></td>';
			fila+='<td><input type="number" class="widthInput" name="precio[]" value="'+precio+'"></td>';
			fila+='<td><input type="number" class="widthInput"  name="cantidad[]" value="'+cantidad+'"></td>';
			fila+='<td><input type="number" hidden name="subtotal[]" value="'+subtotal[cont]+'">'+subtotal[cont]+'</td>';
			
			fila+='</tr>';
			cont++;
			limpiar();

$("#total").html('Total : S/. '+total);
$("#detalles").append(fila);
$("#total_venta").val(total);

}
else{
	alert("Campos Vacios");
}



});







function eliminarItem(cont){
total=total-subtotal[cont];
$("#total_venta").val(total);
$("#total").html('Total : S/. '+total);
$("#fila" + cont).remove();

}

function limpiar(){
	var producto = document.getElementById("producto").value ='';
	var verproducto = document.getElementById("verproducto").value='';
	var generico = document.getElementById("generico").value='';
	var alternativo = document.getElementById("alternativo").value='';
	var original = document.getElementById("original").value='';
	var descripcion = document.getElementById("descripcion").value='';
	var precio = document.getElementById("precio").value='';
	var cantidad = document.getElementById("cantidad").value='';
	document.getElementById("subtotal").value='';
}













/*calcular precio y cantidad*/

$(document).on("keyup","#precio",function(){
		var cantidad = document.getElementById("cantidad").value;
	if(cantidad != ''){
		var precio = this.value;
	
		var total=parseFloat(precio) + parseInt(cantidad);
		var t=Math.round(total * 100 )/100;
		document.getElementById("subtotal").value=parseFloat(t);
	}else {

		
		
	}

});


$(document).on("keyup","#cantidad",function(){
		var precio = document.getElementById("precio").value;
	if(precio != ''){
		var cantidad = this.value;
	
		var total=parseFloat(precio) * parseInt(cantidad);
		var t=Math.round(total * 100 )/100;
		document.getElementById("subtotal").value=parseFloat(t);
	}else {

		
		
	}

});

$(document).on("change","#cantidad",function(){
		var precio = document.getElementById("precio").value;
	if(precio != ''){
		var cantidad = this.value;
	
		var total=parseFloat(precio) * parseInt(cantidad);
		var t=Math.round(total * 100 )/100;
		document.getElementById("subtotal").value=parseFloat(t);
	}else {

		
		
	}

});