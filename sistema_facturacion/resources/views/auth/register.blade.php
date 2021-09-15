@extends('adminlte::page')
@section('title', 'Registro de usuario')

@section('content')
<div class="container">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>
    @if (session('success'))
    <div class="alert alert-success d-flex align-items-center justify-content-center border-0 rounded-0 bg-success text-white text-center alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                
            </button>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-7 pt-5 pb-5">
           
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-4">{{ $name }}</h4>
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                
                        <div class="form-floating mb-3">
                            <label for="firstname_input">Nombres y Apellidos</label>
                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" id="firstname_input"
                                placeholder="Nombres" value="{{ old('name') }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
            
                        <hr>
                        <div class="form-floating mb-3">
                            <label for="email_input">Correo electrónico</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="email_input" placeholder="Correo electrónico" value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <label for="password_input">Contraseña</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password_input"
                                placeholder="Contraseña">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <label for="confirm_password_input">Confirmar contraseña</label>
                            <input type="password" name="confirm_password"
                                class="form-control @error('confirm_password') is-invalid @enderror"
                                id="confirm_password_input" placeholder="Confirmar contraseña">
                            @error('confirm_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <input type="hidden" name="estado"  value="1">

                        @if ($isAdmin === true)
                        <div class="form-floating mb-3">
                            <label for="roles">Rol</label>
                            <select name="role" class="form-control" id="roles">
                                <option selected>Elija uno ..</option>
                                @foreach( $roles as $role )
                                <option value="{{ $role->id_role }}">{{ $role->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <div class="d-grid gap-2">
                            <button class="btn btn-success btn-block" type="submit">Crear cuenta</button>
                            <a href="/admin/users" class="btn btn-info btn-block">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection