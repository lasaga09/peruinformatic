

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
			fila+='<td hidden ><input type="hidden" name="marca[]" value="'+idmarca+'"></td>';
			fila+='<td><input type="text" hidden  class="widthInput" name="fallas[]" value="'+siSeleccionado+'">'+siSeleccionado+'</td>';
			fila+='<td><input type="number" hidden class="widthInput"  name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td>';
			fila+='<td><input type="number" hidden class="widthInput" name="precio[]" value="'+precio+'">'+precio+'</td>';
			fila+='<td><input type="number" hidden name="subtotal[]" value="'+subtotal[cont]+'">'+subtotal[cont]+'</td>';
			
			fila+='</tr>';
			cont++;
			limpiar();

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


function limpiar(){
	document.getElementById("equipo").value='Celular';

document.getElementById("marca").value=1;
document.getElementById("vermarca").value='';

document.getElementById("descripcion").value='';
document.getElementById("modelo").value='';
document.getElementById("cantidad").value='';
document.getElementById("precio").value ='';
document.getElementById("divotro").style.display = 'none';
document.getElementById("otrafallainput").value='';
var siSeleccionado=new Array();
	var noSeleccionado=new Array();
	var checkboxs = document.querySelectorAll('input[name="uno"]').forEach( function(e) {
		if(e.checked){
				e.checked = false;

		}else{
		
		}
	});

}





$(document).on("keyup","#cuenta",function(){

	var total = document.getElementById("total_total").value;
	var cuenta = document.getElementById("cuenta").value;
	var saldo = document.getElementById("saldo");

	saldo.value='0';
	if(cuenta <= total){
		var c=(Math.round((parseFloat(total )- parseFloat(cuenta)) * 100 )/100);
	saldo.value=c;
	document.getElementById("saldoen").value = c;
	}
	else{

		alert("valor no permitido");
		this.value='';
		saldo.value='0';
			document.getElementById("saldoen").value = '0';

	}
	


});


/*validar el numero de hoja de servicio tecnico*/

$(document).ready(function(){

var totalRegistros = document.getElementById("numerohoja").value;



document.getElementById("vernumero").textContent='N-000'+ totalRegistros;
document.getElementById("numero").value='N-000'+ totalRegistros;
});




/*detalle de reparacion*/


$(document).on("click","#btnDetalles",function(){
	var id = this.getAttribute('idDeta');

	$.ajax({
		url: 'DetalleReparacion/'+id,
		type: 'GET',
		success:function(rs){
			
			var datos = '';
			rs.forEach(function(index) {
			datos+='<tr>';
			datos+='<td>'+index['equipo']+'</td>';
			datos+='<td>'+index['observacion']+'</td>';
			datos+='<td>'+index['falla']+'</td>';
			datos+='<td>'+index['cantidad']+'</td>';
			datos+='<td>'+index['precio']+'</td>';
			datos+='<td>'+index['subtotal']+'</td>';
			

				
			datos+='</tr>';
			});
				document.getElementById("detallesd").innerHTML=datos;
		}


		
	});

	$.ajax({
		url: 'Reparacion/'+id,
		type: 'GET',
		success:function(rs){
			
			document.getElementById("detaCuenta").textContent= 'A Cuenta : S/. '+rs['cuenta'];
			document.getElementById("detaSaldo").textContent='Saldo restante : S/. '+ rs['saldo'];
				document.getElementById("detaTotal").textContent='Total : S/. '+ rs['total'];
		}
		
		
	});
	
	
	
});


/*update reparacion*/

$(document).on("click","#btnEditRepa",function(){

  var id = this.getAttribute("idcate");
  var token = this.getAttribute("tokenupd");

  	alertify.confirm('Confirmar', 'Estas seguro de finalizar esta reparacion',
		function(){ 
					$.ajax({
					headers: {
					'X-CSRF-TOKEN':token
					},
					url: 'Reparacion/'+id,
					type: 'PUT',
					data: {},
					success:function(rs){	
					alertify.success(rs);

					location.reload();
					
			
					}
					});
		
		}
		, function(){ alertify.error('Cancelado')});

});



/*Eliminar reparacion*/

$(document).on("click","#btnDelete",function(){

  var id = this.getAttribute("idcateDel");
  var token = this.getAttribute("tokende");

  	alertify.confirm('Confirmar', 'Estas seguro de eliminar?',
		function(){ 
					$.ajax({
					headers: {
					'X-CSRF-TOKEN':token
					},
					url: 'Reparacion/'+id,
					type: 'DELETE',
					data: {},
					success:function(rs){	
					alertify.success(rs);

					location.reload();
					
			
					}
					});
		
		}
		, function(){ alertify.error('Cancelado')});

});