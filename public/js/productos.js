

/*animaacion para carga*/
$(window).on('load', function () {
      setTimeout(function () {
    $(".loader-page").css({visibility:"hidden",opacity:"0.9"})
  }, 1000);
     
});

/*recargar la pagina */

var btncerrarModal = document.getElementById("cerraradd");
btncerrarModal.addEventListener("click",function(e){
	  location.reload();
	  e.preventDefault();
});



var btncerrarModalup = document.getElementById("cerrarup");
btncerrarModalup.addEventListener("click",function(e){
	  location.reload();
	  e.preventDefault();
});


var btnAdd=document.getElementById("btnAdd");
var token=document.getElementById("token");
var producto=document.getElementById("producto");
var marca=document.getElementById("marca");
var color=document.getElementById("color");
var modelo=document.getElementById("modelo");
var generica=document.getElementById("generica");
var original=document.getElementById("original");
var compra=document.getElementById("compra");
var venta=document.getElementById("venta");
var stock=document.getElementById("stock");
var categoria=document.getElementById("categoria");
var imagen=document.getElementById("imagen");
var sede=document.getElementById("idsede");

btnAdd.addEventListener("click",function(e){
 var formData = new FormData($('#formAd')[0]);
	

			$.ajax({	
			headers: {
			'X-CSRF-TOKEN':token.value
			},
			
			url: 'Producto',
			type: 'POST',
			data: formData, 
			cache: false,
			contentType: false,
			processData: false,
			
			success:function(rs){
				alertify.success(rs);

					

			}
			});

});


/*cargar datos para editar*/

$(document).on("click","#btnEdit",function(){
	
   var id=this.getAttribute("idcate");
 
   $.ajax({
   	url: 'Producto/'+id,
   	type: 'GET', 
   	success:function(rs){
   			document.getElementById("idproducto").value=rs['idproducto'];
   		
			document.getElementById("productoup").value=rs['nombre'];
			document.getElementById("marcaup").value=rs['id_marca'];
			document.getElementById("colorup").value=rs['id_color'];
			document.getElementById("modeloup").value=rs['modelo'];
			document.getElementById("genericaup").value=rs['pantalla_generica'];
			document.getElementById("originalup").value=rs['pantalla_original'];
			document.getElementById("compraup").value=rs['precio_compra'];
			document.getElementById("ventaup").value=rs['precio_venta'];
			document.getElementById("stockup").value=rs['stock'];
			document.getElementById("categoriaup").value=rs['id_categoria'];

            document.getElementById("imgshowup").src='imagenes/'+rs['imagen'];
            if(rs['imagen'] == ''){
            	 document.getElementById("imgshowup").src='img/de.png';
            }
            document.getElementById("imagenup").src=rs['imagen'];
            

	
		
   	}
   });
});



/*actualizar*/

var btnUpdate =document.getElementById("btnUpdate");



btnUpdate.addEventListener("click",function(e){
var token=document.getElementById("tokenup");
 var id= document.getElementById("idproducto").value;
  var formData = new FormData($('#formularioUp')[0]);



			$.ajax({	
			headers: {
			'X-CSRF-TOKEN':token.value
			},
			
			url: 'ProductoUp/'+id,
			type: 'POST',
			data:formData,
			cache: false,
			contentType: false,
			processData: false,
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
					url: 'Producto/'+id,
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






/*detalls*/

var btnDetails = document.getElementById("btnDetails");
$(document).on("click","#btnDetails",function(e){
	var id =this.getAttribute("idcateDetalle");


     $.ajax({
     	url: 'Producto/'+id+'/edit',
     	type: 'GET',
     	success:function(rs){
     	

     document.getElementById("imgdeta").src='imagenes/'+rs['imagen']
     document.getElementById("nombredeta").textContent = rs['producto'];
     document.getElementById("modelodeta").textContent = rs['modelo'];	
      document.getElementById("colordeta").textContent = rs['color'];
       document.getElementById("categoriadeta").textContent = rs['categoria'];
        document.getElementById("originaldeta").textContent = rs['pantalla_original'];
         document.getElementById("genericadeta").textContent = rs['pantalla_generica'];
          document.getElementById("compradeta").textContent = rs['precio_compra'];
           document.getElementById("ventadeta").textContent = rs['precio_venta'];
            document.getElementById("stockdeta").textContent = rs['stock'];
             document.getElementById("marcadeta").textContent = rs['marca'];
             document.getElementById("sededetat").textContent = rs['sede'];
             if (rs['imagen']=='') {
             document.getElementById("imgdeta").src='img/de.png';

             }
           



      }

     });
  
     


});















/*visualizar imagen*/

function init() {
  var inputFile = document.getElementById('imagen');
  inputFile.addEventListener('change', mostrarImagen, false);
}

function mostrarImagen(event) {
  var file = event.target.files[0];
  var reader = new FileReader();
  reader.onload = function(event) {
    var img = document.getElementById('imgshow');
    img.src= event.target.result;
  }
  reader.readAsDataURL(file);
}

window.addEventListener('load', init, false);


/*visualizar imagen update*/

function initup() {
  var inputFile = document.getElementById('imagenup');
  inputFile.addEventListener('change', mostrarImagenup, false);
}

function mostrarImagenup(event) {
  var file = event.target.files[0];
  var reader = new FileReader();
  reader.onload = function(event) {
    var img = document.getElementById('imgshowup');
    img.src= event.target.result;
  }
  reader.readAsDataURL(file);
}
 document.getElementById("imgshow").src='img/de.png';
window.addEventListener('load', initup, false);
