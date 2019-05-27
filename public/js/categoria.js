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
var categoria=document.getElementById("categoria");
var descripcion=document.getElementById("descripcion");

btnAdd.addEventListener("click",function(e){

			$.ajax({	
			headers: {
			'X-CSRF-TOKEN':token.value
			},
			url: 'Categoria',
			type: 'POST',
			data: {'nombre':categoria.value,'descripcion':descripcion.value},
			success:function(rs){

				if(rs != '1'){
                  alertify.success(rs);
				document.getElementById("frmadd").reset();
				
				}else {
					alertify.error('campo nombre vacio');
				}

				

			}
			});

});



/*cargar datos para editar*/

$(document).on("click","#btnEdit",function(){
	
   var id=this.getAttribute("idcate");
   $.ajax({
   	url: 'Categoria/'+id,
   	type: 'GET',
   	data: {'id':id},
   	success:function(rs){
   		
   		document.getElementById("categoriaup").value=rs['nombre'];
   		document.getElementById("descripcionup").value=rs['descripcion'];
   		document.getElementById("idcateup").value=rs['idcategoria'];
   	}
   });
});



/*actualizar*/
$(document).on("click","#btnUpdate",function(){
            
			var token= document.getElementById("tokenup").value;
			var id= document.getElementById("idcateup").value;
			var  ca   =document.getElementById("categoriaup").value;
			var des = document.getElementById("descripcionup").value;

			$.ajax({
				headers: {
				'X-CSRF-TOKEN':token
				},
				url: 'Categoria/'+id,
				type: 'PUT',
				data: {'nombre':ca,'descripcion':des},
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
					url: 'Categoria/'+id,
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



