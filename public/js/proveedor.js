/*validacion inputs*/

$("#ruc").maxlength({max: 11});
$("#telefono").maxlength({max: 9});

$("#rucup").maxlength({max: 11});
$("#telefonocup").maxlength({max: 9});

/*recargar la pagina */

var btncerrarModal = document.getElementById("cerraradd");
btncerrarModal.addEventListener("click",function(e){
	  location.reload();
	  e.preventDefault();
});


var btncerrarModalup = document.getElementById("cerrarEdit");
btncerrarModalup.addEventListener("click",function(e){
	  location.reload();
	  e.preventDefault();
});


var btnAdd=document.getElementById("btnAdd");
var token=document.getElementById("token");
var nombre=document.getElementById("nombre");
var ruc=document.getElementById("ruc");
var telefono=document.getElementById("telefono");
var email=document.getElementById("email");
var direccion=document.getElementById("direccion");
var idse=document.getElementById("idsede");
var idsede=idse.getAttribute('idsede');


/*add*/
btnAdd.addEventListener("click",function(e){

			if(nombre.value != '' && ruc.value != ''){
         	$.ajax({	
			headers: {
			'X-CSRF-TOKEN':token.value
			},
			url: 'Proveedor',
			type: 'POST',
			data: {'nombre':nombre.value,
			       'ruc':ruc.value,
			       'telefono':telefono.value,
			       'email':email.value,
			       'direccion':direccion.value,
			       'idsede':idsede},
			success:function(rs){

			     if(rs == '0'){
                   alertify.error('El ruc ya se encuentra registrado!!!');
			     }else{
						alertify.success('Agregado correctamente!!!');
						document.getElementById("frmadd").reset();

			     } 
			  	}
			});


			}else{
			
		   alertify.error('Error: campos vacios..!!!');
			}

});


/*cargar datos para editar*/

$(document).on("click","#btnEdit",function(){
	
   var id=this.getAttribute("idpro");

   $.ajax({
   	url: 'Proveedor/'+id,
   	type: 'GET',
   	data: {'id':id},
   	success:function(rs){
   		
		document.getElementById("nombreup").value=rs['nombre'];
		document.getElementById("rucup").value=rs['ruc'];
		document.getElementById("telefonoup").value=rs['telefono'];
		document.getElementById("emailup").value=rs['email'];
		document.getElementById("direccionup").value=rs['direccion'];
		document.getElementById("idsedeup").value=rs['id_sede'];
		document.getElementById("idproveedorup").value=rs['idproveedor'];
   		
   	}
   });


});


/*actualizar*/
$(document).on("click","#btnUp",function(){
            
			var token= document.getElementById("tokenup").value;
			var nombre=	document.getElementById("nombreup").value;
			var	ruc = document.getElementById("rucup").value;
			var	telefono = document.getElementById("telefonoup").value;
			var	email = document.getElementById("emailup").value;
			var	direccion =document.getElementById("direccionup").value;
			var	idsede=document.getElementById("idsedeup").value;
			var	idproveedor =document.getElementById("idproveedorup").value;

			$.ajax({
				headers: {
				'X-CSRF-TOKEN':token
				},
				url: 'Proveedor/'+idproveedor,
				type: 'PUT',
				data: {'nombre':nombre,
						'ruc':ruc,
						'telefono':telefono,
						'email':email,
						'direccion':direccion,
						'idsede':idsede
					},
				success:function(rs){
							
					alertify.success(rs);		

				}
			});
});



/*eliminar*/

$(document).on("click","#btnDelete",function(){

			var token=this.getAttribute("tokende");
			var id= this.getAttribute("idcateDel");

		alertify.confirm('Confirm Title', 'Confirmar Eliminacion',
		function(){ 
					$.ajax({
					headers: {
					'X-CSRF-TOKEN':token
					},
					url: 'Proveedor/'+id,
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


/*detalles*/
var detalle=document.getElementById('cardDetalle');

$(document).on('click','#btnDetalles',function(e){
	var id = this.getAttribute('iddetalle');

			$.ajax({
			url: 'Proveedor/'+id+'/edit',
			type: 'GET',
			data: {'id':id},
			success:function(rs){
			detalle.style.display='block';
			console.log(rs);
			document.getElementById("nombredeta").textContent=rs['nombre'];
			document.getElementById("rucdeta").textContent=rs['ruc'];
			document.getElementById("telefonodeta").textContent=rs['telefono'];
			document.getElementById("direcciondeta").textContent=rs['direccion'];
			document.getElementById("emaildeta").textContent=rs['email'];
			
			
			}
			});
	


});

var btcloseDE=document.getElementById('btncloseDe');
btcloseDE.addEventListener('click',function(){
	document.getElementById('cardDetalle').style.display='none';

});


