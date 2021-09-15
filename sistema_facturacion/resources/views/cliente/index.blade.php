@extends('adminlte::page')
@section('title', 'Lista Clientes')
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
         <div class="col-11 pt-6 pb-6">
        
                <h2 class="section-heading text-center"><strong>Lista de Clientes</strong></h2>

                <div class="col-xl-12">
                    <form action="{{route('buscar_clientes')}}"  method="get">
                        <div class="form-row">
                            <div class="col-sm-4 my-1" >
                                <input type="text" class="form-control" name="texto" value="{{$texto}}">

                            </div>
                            <div class="col-auto my-1">
                                <input type="submit" class="btn btn-primary" value="Buscar" name="" id="">
                                <a href="{{ url('/clientes/listar')}}" class="btn btn-success" >Todos</a>
                            </div>

                        </div>
                    </form> 

                </div>
                <br>

        
                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Cédula</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th class="text-right">Acciones</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($clientes)<=0)
                            <tr>
                                <td colspan="8">No hay resultados</td>
                            </tr>
                        @else

                        @foreach( $clientes as $cliente )
                        <tr>
                            <td>{{ $cliente->id_cliente }}</td>
                            <td>{{ $cliente->nombres }}</td>
                            <td>{{ $cliente->apellidos }}</td>
                            <td>{{ $cliente->numero_cedula }}</td>
                            <td>{{ $cliente->direccion }}</td>
                            <td>{{ $cliente->telefono }}</td>
                            <td>{{ $cliente->correo }}</td>
                    
                            <td>
                                <a href="{{ url("/clientes/".$cliente->id_cliente.'/edit') }}" class="btn btn-warning" > Editar</a>
                            </td>
                            <td>
                                <form action="{{ url("/clientes/".$cliente->id_cliente) }}" class="d-inline" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Eliminar"> 
        
                                </form>
                            </td>
                                
                                
                            
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    
                </table>
                {{$clientes->links()}}
                

            </div>
        </div>
    </div>

@endsection