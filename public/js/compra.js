/*add proveedor*/

var btnAddProve = document.getElementById("btnAddProve");

$(document).on("click","#btnAddProve",function(e){

var id = this.getAttribute("idprove");
var nombre = this.getAttribute("nombre");

document.getElementById("verproveedor").value=nombre;
document.getElementById("proveedor").value=id;


alert("Agregado");

});


$(document).ready(function(){

var ultimoid = document.getElementById("ultimoid").value;



document.getElementById("numero").value='N-000'+ ultimoid;
});