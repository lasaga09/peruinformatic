

$(document).on("click","#btnSugerir",function(){

document.getElementById("cargaSimulada").style.display='block';

setTimeout(function(){ 
document.getElementById("cargaSimulada").style.display='none';
document.getElementById("msu").style.display='block';

}, 2000);

var id = this.getAttribute("idproductosugerencia");


    $.ajax({
   	url: 'Producto/create',
   	data:{'id':id},
   	type: 'GET', 
   	success:function(rs){
  
      var datos ='';

   		
   		if(Object.keys(rs).length === 0){
   			
   		datos+='<span style="font-size:40px;color:#fff"><i  class="fa fa-frown-o" aria-hidden="true"></i> Sugerencias no encontradas!!!</span><br>';

   		}else{
   			rs.forEach( function(valor) {
		datos+='<div class="col-4 text-center btn " style="-webkit-box-shadow: 0 0 15px 0 #454d66;background:#58b368;'+
		'box-shadow: 0 0 15px 0 #454d66;">';
		datos+='<span>Nombre: '+valor['producto']+'</span><br>';
		datos+='<span>Stock: '+valor['stock']+'</span><br>';
		datos+='<span> Sede: '+valor['sede']+'</span><br>';
		datos+='</div>';
   			});
   		}
   				
		document.getElementById("datosSugerencia").innerHTML=datos;
   	}

   });


});



$(document).on("click","#btnclosesu",function(){


document.getElementById("msu").style.display='none'

});

