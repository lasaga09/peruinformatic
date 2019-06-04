/*add proveedor*/

var btnAddProve = document.getElementById("btnAddProve");

$(document).on("click","#btnAddProve",function(e){

var id = this.getAttribute("idprove");
var nombre = this.getAttribute("nombre");

document.getElementById("verproveedor").value=nombre;
document.getElementById("proveedor").value=id;


alert("Agregado");

});




/*add producto*/

var btnAddProducto = document.getElementById("btnAddProducto");

$(document).on("click","#btnAddProducto",function(e){

var id = this.getAttribute("idproducto");
var nombre = this.getAttribute("nombrepro");
var generica = this.getAttribute("pgenerica");
var alternativo = this.getAttribute("palternativo");
var original = this.getAttribute("poriginal");


document.getElementById("verproducto").value=nombre;
document.getElementById("producto").value=id;
document.getElementById("generico").value=generica;
document.getElementById("alternativo").value=alternativo;
document.getElementById("original").value=original;


alert("Agregado");

});




$(document).ready(function(){

var ultimoid = document.getElementById("ultimoid").value;



document.getElementById("numero").value='N-000'+ ultimoid;
document.getElementById("numerocompra").value='N-000'+ ultimoid;
});



/*paginar*/

$(document).ready(function(){

$("#tal").dataTable({
 language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
            },
            }
});

});





/*detalle de compra*/


$(document).on("click","#btnDetalle",function(e){

var id = this.getAttribute("iddeta");

$.ajax({
      url: 'Compra/create',
      type: 'GET',
      data: {'id':id},
      success:function(rs){
            var lista="";
            
       
            rs.forEach( function(e) {
                            lista+='<tr>';
                            lista+='<td>'+e.producto+'</td>';
                            lista+='<td>'+e.generico+'</td>';
                            lista+='<td>'+e.alternativo+'</td>';
                            lista+='<td>'+e.original+'</td>';
                            lista+='<td>'+e.precio+'</td>';
                            lista+='<td>'+e.cantidad+'</td>';

                            lista+='<td>'+e.importe+'</td>';
                            lista+='</tr>';
            });
            
document.getElementById("dtosDetalle").innerHTML=lista;
      }


      
});



});


/*eliminar compra*/


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
                              url: 'Compra/'+id,
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




