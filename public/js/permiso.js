document.getElementById("TitlePer").addEventListener("click",function(){
document.getElementById("cardPermisos").style.display = 'none';
document.getElementById("TitlePer").style.display = 'none';
});

$(document).on("click","#btnPermiso",function(){
document.getElementById("cardPermisos").style.display = 'block';
document.getElementById("TitlePer").style.display = 'block';

   var id = this.getAttribute("iduserper");
   var nombre = this.getAttribute("usuario");
   nombreM=nombre.toUpperCase();
   document.getElementById("divnombre").textContent=nombreM;
  
 


				$.ajax({
				url: 'Permiso/'+id,
				type: 'GET',
				data: {'id':id},
				success:function(rs){
                var pcli = document.getElementById("ckcliente");
                var pcate = document.getElementById("ckcategoria");
                var pprove = document.getElementById("ckproveedor");
                var pproduc = document.getElementById("ckproducto");
                var pcompr = document.getElementById("ckcompra");
                var pvent = document.getElementById("ckventa");
                var pconsult = document.getElementById("ckconsulta");
                var preport = document.getElementById("ckreporte");
               

 
				document.getElementById("idusuarioactualizar").value=rs['id_usuario'];
							if(rs['pcategoria'] == 0){
							pcate.checked = false;
							
							}else{ 
							pcate.checked = true;
							
							}



							if(rs['pcliente'] == 0){
							pcli.checked = false;
							
							}else{ 
							pcli.checked = true;
							
							}


							
							if(rs['pproveedores'] == 0){
							pprove.checked = false;
							
							}else{ 
							pprove.checked = true;
							
							}


							
							if(rs['pproductos'] == 0){
							pproduc.checked = false;
							
							}else{ 
							pproduc.checked = true;
							
							}


							
							if(rs['pcompra'] == 0){
							pcompr.checked = false;
							
							}else{ 
							pcompr.checked = true;
							
							}


								
								if(rs['pventa'] == 0){
								pvent.checked = false;
								
								}else{ 
								pvent.checked = true;
								
								}


								if(rs['pcompra'] == 0){
								pcompr.checked = false;
								
								}else{ 
								pcompr.checked = true;
								
								}


								if(rs['pconsultas'] == 0){
								pconsult.checked = false;
								
								}else{ 
								pconsult.checked = true;
								
								}


								if(rs['preporte'] == 0){
								preport.checked = false;
								
								}else{ 
								preport.checked = true;
								
								}
					
				}
   });
});



/*actualizar*/
$(document).on("click","#btnUpdatePermiso",function(){



	var pcli = document.getElementById("ckcliente");
	var pcate = document.getElementById("ckcategoria");
	var pprove = document.getElementById("ckproveedor");
	var pproduc = document.getElementById("ckproducto");
	var pcompr = document.getElementById("ckcompra");
	var pvent = document.getElementById("ckventa");
	var pconsult = document.getElementById("ckconsulta");
	var preport = document.getElementById("ckreporte");

 if(pcli.checked == true){
 	pcli.value = '1';
 }else{
 	pcli.value = '0';
 }
 
  if(pcate.checked == true){
 	pcate.value = '1';
 }else{
 	pcate.value = '0';
 }

  if(pprove.checked == true){
 	pprove.value = '1';
 }else{
 	pprove.value = '0';
 }

  if(pproduc.checked == true){
 	pproduc.value = '1';
 }else{
 	pproduc.value = '0';
 }

  if(pcompr.checked == true){
 	pcompr.value = '1';
 }else{
 	pcompr.value = '0';
 }

  if(pvent.checked == true){
 	pvent.value = '1';
 }else{
 	pvent.value = '0';
 }

  if(pconsult.checked == true){
 	pconsult.value = '1';
 }else{
 	pconsult.value = '0';
 }

  if(preport.checked == true){
 	preport.value = '1';
 }else{
 	preport.value = '0';
 }

	       var token= document.getElementById("token").value;
	       var id =document.getElementById("idusuarioactualizar").value;
		/*pcli
		pcate
		pprove
		pproduc
		pcompr
		pvent
		pconsult
		preport*/

			$.ajax({
				headers: {
				'X-CSRF-TOKEN':token
				},
				url: 'Permiso/'+id,
				type: 'PUT',
				data: {'cliente':pcli.value,
				'categoria':pcate.value,
				'proveedor':pprove.value,
				'producto':pproduc.value,
				'compra':pcompr.value,
				'venta':pvent.value,
				'consulta':pconsult.value,
				'reporte':preport.value},
				success:function(rs){

				
					alertify.success(rs);
					

					

				}
			});
});