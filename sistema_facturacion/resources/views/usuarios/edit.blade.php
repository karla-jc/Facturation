@extends('adminlte::page')
@section('title', 'Editar Usuario')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 pt-5 pb-5">
            <div class="text-right mb-3">
                <a href="/admin/users" class="btn btn-outline-primary pt-1 pb-1">Regresar</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-4">Editar Información del Usuario</h4>
                    <form action="{{ url('/admin/update-user/'.$user->id_account) }}" method="post">
                        @csrf
                        {{ method_field('PUT') }}
                   
                        <div class="form-floating mb-3">
                            <label for="firstname_input">Nombres y Apellidos</label>
                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" id="firstname_input"
                                placeholder="Nombres" value="{{ $user->name }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <label for="firstname_input">Estado</label>
                            <select class="form-control" id="estado_select" name="estado" >
                                <option value="" disabled >Seleccionar un valor</option>
                                <option value="1" {{ isset($user->estado ) ? ($user->estado === 1 ? 'selected':'') : '' }}>Activo</option>
                                <option value="0" {{ isset($user->estado ) ? ($user->estado === 0 ? 'selected':'') : '' }}>Inactivo</option>
                                
                            </select>
                            
                            @error('estado')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                      
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary btn-block" type="submit">Actualizar Datos</button>
                        </div>
                    </form>
                    <hr>
                    <h4 class="mb-4">Actualizar Contraseña</h4>
                    <form action="{{ url('/admin/update-password/'.$user->id_account) }}" method="post">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-floating mb-3">
                            <label for="oldPassword">Contraseña Antigua</label>
                            <input type="password" name="oldPassword"
                                class="form-control @error('password') is-invalid @enderror" id="oldPassword"
                                placeholder="Contraseña Antigua">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <label for="newPassword">Nueva Contraseña</label>
                            <input type="password" name="newPassword"
                                class="form-control @error('confirm_password') is-invalid @enderror"
                                id="newPassword" placeholder="Nueva Contraseña">
                            @error('confirm_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-success btn-block" type="submit">Actualizar Contraseña</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection