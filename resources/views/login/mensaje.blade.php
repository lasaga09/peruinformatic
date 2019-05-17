 @if (session('status'))
        <div class="alert alert-danger text-center alert-dismissible fade show cssstatus" role="alert">
        <i class="fas fa-bell"></i> {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="cerrarMensaje">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
       
        </div>
        @endif