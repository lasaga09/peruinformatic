
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

	alert(imagen.value);

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
			 /*{'producto':producto.value,
					'marca':marca.value,
					'color':color.value,
					'modelo':modelo.value,
					'generica':generica.value,
					'original':original.value,
					'compra':compra.value,
					'venta':venta.value,
					'stock':stock.value,
					'categoria':categoria.value,
					'imagen':imagen.value,
					'sede':sede.value
		           },*/
			success:function(rs){
				console.log(rs);

			/*	if(rs != '1'){
                  alertify.success(rs);
				document.getElementById("frmadd").reset();
				
				}else {
					alertify.error('campo nombre vacio');
				}
*/
				

			}
			});

});


/*cargar img */
/*var imagen = document.getElementById("imagen");
imagen.addEventListener("change",function(){
if(this.value != ''){
	var newImagen=this.value;

$("#imgshow").attr('src',newImagen);
}

});
*/

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
