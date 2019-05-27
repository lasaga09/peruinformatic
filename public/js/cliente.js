


/*recargar la pagina */

var btncerrarModal = document.getElementById("btncerrarModal");
btncerrarModal.addEventListener("click",function(e){
	  location.reload();
	  e.preventDefault();
});


var btncerrarModalup = document.getElementById("btncerrarModalup");
btncerrarModalup.addEventListener("click",function(e){
	  location.reload();
	  e.preventDefault();
});


/*agregar cliente*/

var btnSavec = document.getElementById("btnSavec");
btnSavec.addEventListener("click",e=>{
	const nombre  = document.getElementById("nombre").value;
	const telefono  = document.getElementById("telefono").value;
	const email  = document.getElementById("email").value;
	const apellido  = document.getElementById("apellido").value;
	const dni  = document.getElementById("dni").value;

					if(nombre != '' && apellido != '' && telefono !='' && dni !=''){
						
						$.ajax({
						
						type: 'POST',
						headers: {
						'X-CSRF-TOKEN': $('meta[name ="csrf-token"]').attr('content')
						
						},
						url:'Cliente' ,
						/*dataType:'json',*/
						data: {'email':email,
						'nombre':nombre,
						'telefono':telefono,'apellido':apellido,'dni':dni},
						success:function(rs){
						
						limpiarForm();
						Command: toastr["success"](rs)
						
						toastr.options               = {
						"closeButton": true,
						"debug": false,
						"newestOnTop": false,
						"progressBar": false,
						"positionClass": "toast-top-center",
						"preventDuplicates": false,
						"onclick": null,
						"showDuration": "300",
						"hideDuration": "1000",
						"timeOut": "5000",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
						}
						}
						
						
						
						});
						
						
						}else{
						Command: toastr["warning"]("Campos vacios!!!")
						
						toastr.options               = {
						"closeButton": true,
						"debug": false,
						"newestOnTop": false,
						"progressBar": true,
						"positionClass": "toast-top-right",
						"preventDuplicates": false,
						"onclick": null,
						"showDuration": "300",
						"hideDuration": "1000",
						"timeOut": "5000",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
						}
						}			
	
});





/*funcion para limpiar el formulario*/
function limpiarForm()
{
document.getElementById("frmCliente").reset();
}





/*tremos los datos del cliente seleccionado con json*/
$(document).ready(function(){

	$(document).on("click","#btnEditarCliete",function(){
	
	idc = $(this).attr("idc");
	
			$.ajax({
			
			type: 'GET',
			
			url:'Cliente/'+idc,
			dataType:'json',
			success:function(rs){
					
					document.getElementById("nombrecup").value=rs[0]['nombre'];
					document.getElementById("telefonocup").value=rs[0]['telefono'];
					document.getElementById("emailcup").value=rs[0]['email'];
					document.getElementById("idcup").value=rs[0]['idcliente'];
					document.getElementById("apellidocup").value=rs[0]['apellido'];
					document.getElementById("dnicup").value=rs[0]['dni'];


			}


		});
	
	});



});

/*update*/

$(document).ready(function(){

	$(document).on("click","#btnUpdateCliente",function(){
	
		var nombreup  = document.getElementById("nombrecup").value;
		var telefonoup  = document.getElementById("telefonocup").value;
		var emailup  = document.getElementById("emailcup").value;
		var idcup  = document.getElementById("idcup").value;
		var apellidocup  = document.getElementById("apellidocup").value;
		var dnicup  = document.getElementById("dnicup").value;

		
		$.ajax({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-tokenup"]').attr('content')
			
			},
			url:'Cliente/'+idcup,
			type: 'PUT',
			
			
			
			/*dataType:'json',*/
			data:{'nombre':nombreup,
		           'telefono':telefonoup,
		           'email':emailup,
		           'id':idcup,'apellido':apellidocup,'dni':dnicup
		           },
			success:function(rs){
				 alertify.success(rs);

				
			}


		});
	
	});


/*Eliminar*/

$(document).on('click',"#btnEliminar",function(){
	id=$(this).attr("idcdelete");
	token=$(this).attr("token");


	alertify.confirm('Confirm Title', 'Confirm Message', 


		function(){ 
				$.ajax({
				headers: {
				'X-CSRF-TOKEN':token
				
				},
				url: 'Cliente/'+id,
				type: 'DELETE',
				success:function(rs){
				alertify.success(rs);
				location.reload();
				}
				})
		}
        , function(){ alertify.error('Cancel')});

});

});

/*validacion inputs*/

$("#dni").maxlength({max: 8});
$("#telefono").maxlength({max: 9});

$("#dnicup").maxlength({max: 8});
$("#telefonocup").maxlength({max: 9});