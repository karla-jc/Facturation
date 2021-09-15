@extends('layouts.main')
@section('title', 'Registro')
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
        <div class="col-7 pt-4 pb-4">
            <div class="card">
                <div class="card-body px-5 py-5">
                    
                <h3 class="text-center mb-4"> <strong>Registro Roles</strong></h4>
         
                <form action="{{ route('save_roles') }}" method="post">
                    @csrf
    
                
                    <div class="form-group mb-3">
                        <label for="role_name">Nombre: </label>
                        <input class="form-control" type="text" name="nombre" id="role_name">

                        @error('nombre')
                        <small class="text-danger">*{{ $message }}</small>
                        <br>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar rol</button>
                </form>



                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection