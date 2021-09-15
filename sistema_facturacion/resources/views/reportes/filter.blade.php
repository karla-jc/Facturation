@extends('adminlte::page')

@section('title', 'Reportes')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-7 pt-3 pb-3">
                <div class="card">
                    <div class="card-body px-5 py-5">
                        <h3 class="text-center mb-4"> <strong>Reportes</strong></h4>
                        <form action="{{ route('ver_reporte') }}" method="post" enctype="multipart/form-data">
                            @csrf
       
                            <div class="form-group row mb-3">
                                <label for="firstname_input" class="col-sm-3 col-form-label">Filtrar por:</label>
                                <select class="col-sm-9 form-control" id="filtro" name="filter_by" >
                                    <option value="" disabled selected>Seleccionar Opción</option>
                                    <option value="medico" id="medico_option">Médico</option>
                                    <option value="especialidad" id="especialidad_option">Especialidad</option>
                                    <option value="completo" id="completo_option">Completo</option>
                        
                                </select>
                                
                                @error('especialidad_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group row mb-3">
                                <label for="firstname_input" class="col-sm-3 col-form-label">Seleccionar:</label>
                                <select class="col-sm-9 form-control" id="medico_select" name="value" >
                                    <option value="" disabled selected>Seleccionar Opción</option>
                                    
                                </select>
                                
                                @error('especialidad_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="form-group row mb-3">
                                <label for="especialidad_input" class="col-sm-3 col-form-label">Fecha Inicio:</label>
                                <div class="col-sm-9">
                                <input 
                                    type="date" 
                                    name="from_date" 
                                    class="input_medico form-control @error('especialidad') is-invalid @enderror" 
                                    id="medico_especialidad_input"
                                    placeholder="Especialidad"
                                    value=""
                                >
                                </div>
                                
                                @error('especialidad')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group row mb-3">
                                <label for="especialidad_input" class="col-sm-3 col-form-label">Fecha Fin:</label>
                                <div class="col-sm-9">
                                <input 
                                    type="date" 
                                    name="to_date" 
                                    class="input_medico form-control @error('especialidad') is-invalid @enderror" 
                                    id="medico_especialidad_input"
                                    placeholder="Especialidad"
                                    value=""
                                >
                                </div>
                                
                                @error('especialidad')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            
                                
                                <br>
                                <div class="d-grid gap-2">
                                    <div class="col-md-6 offset-md-3">
                                        <button class="btn btn-primary btn-block" type="submit">Generar</button>
                                    </div>
                                    <br>
                                </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
       
    </div>

@section ('js')
<script>
    $('#filtro').change(function(e){
    var select_option = $('#filtro').val();
    console.log(select_option)

    if(select_option =="medico"){
        
        $('#medico_select').removeAttr('disabled', 'disabled');
     
        
        $.ajax({
            url: `/medico/obtener-medico`,
            type: 'get',
            success: function(data){

               
                console.log('Datos:', data);
                document.getElementById('medico_select').innerHTML = ""
                
                $.each(data, function(key, data){
                    
                
                   
                    var option = '<option value="'+data.id_medico+'">'+(data.nombres)+' '+(data.apellidos)+'</option>'
                    

                    $("#medico_select").append(option);
                    //console.log('Var', option);

                    var select= $(option).val();
                    console.log('Select', select);
                    
                    
                });
                

                $('#nombre_option').text('Seleccione un nombre');
                

            }
            ,
            error: function(error){
                console.log('Error: ', error);
                $('#medico_id_input').val('');
                $('#medico_apellido_input').val('');
                $('#medico_especialidad_input').val('');
            }

       
        });


    }else if(select_option =="especialidad"){
        $('#medico_select').removeAttr('disabled', 'disabled');
        

        $.ajax({
            url: `/especialidad/obtener-especialidad`,
            type: 'get',
            success: function(data){

               
                console.log('Datos:', data);
                document.getElementById('medico_select').innerHTML = ""
                $.each(data, function(key, data){
                    
                    var option = '<option value="'+data.id_especialidad+'">'+(data.nombre)+'</option>'
                    

                    $("#medico_select").append(option);
                    //console.log('Var', option);

                    var select= $(option).val();
                    console.log('Select', select);
                    
                    
                });
                

                $('#nombre_option').text('Seleccione un nombre');
                

            }
            ,
            error: function(error){
                console.log('Error: ', error);
                $('#medico_id_input').val('');
                $('#medico_apellido_input').val('');
                $('#medico_especialidad_input').val('');
            }

       
        });


    }else if(select_option == "completo"){
        $('#medico_select').attr('disabled', 'disabled');
        document.getElementById('medico_select').innerHTML = ""

    }


    e.preventDefault();

    });

</script>



@stop

@endsection