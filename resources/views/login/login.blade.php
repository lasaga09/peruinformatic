@extends('layauot.plantilla')
@section('title','Login')
@section('login')
<div class="logincontenedor">
  
  <div class="d-flex justify-content-center ">
    
    <div class="user_card">
      <div class="d-flex justify-content-center">
        <div class="brand_logo_container">
          <img src="img/iconosis.png" class="brand_logo" alt="Logo">
        </div>
      </div>

      <div class="formulario">
        
        <div class="texto">
          <img src="img/nombrelempres.png" width="300" class="textoimg">
        </div>

{{-- empiesa formulario --}}
 <form action="Login" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="inputs">
          
        <div class="input-group mt-3">
            <div class="input-group-prepend">
            <span class="input-group-text usercss"><i class="fas fa-user-tie"></i></span>
            </div>
            
            <input type ="text" class="form-control" id="user" name="user" placeholder="Username" aria-describedby="inputGroupPrepend" required>
           
        </div>

         <div class="input-group mt-3">
             <div class="input-group-prepend usercss">
             <span class="input-group-text usercss"><i class="fa fa-key icon"></i></span>
             </div>
             <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" aria-describedby="inputGroupPrepend" required>
             <div class="input-group-prepend">
             <span class="input-group-text usercsse" id="ver"><i class="fas fa-eye ver" ></i></span>
             <span class="input-group-text usercsse" id="ocultar" ><i class="fas fa-eye-slash" ></i></i></span>
             </div>
           
        </div>
          <div class="form-group bb">
          <button type="submit" class="btncss">Ingresar</button>
          <div class="mt-2">@include('login.mensaje')</div>
          </div>
         
          <div class="recuperar text-center" id="recuperar">
        <div class="rcss"><span >¿Olvidaste tu contraseña?</span> <a href="#" class="reccs">Recuperar</a></div>
         </div>





        </div>
        {{-- termina form --}}
         </form>
        

      </div>
          
    </div>
       
  </div>
</div>



<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
'use strict';
window.addEventListener('load', function() {
// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName('needs-validation');
// Loop over them and prevent submission
var validation = Array.prototype.filter.call(forms, function(form) {
form.addEventListener('submit', function(event) {
if (form.checkValidity() === false) {
event.preventDefault();
event.stopPropagation();
}
form.classList.add('was-validated');
}, false);
});
}, false);
})();
</script>
@endsection