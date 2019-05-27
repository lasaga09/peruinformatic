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
var usuario=document.getElementById("usuario");
var password=document.getElementById("password");
var passwordup=document.getElementById("passwordup");
var idrol=document.getElementById("rol");
var idsede=document.getElementById("sede");

  

password.addEventListener("keyup", function(){

var mpas= document.getElementById("mpas");
if(this.value.length < 6 ){
   
	mpas.textContent='Contraseña debil';
	mpas.style.color='#D55252';
    

} if(this.value.length >=6 && this.value.length <=10 ) {
    mpas.textContent='Contraseña aceptable';
	mpas.style.color='#F0A926';
}
if(this.value.length >10 ) {
    mpas.textContent='Contraseña segura';
	mpas.style.color='#259425';
}




});

passwordup.addEventListener("keyup", function(){

var mpas= document.getElementById("mpasup");
if(this.value.length < 6 ){
   
	mpas.textContent='Contraseña debil';
	mpas.style.color='#D55252';
    

} if(this.value.length >=6 && this.value.length <=10 ) {
    mpas.textContent='Contraseña aceptable';
	mpas.style.color='#F0A926';
}
if(this.value.length >10 ) {
    mpas.textContent='Contraseña segura';
	mpas.style.color='#259425';
}




});

btnAdd.addEventListener("click",function(e){

	if (nombre.value != '' && usuario.value != '' && password.value != '' ) {
     
				if(password.value.length >=6){

						$.ajax({	
					headers: {
					'X-CSRF-TOKEN':token.value
					},
					url: 'Usuario',
					type: 'POST',
					data: {'nombre':nombre.value,
					'usuario':usuario.value,
					'password':password.value,
					'idrol':idrol.value,
					'idsede':idsede.value
					},
					success:function(rs){
					alertify.success(rs);
					document.getElementById("frmadd").reset();
					}
					});

				}else{
					alertify.error('Contraseña debil');
				}
					

		}else { 
			

				  alertify.error('campos vacios');
		}

	
		


	

		

});


/*cargar datos para editar*/

$(document).on("click","#btnEdit",function(){
	
   var id=this.getAttribute("iduser");
   var mensaje= document.getElementById("mpasup");
          mensaje.textContent='Si deja la contraseña vacia se mantendra la contraseña anterior';
          mensaje.style.color = '#6584DD';

   $.ajax({
   	url: 'Usuario/'+id,
   	type: 'GET',
   	data: {'id':id},
   	success:function(rs){
   		

   	  document.getElementById("idusuarioup").value=rs['idusuario'];
   		
   		document.getElementById("nombreup").value=rs['nombre'];
   		document.getElementById("usuarioup").value=rs['usuario'];
   		document.getElementById("rolup").value=rs['id_rol'];
   		document.getElementById("sedeup").value=rs['id_sede'];
   		
   	}
   });
});






/*actualizar*/
$(document).on("click","#btnUpdate",function(){
            
			var token= document.getElementById("tokenup").value;
			var id= document.getElementById("idusuarioup").value;
			var  nombre   =document.getElementById("nombreup").value;
			var  usuario   =document.getElementById("usuarioup").value;
			var  password   =document.getElementById("passwordup").value;
			var  idrol   =document.getElementById("rolup").value;
			var  idsede   =document.getElementById("sedeup").value;

				$.ajax({
				headers: {
				'X-CSRF-TOKEN':token
				},
				url: 'Usuario/'+id,
				type: 'PUT',
				data: {'nombre':nombre,
						'usuario':usuario,
						'password':password,
						'idrol':idrol,
						'idsede':idsede	},
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
					url: 'Usuario/'+id,
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











var ver =document.getElementById("ver");

var ocultarVie =document.getElementById("ocultar");

ver.addEventListener('click',e=>{
var ocultar=document.getElementById('ocultar');

var pass=document.getElementById("password");
  if (pass.type=='password') {

      pass.type = 'text';
      ocultar.style.display ='block';
      ver.style.display='none';
   }


})



ocultarVie.addEventListener('click',e=>{

var pass=document.getElementById("password");
  if (pass.type=='text') {

      pass.type = 'password';
      ocultar.style.display ='none';
      ver.style.display='block';
   }
})





var verup =document.getElementById("verup");

var ocultarVieup =document.getElementById("ocultarup");

verup.addEventListener('click',e=>{
var ocultarup=document.getElementById('ocultarup');

var passup=document.getElementById("passwordup");
  if (passup.type=='password') {

      passup.type = 'text';
      ocultarup.style.display ='block';
      verup.style.display='none';
   }


})



ocultarVieup.addEventListener('click',e=>{

var passup=document.getElementById("passwordup");
  if (passup.type=='text') {

      passup.type = 'password';
      ocultarup.style.display ='none';
      verup.style.display='block';
   }
})

