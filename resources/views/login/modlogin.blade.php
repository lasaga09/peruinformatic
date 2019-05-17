
<div class="container login-container" style="display: none;">
  <div class="row">
    <div class="col-md-6 ads">
      <h1><span id="fl">Peru</span><i>dd</i><span id="sl">informatico</span></h1>



    </div>

    <div class="col-md-6 login-form">
      <div class="profile-img">
        <img src="https://vignette.wikia.nocookie.net/naruto/images/2/27/Kakashi_Hatake.png/revision/latest?cb=20170628120149" alt="profile_img" height="140px" width="140px;">
      </div>
      <h3>Login</h3>
      <form action="/" method="POST" class="needs-validation" novalidate>
        @csrf
               
        
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
          </div>

            <input type ="text" class="form-control" id="user" name="user" placeholder="Username" aria-describedby="inputGroupPrepend" required>
            {{-- <span class="invalid-feedback">
            Por favor, elija un nombre de usuario
            </span> --}}
        </div>




        <br>

        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-key icon"></i></span>
          </div>
             <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" aria-describedby="inputGroupPrepend" required>
             <div class="input-group-prepend">
             <span class="input-group-text" id="ver"><i class="fas fa-eye ver" ></i></span>
             <span class="input-group-text" id="ocultar" ><i class="fas fa-eye-slash" ></i></i></span>
             </div>
             {{-- <div class="invalid-feedback">
             Por favor, elija una contraseña de usuario
             </div> --}}
        </div><br>
        
        <div class="form-group ">
          <button type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button>
        </div>


          @include('login.mensaje')

        
        <div class="form-group forget-password">
          <a href="#">Forget Password</a>
        </div>
       
      </form>
    </div>
  </div>
</div>
