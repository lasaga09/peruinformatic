var btnAdd=document.getElementById("btnAdd");
var token=document.getElementById("token");
var rol=document.getElementById("rol");
var descripcion=document.getElementById("descripcion");

btnAdd.addEventListener("click",function(e){

   if(rol.value != ''){
    $.ajax({	
			headers: {
			'X-CSRF-TOKEN':token.value
			},
			url: 'Rol',
			type: 'POST',
			data: {'nombre':rol.value,'descripcion':descripcion.value},
			success:function(rs){

				if(rs == '1'){
                  alertify.success("Agregado correctamente!!!");
				document.getElementById("frmadd").reset();
				
				}else {
					alertify.error('rol duplicado');
				}

				

			}
			});

   }else{
   		
   		alertify.error('Campo vacio');

   }



		

});

    rol.addEventListener("keyup",function(){
	var s=this.value.replace(/\b[a-z]/g,c=>c.toUpperCase());
	this.value=s;
});
