@extends('adminlte::page')

@section('title', 'Registro')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-7 pt-3 pb-3">
                <div class="card">
                    <div class="card-body px-5 py-5">
                        <h3 class="text-center mb-4"> <strong>Anular Facturas</strong></h4>
                        <form action="{{ url('factura/'.$factura->id_factura) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
       
                            <div class="form-floating mb-3">
                                <label for="firstname_input">ID:</label>
                                <input 
                                    type="text" 
                                    name="id_factura" 
                                    class="form-control @error('nombres') is-invalid @enderror" 
                                    id="id_input"
                                    placeholder="ID"
                                    value="{{ isset($factura->id_factura)?$factura->id_factura:old('id_factura') }}"
                                    disabled
                                >
                                
                                @error('nombres')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                    <label for="firstname_input">Cliente:</label>
                                    <input 
                                        type="text" 
                                        name="cliente_id" 
                                        class="form-control @error('apellidos') is-invalid @enderror" 
                                        id="cliente_input"
                                        placeholder="Nombre y Apellido"
                                        value=""
                                        disabled
                                    >
                                    
                                    @error('cliente_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>

                        
                                    <input 
                                        type="hidden" 
                                        name="anulado" 
                                        class="form-control @error('anulado') is-invalid @enderror" 
                                        id="estado_input"
                                        placeholder="Estado de Factura"
                                        value=""
                                        
                                    >
                                    
                           
                            <div class="form-floating mb-3">
                                <label for="firstname_input">Estado:</label>
                                <input 
                                    type="text" 
                                    name="" 
                                    class="form-control @error('anulado') is-invalid @enderror" 
                                    id="estado_input_v"
                                    placeholder="Estado de Factura"
                                    value=""
                                    disabled
                                    
                                >
                                
                                @error('anulado')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>

                            <div class="form-floating mb-3">
                                    <label for="firstname_input">Total:</label>
                                    <input 
                                        type="text" 
                                        name="total" 
                                        class="form-control @error('direccion') is-invalid @enderror" 
                                        id="total_input"
                                        placeholder="Total USD"
                                        value=""
                                        disabled
                                    >
                                    
                                    @error('direccion')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                                

                                <div class="d-grid gap-2">
                                    <div class="col-md-6 offset-md-4">
                                        <button class="btn btn-danger" id="anular" type="submit">Anular</button>
                                        <button class="btn btn-success" id="activar" type="submit">Activar</button>
                                        
                                    </div>
                                </div>
                                <br>
                                <div class="d-grid gap-2">
                                    <div class="col-md-6 offset-md-5">
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                    </div>
                                </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('js')
    <script>


        $(document).ready(function(){
            var select_value = $('#id_input').val();
            console.log('id', select_value);
            $.ajax({
                type: 'GET',
                url: `/factura/obtener-factura/${select_value}`,
                success: function(data){
                    console.log('Datos: ', data);
                    if(data){
                        $('#cliente_input').val(data.clientes.nombres + " " + data.clientes.apellidos);
                        $('#estado_input').val(data.anulado);
                        var estado = "Anulado";
                        if(data.anulado==1){
                            $('#estado_input_v').val(estado);
                        }else{
                            estado = "Activa";
                            $('#estado_input_v').val(estado);
                        }
                        $('#total_input').val(data.totalFactura);
                    }
                },
                error: function(error){
                    console.log('Error: ', error);
                    
                    $('#cliente_input').val();
                    $('#estado_input').val();
                    $('#total_input').val();
                }
            });
            
        });
    </script>


<script>
    $('#anular').on('click', function(e){
        var estadoA = $('#estado_input').val();
        var valor = 1;
        var estadoAnu = "Anulado";
        
        if(estadoA==0){
            $('#estado_input').val(valor);
            $('#estado_input_v').val(estadoAnu);
            estadoA = $('#estado_input').val();

        }
        
        console.log('valorANular:', estadoA );
   
        e.preventDefault();
    });
</script>

<script>
    $('#activar').on('click', function(e){
        var estadoActivar = $('#estado_input').val();
        var valorA = 0;
        var estadoA = "Activa";
        
        if(estadoActivar==1){
            $('#estado_input').val(valorA);
            $('#estado_input_v').val(estadoA);
            estadoActivar = $('#estado_input').val();

        }
        console.log('valorActivar:', estadoActivar );
   
        e.preventDefault();
    });
</script>
        
    @stop
@endsection

