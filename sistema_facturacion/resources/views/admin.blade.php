@extends('adminlte::page')

@section('title', 'Administrador')
@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success d-flex align-items-center justify-content-center border-0 rounded-0 bg-success text-white text-center alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                
            </button>
    </div>
@endif
    

@if (session('error'))
    <div class="alert alert-danger d-flex align-items-center justify-content-center border-0 rounded-0 bg-danger text-white text-center alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
            {{ session('error') }}
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="section-heading text-center"><strong>BIENVENIDO</strong></h2>
                    <h3>Usuario: <strong>{{ Auth::user()->name }}</strong></h3>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Ha iniciado la sesión con éxito.') }}
                    <br>
                    <br>
                  
                    



                    

   


                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection
