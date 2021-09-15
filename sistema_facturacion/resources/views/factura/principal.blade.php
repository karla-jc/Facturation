@extends('adminlte::page')
@section('title', 'Factura')
@section('content')
@section('css')
    <link rel="stylesheet" href="/css/style.css">
@stop

@section('css')
    
    <link rel="stylesheet" href="/css/print.css" media="print" >
@stop

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

<div class="col-9">
        <h2>FACTURA</h2> 
     
</div>

    <div class="row">
        <div class="col card px-4 py-4">
            <h3 class="text-center mb-4 " style="background-color:rgb(255, 195, 30); color:White;"><strong>Nombre Empresa</strong> </h3>
            <p>Razón Social emisor</p> 
            <p>Dirección establecimiento</p>
        </div>
        <div class="col card px-4 py-4">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">R.U.C:</th>
                    <td >RUC emisor</td>
                    
                   
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2 " class="text-center mb-4">FACTURA</td>
                  </tr>
                  <tr>
                    <th scope="col">Autorización SRI:</th>
                    <td>Número de autorización 10 dígitos</td>
                    
                  </tr>

                </tbody>
                
              </table>
              <p class="text-center mb-4">Fecha de autorización (dd/mm/aaaa)</p>
            
    
            
        </div>
    </div>

<form action="{{route('save_factura')}}" method="post" enctype="multipart/form-data">

<div class="container">
  <div class="row">
    <div class="col card px-4 py-4">
    <h4>Datos Paciente</h4>

            <div class="form-row">
            <label >Número de Cédula:</label>
                <div class="col-sm-6 my-1" >
                    <input id="search_input" type="text" class="form-control">

                </div>
                <div class="col-auto my-1">
                    <button id="btn_search_cliente" type="button" class="btn btn-primary">Buscar</button>
                    
                </div>

            </div>

        @csrf
        @include('factura.datos_cliente')
        <br>

        <br>
    </div>
    <div class="col card px-4 py-4">
    <h4>Datos Doctor</h4>
            @include('factura.datos_medico')
            
            <div class="form-group row mb-3">
                <label for="firstname_input" class="col-sm-3 col-form-label">Forma de Pago:</label>
                <div class="col-sm-9">
                <select class="form-control" id="formap_select" name="forma_pago" >
                    <option value="" disabled >Seleccionar un valor</option>
                    <option value="Efectivo" {{ isset($factura->forma_pago ) ? ($factura->forma_pago === Efectivo ? 'selected':'') : '' }}>Efectivo</option>
                    <option value="TarjetadeCredito" {{ isset($factura->forma_pago ) ? ($factura->forma_pago === TarjetadeCredito ? 'selected':'') : '' }}>Tarjeta de Crédito</option>
                    <option value="TarjetadeDebito" {{ isset($factura->forma_pago ) ? ($factura->forma_pago === TarjetadeDebito ? 'selected':'') : '' }}>Tarjeta de Débito</option>
                    <option value="Transferencia" {{ isset($factura->forma_pago ) ? ($factura->forma_pago === Transferencia ? 'selected':'') : '' }}>Tranferencia Bancaria</option>
                    
                </select>
                </div>
                @error('forma_pago')
                <small class="text-danger">*{{ $message }}</small>
                <br>
                @enderror
            </div>

            <div class="form-group row mb-3">
                <label for="firstname_input" class="col-sm-3 col-form-label">Observación:</label>
                <div class="col-sm-9">
                <input 
                    type="text" 
                    name="observacion" 
                    class="form-control @error('observacion') is-invalid @enderror" 
                    id="observacion_input"
                    placeholder="Escriba una breve observación"
                    value="{{ isset($factura->observacion)?$factura->observacion:old('observacion') }}"
                >
                </div>
                @error('observacion')
                <small class="text-danger">*{{ $message }}</small>
                <br>
                @enderror
            </div>
            <input type="hidden" value="{{ Auth::user()->id_account }}" name="account_id">

            <div class="form-group row mb-3">
                <label for="firstname_input" class="col-sm-3 col-form-label">Fecha:</label>
                <div class="col-sm-9">
                <input 
                    type="date" 
                    name="fecha" 
                    class="form-control @error('fecha') is-invalid @enderror" 
                    id="fecha_input"
                    value="{{ isset($factura->fecha)?$factura->fecha:old('fecha') }}"
                >
                </div>
                
                @error('fecha')
                <small class="text-danger">*{{ $message }}</small>
                <br>
                @enderror
            </div>

      
    </div>


   
        
</div>
</div>
<div class="container">

        <div class="card px-3 py-3">
        <h4>Detalle Factura</h4>
        @include('factura.detalle')
        </div>
        <div class="d-grid gap-2">
                <div class="col-md-6 offset-md-5">
                    <button class="btn btn-success" type="submit">Cobrar</button>
                    <a href="" class="btn btn-info">Cancelar</a>
                </div>
        </div>
        <br>
        

        

</div>
</form>
                           
@section('js')
    <script>
        $('#btn_search_cliente').on('click', function(e){
            var input_value = $('#search_input').val();
            $.ajax({
                type: 'GET',
                url: `/clientes/obtener-cliente/${input_value}`,
                success: function(data){
                    console.log('Datos: ', data);
                    if(data){
                        $('#cliente_id_input').val(data.id_cliente);

                        $('#cliente_cedula_input').val(data.numero_cedula);
                        $('#cliente_cedula_input').parent().addClass('d-none');

                        $('#cliente_nombres_input').val(data.nombres);
                        $('#cliente_apellidos_input').val(data.apellidos);
                        $('#cliente_direccion_input').val(data.direccion);
                        $('#cliente_telefono_input').val(data.telefono);
                        $('#cliente_correo_input').val(data.correo);

                        $('.input_cliente').attr('disabled', 'disabled');
                    }
                },
                error: function(error){
                    console.log('Error: ', error);
                    

                    Swal.fire('Registrar Cliente')
                    

                    $('#cliente_id_input').val('');
                    $('#cliente_cedula_input').val('');
                    $('#cliente_nombres_input').val('');
                    $('#cliente_apellidos_input').val('');
                    $('#cliente_direccion_input').val('');
                    $('#cliente_telefono_input').val('');
                    $('#cliente_correo_input').val('');

                    var cedula = $('#search_input').val();
                    $('#cliente_cedula_input').parent().removeClass('d-none');
                    $('#cliente_cedula_input').val(cedula);

                    $('.input_cliente').removeAttr('disabled', 'disabled');
                }
            });
            e.preventDefault();
        });
    </script>


    <script>
        $(document).ready(function() {
            
            
      
            $.ajax({
                url: `/medico/obtener-medico`,
                type: 'get',
                success: function(data){

                   
                    console.log('Datos:', data);
                    $.each(data, function(key, data){
                        
                        var option = '<option value="'+data.id_medico+'">'+(data.nombres)+' '+(data.apellidos)+'</option>'
                        

                        $("#medico_nombre_select").append(option);
                        //console.log('Var', option);

                        var select= $(option).val();
                        //console.log('Select', select);
                        
                        
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

        });


        $('#medico_nombre_select').change(function(e){
            var select_value = $('#medico_nombre_select').val();
            $.ajax({
                type: 'GET',
                url: `/medico/obtener-medico/${select_value}`,
                success: function(data){
                    console.log('DatosA: ', data);
                    if(data){
                        $('#medico_id_input').val(data.id_medico);
                        $('#medico_apellido_input').val(data.apellidos);
                        $('#medico_especialidad_input').val(data.especialidad.nombre);
                    }
                },
                error: function(error){
                    console.log('Error: ', error);
                    
                    $('#medico_id_input').val('');
                    $('#medico_apellido_input').val('');
                    $('#medico_especialidad_input').val('');
                }
            });
            e.preventDefault();
        });
         

    </script>



<script>
var contador = 1;
$(document).ready(function() {
            
            
      
            $.ajax({
                url: `/servicio/obtener-servicio`,
                type: 'get',
                success: function(data){

                   
                    console.log('DatosS:', data);
                    $.each(data, function(key, data){
                        
                        var optionS = '<option value="'+data.id_servicio+'">'+(data.nombre)+' </option>'
                        
                        
                        $("#servicio_select").append(optionS);
                        //console.log('Var', option);

                        var select= $(optionS).val();
                        
                        
                        
                    });
                    

                    $('#servicio_option').text('Seleccione un Servicio');
                    

                }
                ,
                error: function(error){
                    console.log('Error: ', error);
                }

           
            });

        });



        $('#servicio_select').change(function(e){
            var select_valueS = $('#servicio_select').val();
            $.ajax({
                type: 'GET',
                url: `/servicio/obtener-servicio/${select_valueS}`,
                success: function(data){
                    console.log('DatosServicio: ', data);
                    if(data){
                        var selectedrow = $('#columna_select').val();
                        $('#servicio_id_input_'+selectedrow).val(data.id_servicio);
                        $('#nombre_servicio_'+selectedrow).val(data.nombre);
                        $('#descripcion_servicio_'+selectedrow).val(data.nombre + ": " +data.descripcion);
                        $('#precio_servicio_'+selectedrow).val("$"+data.valor);
                        $('#servicio_iva_input_'+selectedrow).val(data.iva);
                        
                        
                    }
                    
                },
                error: function(error){
                    console.log('Error: ', error);
                    
                    $('#servicio_id_input').val('');
                    $('#nombre_servicio').val('');
                    $('#descripcion_servicio').val('');
                    $('#precio_servicio').val('');
                }
            });
            e.preventDefault();
        });




    function roundNumber(number,decimals) {
        var newString;
        decimals = Number(decimals);
        if (decimals < 1) {
            newString = (Math.round(number)).toString();
        } else {
            var numString = number.toString();
            if (numString.lastIndexOf(".") == -1) {
            numString += ".";
            }
            var cutoff = numString.lastIndexOf(".") + decimals;
            var d1 = Number(numString.substring(cutoff,cutoff+1));
            var d2 = Number(numString.substring(cutoff+1,cutoff+2));
            if (d2 >= 5) {
            if (d1 == 9 && cutoff > 0) {
                while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
                if (d1 != ".") {
                    cutoff -= 1;
                    d1 = Number(numString.substring(cutoff,cutoff+1));
                } else {
                    cutoff -= 1;
                }
                }
            }
            d1 += 1;
            } 
            if (d1 == 10) {
            numString = numString.substring(0, numString.lastIndexOf("."));
            var roundedNum = Number(numString) + 1;
            newString = roundedNum.toString() + '.';
            } else {
            newString = numString.substring(0,cutoff) + d1.toString();
            }
        }
        if (newString.lastIndexOf(".") == -1) {
            newString += ".";
        }
        var decs = (newString.substring(newString.lastIndexOf(".")+1)).length;
        for(var i=0;i<decimals-decs;i++) newString += "0";
        
        return newString; 
}
//Calculo suma todos los precios y subtotal 12%
function update_total() {
  var total = 0;
  $('.price').each(function(i){
    price = $(this).html().replace("$","");
    if (!isNaN(price)) total += Number(price);
  });

  total = roundNumber(total,2);

  $('#subtotal').html("$"+total);
  $('#subtotalDoce').val(total);
  

  
  update_balance();
  update_subtotal();
  update_IVA();

  console.log('t', total);
}

//Suma de descuentos unitarios
function update_descuento() {
  var totalD = 0;
  $('.descuentoT').each(function(i){
    descuentoT = $(this).html().replace("$","");
    if (!isNaN(descuentoT)) totalD += Number(descuentoT);
  });

  totalD = roundNumber(totalD,2);


  $('#totalDesc').html("$"+totalD);
  $('#descuentoT').val(totalD);

  
  update_subtotal();
  console.log('des', totalD);
  
}

//Calculo descuento unitario (tabla)
function update_descuentoT() {
  var rowD = $(this).parents('.item-row');
  var descuentoT = rowD.find('.du').val().replace("$","") * rowD.find('.qty').val();
  descuentoT = roundNumber(descuentoT,2);
  isNaN(descuentoT) ? rowD.find('.descuentoT').html("N/A") : rowD.find('.descuentoT').html("$"+descuentoT);
  
  update_descuento();
  //console.log('desT', descuentoT);
  
}

//Calculo Total +IVA
function update_balance() {
  var due = $("#total").html().replace("$","");
  var due1 = $("#iva").html().replace("$","");
  dueT = Number(due) + Number(due1);
  dueT = roundNumber(dueT,2);
  
  $('.due').html("$"+dueT);
  $('#total_factura').val(dueT);
  console.log('due', dueT);
}

//Calculo subtotal -descuentos
function update_subtotal() {
  var subtotalD = $("#subtotal").html().replace("$","") - $("#totalDesc").html().replace("$","");
  subtotalD = roundNumber(subtotalD,2);
  
  $('.subtotalD').html("$"+subtotalD);
  $('#total').html("$"+subtotalD);
  update_IVA();
  console.log('sub', subtotalD);
}

//Calculo IVA
function update_IVA() {
  var iva = $("#total").html().replace("$","") * 0.0;
  iva = roundNumber(iva,2);
  
  
  $('#iva').html("$"+iva);
  console.log('iva', iva);
  update_balance();
}


//Calculo precio TOTAL
function update_price() {
  var row = $(this).parents('.item-row');
  var price = row.find('.cost').val().replace("$","") * row.find('.qty').val();
  price = roundNumber(price,2);
  isNaN(price) ? row.find('.price').html("N/A") : row.find('.price').html("$"+price);
  
  update_total();
}


function bind() {
  $(".cost").blur(update_price);
  $(".qty").blur(update_price);
  $(".du").blur(update_descuentoT);
  $(".qty").blur(update_descuentoT);
}

function reiniciar(){
    $(".delete").unbind("click");
    $(".delete").on('click',function(e){
        var pos = $(this).parents('.item-row').attr('data-pos');
    $(this).parents('.item-row').remove();
    update_total();
    if ($(".delete").length < 2) $(".delete").hide();
    $('.columna_opcion[value="'+pos+'"]').remove();
    e.preventDefault();
  });


}

function addoption(){

    $("#columna_select").append('<option class="columna_opcion" value="'+contador+'">'+(contador+1)+'</option>');
}

$(document).ready(function() {

  $('input').click(function(){
    $(this).select();
  });

  $("#paid").blur(update_balance);

  
   
  $("#addrow").click(function(){
    $(".item-row:last").after(`
        <tr class="item-row" data-pos="${contador}">
            <td><div class="delete-wpr">${contador + 1}<a class="delete" href="#" title="Remove row" style="display: none;">X</a></div></td>
            <td class="description" ><textarea id="descripcion_servicio_${contador}" name="descripcion[]">Descripción del servicio</textarea><input type="hidden" id="servicio_id_input_${contador}" name="servicio_id[]"></td>
            <td><textarea class="cost" id="precio_servicio_${contador}" name="precio_unitario[]">$0.00</textarea></td>
            <td><textarea class="du"  name="descuento_unitario[]">$0.00</textarea></td>
            <td><textarea class="qty" name="cantidad[]">0</textarea></td>
            <td><span class="price">$0.00</span></td>
            <td class="d-none"><span class="descuentoT">$0.00</span></td>
        </tr>
    `);
    if ($(".delete").length > 0) $(".delete").show();
    bind();
    reiniciar();
    addoption();
    contador++;
  });
  
  bind();
  
  reiniciar();
 


  
});
</script>



@stop











@endsection
