


/*recargar la pagina */

var btncerrarModal = document.getElementById("btncerrarModal");
btncerrarModal.addEventListener("click",function(e){
	  location.reload();
	  e.preventDefault();
});



/*agregar cliente*/

var btnSavec = document.getElementById("btnSavec");
btnSavec.addEventListener("click",e=>{
 const nombre  = document.getElementById("nombre").value;
const telefono  = document.getElementById("telefono").value;
const email  = document.getElementById("email").value;

if(nombre != ''){



			$.ajax({
			
			type: 'POST',
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			
			},
			url:'/Cliente' ,
			/*dataType:'json',*/
			data: {'email':email,
			'nombre':nombre,
			'telefono':telefono},
			success:function(rs){

					limpiarForm();
				Command: toastr["success"](rs)
				
				toastr.options = {
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
	
	toastr.options = {
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
			
			url:'/Cliente/'+idc,
			dataType:'json',
			success:function(rs){
					
					document.getElementById("nombrecup").value=rs[0]['nombre'];
					document.getElementById("telefonocup").value=rs[0]['telefono'];
					document.getElementById("emailcup").value=rs[0]['email'];
					document.getElementById("idcup").value=rs[0]['idcliente'];


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
		
		$.ajax({
			url:'/Cliente/'+idcup,
			type: 'PUT',
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-tokenup"]').attr('content')
			
			},
			
			
			/*dataType:'json',*/
			data:{'nombre':nombreup,
		           'telefono':telefonoup,
		           'email':emailup
		           },
			success:function(rs){
				console.log(rs)
					
					
				


			}


		});
	
	});



});


 
	