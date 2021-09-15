@extends('adminlte::page')
@section('title', 'Edición')

@section('content')
    <div class="container">
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

        
        <div class="row justify-content-center">
            <div class="col-6 pt-5 pb-5">
                <div class="card">
                    <div class="card-body px-5 py-5">
                        <h4 class="text-center mb-4"><strong>Editar Inventario</strong></h4>
                        <form action="{{ url('inventario/'.$inventario->id_inventario) }}" method="post" enctype="multipart/form-data"> 
                            @csrf
                            @method('PATCH')

                            <div class="form-floating mb-3">
                                <label for="firstname_input">Nombre:</label>
                                <input 
                                    type="text" 
                                    name="nombre" 
                                    class="form-control @error('nombre') is-invalid @enderror" 
                                    id="nombre_input"
                                    placeholder="Nombre"
                                    value="{{ isset($inventario->nombre)?$inventario->nombre:old('nombre') }}"
                                >
                                
                                @error('nombre')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <div class="form-floating mb-3">
                                <label for="firstname_input">Descripción:</label>
                                <input 
                                    type="text" 
                                    name="descripcion" 
                                    class="form-control @error('descripcion') is-invalid @enderror" 
                                    id="descripcion_input"
                                    placeholder="Escriba una descripción..."
                                    value="{{ isset($inventario->descripcion)?$inventario->descripcion:old('descripcion') }}"
                                >
                                
                                @error('descripcion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <div class="form-floating mb-3">
                                <label for="firstname_input">Cantidad:</label>
                                <input 
                                    type="text" 
                                    name="cantidad" 
                                    class="form-control @error('cantidad') is-invalid @enderror" 
                                    id="cantidad_input"
                                    placeholder="Cantidad"
                                    value="{{ isset($inventario->cantidad)?$inventario->cantidad:old('cantidad') }}"
                                >
                                
                                @error('cantidad')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <div class="form-floating mb-3">
                                <label for="firstname_input">Fecha de Ingreso:</label>
                                <input 
                                    type="date" 
                                    name="fecha_ingreso" 
                                    class="form-control @error('fecha_ingreso') is-invalid @enderror" 
                                    id="fecha_ingreso_input"
                                    value="{{ isset($inventario->fecha_ingreso)?$inventario->fecha_ingreso:old('fecha_ingreso') }}"
                                    disabled
                                >
                                
                                @error('fecha_ingreso')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <div class="form-floating mb-3">
                                <label for="firstname_input">Fecha de la última revisión:</label>
                                <input 
                                    type="date" 
                                    name="fecha_revision" 
                                    class="form-control @error('fecha_revision') is-invalid @enderror" 
                                    id="fecha_revision_input"
                                    value=""
                                >
                                
                                @error('fecha_revision')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <div class="form-floating mb-3">
                                <label for="firstname_input">Observación:</label>
                                <input 
                                    type="text" 
                                    name="observacion" 
                                    class="form-control @error('observacion') is-invalid @enderror" 
                                    id="telefono_input"
                                    placeholder="Observación"
                                    value="{{ isset($inventario->observacion)?$inventario->observacion:old('observacion') }}"
                                >
                                
                                @error('observacion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="d-grid gap-2">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-success" type="submit">Enviar</button>
                                    <a href="{{ url('/inventario/listar')}}" class="btn btn-info">Regresar</a>
                                </div>
                            </div>
                            
                            
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection