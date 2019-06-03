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

document.getElementById("verproducto").value=nombre;
document.getElementById("producto").value=id;


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

})