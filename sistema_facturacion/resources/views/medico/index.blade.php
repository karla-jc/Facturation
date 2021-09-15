@extends('adminlte::page')
@section('title', 'Lista Médicos')
@section('content')


    <div class="container">
        <div class="row justify-content-center">
         <div class="col-11 pt-6 pb-6">
        
                <h2 class="section-heading text-center"><strong>Lista de Médicos</strong></h2>

                <div class="col-xl-12">
                    <form action="{{route('buscar_medico')}}"  method="get">
                        <div class="form-row">
                            <div class="col-sm-4 my-1" >
                                <input type="text" class="form-control" name="texto" value="{{$texto}}">

                            </div>
                            <div class="col-auto my-1">
                                <input type="submit" class="btn btn-primary" value="Buscar" name="" id="">
                                <a href="{{ url('/medico/listar')}}" class="btn btn-success" >Todos</a>
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
                            <th>Especialidad</th>
                            <th>Observación</th>
                            <th>Acciones</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($medicos)<=0)
                            <tr>
                                <td colspan="8">No hay resultados</td>
                            </tr>
                        @else

                        @foreach( $medicos as $medico )
                        <tr>
                            <td>{{ $medico->id_medico }}</td>
                            <td>{{ $medico->nombres }}</td>
                            <td>{{ $medico->apellidos}}</td>
                            @foreach( $especialidades as $especialidad )
                                @if($medico->especialidad_id == $especialidad->id_especialidad)
                                <td>{{ $especialidad->nombre }}</td>
                                @endif
                            @endforeach


                            <td>{{ $medico->observacion}}</td>

                    
                            <td>
                                <a href="{{ url("/medico/".$medico->id_medico.'/edit') }}" class="btn btn-warning" >   Editar</a>
                             
                            </td>
                            <td>
                                <form action="{{ url("/medico/".$medico->id_medico) }}" class="d-inline" method="post">
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
                {{$medicos->links()}}
                

            </div>
        </div>
    </div>

@endsection