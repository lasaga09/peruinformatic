var ver =document.getElementById("ver");
document.getElementById('ocultar').style.display = 'none';
var ocultarVie =document.getElementById("ocultar");

ver.addEventListener('click',e=>{
var ocultar=document.getElementById('ocultar');

var pass=document.getElementById("pass");
  if (pass.type=='password') {

      pass.type = 'text';
      ocultar.style.display ='block';
      ver.style.display='none';
   }


})



ocultarVie.addEventListener('click',e=>{

var pass=document.getElementById("pass");
  if (pass.type=='text') {

      pass.type = 'password';
      ocultar.style.display ='none';
      ver.style.display='block';
   }
})



var statusClose=document.getElementById("cerrarMensaje");
statusClose.addEventListener("click", e=>{
   e.preventDefault();
  location.reload();

 
})

