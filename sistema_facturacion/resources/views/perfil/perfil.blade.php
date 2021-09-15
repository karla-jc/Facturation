@extends('adminlte::page')
@section('title', 'Perfil')

@section('content')
<div class="container ">
  <div class="row justify-content-center">
    <div class="col-7 pt-5 pb-5">
      <div class="card">
        <div class="card-body">
          <h3 class="text-center mb-4"> <strong>Mi Perfil</strong></h4>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Nombres y Apellidos:</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{ Auth::user()->name }}
            </div>
          </div>
       
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Email:</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{ Auth::user()->email }}
            </div>
          </div>
          <hr>
          <div class="row mb-4">
            <div class="col-sm-3">
              <h6 class="mb-0">Rol:</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                @if(Auth::user()->role->nombre =='facturador')
                    Facturador
                @else
                    Administrador
                @endif
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Estado:</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              @if(Auth::user()->estado =="1")
                {{ Auth::user()->estado ="Activo" }}</td>
              @elseif(Auth::user()->estado =="0")
                {{ Auth::user()->estado ="Inactivo" }}</td>
              @endif
            </div>
          </div>
          <br>
          <div class="row justify-content-center">
            <div class="col-6">
              @if(Auth::user()->role->nombre =='facturador')
              <a href="/" class="btn btn-primary btn-block pt-1 pb-1">Regresar a Inicio</a>
              @else
              <a href="/admin" class="btn btn-primary btn-block pt-1 pb-1">Regresar a Inicio</a>
              @endif
               
                <form action="{{ route('logout') }}" method="post">
                  @csrf
                  <button type="submit" class="btn btn-outline-danger btn-block" style="padding: 5px; margin: 8px 0;">Cerrar sesión</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<hr>
@endsection