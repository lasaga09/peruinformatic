

/*select cliente telefono*/

$(document).on("click","#cliente",function(){

var id = this.value;
$.ajax({
	url: 'Tecnico/'+id,
	type: 'GET',
	success:function(rs){
	document.getElementById("celular").value=rs['telefono'];

	
	}

	
});

});



/*nombre de marca*/
$(document).on("click","#marca",function(){

var id = this.value;

$.ajax({
	url: 'Marca/'+id,
	type: 'GET',
	success:function(rs){
    
document.getElementById("vermarca").value=rs[0]['nombre'];
	
	}

	
});

});


var chekOtro=document.getElementById("Otro");
chekOtro.addEventListener("click",function(){
	if(this.checked == true){
   document.getElementById("divotro").style.display = 'block';
  

  
}else {
	document.getElementById("divotro").style.display = 'none';
}
});

$(document).on("change","#otrafallainput",function(){
	document.getElementById("Otro").value = this.value;
})



/*valores de items para mandar a guardar a un array*/

/*variables para reparacion*/
var cont=0;
subtotal=[];
total=0;

$(document).on("click","#btnaddItem",function(){
var equipo = document.getElementById("equipo").value;
var idmarca =document.getElementById("marca").value;
var marca =document.getElementById("vermarca").value;
var descripcion =document.getElementById("descripcion").value;
var modelo =document.getElementById("modelo").value;
var cantidad =document.getElementById("cantidad").value;
var precio =document.getElementById("precio").value;
var siSeleccionado=new Array();
	var noSeleccionado=new Array();
	var checkboxs = document.querySelectorAll('input[name="uno"]').forEach( function(e) {
		if(e.checked){
				siSeleccionado.push(e.value);

		}else{
		
		}
	});



if(modelo !='' && precio!='' && cantidad!=''){

var fila='';

subtotal[cont]=(Math.round((cantidad*precio) * 100 )/100);

total=total+ subtotal[cont];

			
			fila+='<tr class="selected" id="fila'+cont+'">';
			fila+='<td><button type="button" class="btn btn-danger" onclick="eliminarItem('+cont+')";><i class="fa fa-times-circle " aria-hidden="true"></i></button></td>';
			fila+='<td><input type="hidden" name="equipo[]" value="'+equipo+'-'+marca+'-'+modelo+'"><i>'+equipo+'-'+marca+'-'+modelo+'</i></td>';
			fila+='<td><input type="hidden" name="descripcion[]" value="'+descripcion+'"><i>'+descripcion+'</i></td>';
			
			fila+='<td><input type="number" hidden class="widthInput" name="fallas[]" value="'+siSeleccionado+'">'+siSeleccionado+'</td>';
			fila+='<td><input type="number" hidden class="widthInput"  name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td>';
			fila+='<td><input type="number" hidden class="widthInput" name="precio[]" value="'+precio+'">'+precio+'</td>';
			fila+='<td><input type="number" hidden name="subtotal[]" value="'+subtotal[cont]+'">'+subtotal[cont]+'</td>';
			
			fila+='</tr>';
			cont++;
			

$("#total").html('Total : S/. '+total);
$("#detalles").append(fila);
$("#total_total").val(total);

}
else{
	alert("Campos Vacios");
}



});







function eliminarItem(cont){
total=total-subtotal[cont];
$("#total_total").val(total);
$("#total").html('Total : S/. '+total);
$("#fila" + cont).remove();

}


$(document).on("keyup","#cuenta",function(){

	var total = document.getElementById("total_total").value;
	var cuenta = document.getElementById("cuenta").value;
	var saldo = document.getElementById("saldo");

	saldo.value='0';
	if(cuenta <= total){
		var c=(Math.round((parseFloat(total )- parseFloat(cuenta)) * 100 )/100);
	saldo.value=c;
	}
	else{

		alert("valor no permitido");
		this.value='';
		saldo.value='0';

	}
	


});