@extends('adminlte::page')
@section('title', 'Lista Servicios')
@section('content')


    <div class="container">
        <div class="row justify-content-center">
         <div class="col-11 pt-6 pb-6">
        
                <h2 class="section-heading text-center"><strong>Lista de Servicios</strong></h2>

                <div class="col-xl-12">
                    <form action="{{route('buscar_servicio')}}"  method="get">
                        <div class="form-row">
                            <div class="col-sm-4 my-1" >
                                <input type="text" class="form-control" name="texto" value="{{$texto}}">

                            </div>
                            <div class="col-auto my-1">
                                <input type="submit" class="btn btn-primary" value="Buscar" name="" id="">
                                <a href="{{ url('/servicio/listar')}}" class="btn btn-success" >Todos</a>
                            </div>

                        </div>
                    </form> 

                </div>
                <br>

        
                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Valor</th>
                            <th>Paga IVA</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($servicios)<=0)
                            <tr>
                                <td colspan="8">No hay resultados</td>
                            </tr>
                        @else

                        @foreach( $servicios as $servicio )
                        <tr>
                            <td>{{ $servicio->id_servicio }}</td>
                            <td class="text-uppercase">{{ $servicio->nombre }}</td>
                            <td>{{ $servicio->descripcion }}</td>
                            <td>{{ $servicio->valor }}</td>

                            @if($servicio->iva =="1")
                            <td>{{ $servicio->iva ="Si" }}</td>
                            @elseif($servicio->iva =="0")
                            <td>{{ $servicio->iva ="No" }}</td>
                            @endif

                            @if($servicio->estado =="1")
                            <td>{{ $servicio->estado ="Activo" }}</td>
                            @elseif($servicio->estado =="0")
                            <td>{{ $servicio->estado ="Inactivo" }}</td>
                            @endif
                    
                            <td>
                                <a href="{{ url("/servicio/".$servicio->id_servicio.'/edit') }}" class="btn btn-warning" > Editar</a>
                                
                            </td>
                            <td>
                                <form action="{{ url("/servicio/".$servicio->id_servicio) }}" class="d-inline" method="post">
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
                {{$servicios->links()}}
                

            </div>
        </div>
    </div>

@endsection