@extends('adminlte::page')
@section('title', 'Lista Especialidades')
@section('content')


    <div class="container">
        <div class="row justify-content-center">
         <div class="col-11 pt-6 pb-6">
        
                <h2 class="section-heading text-center"><strong>Lista de Especialidades</strong></h2>

                <div class="col-xl-12">
                    <form action="{{route('buscar_especialidad')}}"  method="get">
                        <div class="form-row">
                            <div class="col-sm-4 my-1" >
                                <input type="text" class="form-control" name="texto" value="{{$texto}}">

                            </div>
                            <div class="col-auto my-1">
                                <input type="submit" class="btn btn-primary" value="Buscar" name="" id="">
                                <a href="{{ url('/especialidad/listar')}}" class="btn btn-success" >Todos</a>
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
                            <th>Estado</th>
                            <th>Acciones</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($especialidades)<=0)
                            <tr>
                                <td colspan="8">No hay resultados</td>
                            </tr>
                        @else

                        @foreach( $especialidades as $especialidad )
                        <tr>
                            <td>{{ $especialidad->id_especialidad }}</td>
                            <td class="text-uppercase">{{ $especialidad->nombre }}</td>
                            <td>{{ $especialidad->descripcion }}</td>

                            @if($especialidad->estado =="1")
                            <td>{{ $especialidad->estado ="Activo" }}</td>
                            @elseif($especialidad->estado =="0")
                            <td>{{ $especialidad->estado ="Inactivo" }}</td>
                            @endif
                    
                            <td>
                                <a href="{{ url("/especialidad/".$especialidad->id_especialidad.'/edit') }}" class="btn btn-warning" >   Editar</a>
                            <td>
                                <form action="{{ url("/especialidad/".$especialidad->id_especialidad) }}" class="d-inline" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Eliminar">
        
                                </form>
                            </td>
                                
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    
                </table>
                {{$especialidades->links()}}
                

            </div>
        </div>
    </div>

@endsection