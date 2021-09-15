<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/factura.css') }}" rel="stylesheet">
</head>
<body>
    
    <div class="container-fluid">
    <h2><strong>Factura</strong></h2>
    <hr style="border-top: 2px solid rgb(31, 69, 141);  margin: 0 auto;">

    <div>
        <table class="table table-bordered" id="parrafo">
            <tr>
              <td>
                  <p class="izq" >
                    <p><strong>Nombre Empresa</strong></p>   
                    <p><small>Razón Social emisor</small>  </p> 
                    <p><small>Dirección establecimiento</small></p>
                  </p>
              </td>
              <td>
                <p class="right">
                    <strong>R.U.C:</strong>
                    <p class="right"><small>RUC emisor</small></p>
                    <p class="right"><strong>AUT. SRI:</strong></p>
                    <p class="right"><small>Número de autorización 10 dígitos</small></p>
                    <p class="right"><small>Fecha de autorización (dd/mm/aaaa)</small></p>
                </p>
              </td>
            </tr>
          </table>

    </div>

    <table class="table table-bordered" id="parrafo">
        <tr>
        @foreach( $facturas as $factura )
          <td>
            
                <h6>Datos del Paciente</h6>
                @foreach( $clientes as $cliente )
                    @if($factura->cliente_id == $cliente->id_cliente)
                        <p><small><strong>C.I: </strong>{{ $cliente->numero_cedula }}</small></p>
                        <p><small><strong>Nombre: </strong>{{ $cliente->nombres.' '.$cliente->apellidos}}</small></p>
                        <p><small><strong>Dirección: </strong>{{ $cliente->direccion}}</small></p>
                        <p><small><strong>Teléfono: </strong>{{ $cliente->telefono}}</small></p>
                        <p><small><strong>Correo: </strong>{{ $cliente->correo}}</small></p>
                    @endif
                 @endforeach
                
                 
    
              
          </td>
          <td>
                <h6>Datos del Doctor</h6>
                
                    @foreach( $medicos as $medico )
                        @if($factura->medico_id == $medico->id_medico)
                            <p><small><strong>Nombre: </strong>DR.{{ $medico->nombres.' '.$medico->apellidos}}</small></p>
                            @foreach( $especialidades as $especialidad )
                                @if($medico->especialidad_id == $especialidad->id_especialidad)
                                <p><small><strong>Especialidad: </strong>{{ $especialidad->nombre}}</small></p>
                                @endif
                            @endforeach
                            
                         @endif
                    @endforeach
                    
          </td>
          <td>
            <p><small><strong>Forma de Pago: </strong>{{$factura->forma_pago}}</small></p>
            <p><small><strong>Fecha Emisión: </strong>{{$factura->fecha}}</small></p>
          </td>
      
        
        </tr>
      </table>

      <table id="items">
		
        <thead>
            <tr>
                <th >Descripción</th>
                <th >Precio Unitario</th>
                <th >Descuento Unitario</th>
                <th >Cantidad</th>
                <th >Precio Total</th>
            </tr>
        </thead>        
        <tbody>
            @foreach( $detalles as $detalle )
            @if($factura->id_factura == $detalle->factura_id)
            
            
            <tr>
                <td>{{ $detalle->descripcion}}</td>
                <td>${{ $detalle->precio_unitario}}</td>
                <td>${{ $detalle->descuento_unitario}}</td>
                <td>{{ $detalle->cantidad}}</td>
                <td>${{ $detalle->total}}</td>
            </tr>
                @endif
            @endforeach
            
            
            <tr>
                <td colspan="2" class="blank"> </td>
                <td colspan="2" class="total-line">Subtotal 0%</td>
                <td class="total-value"><div id="">$0.00</div></td>
            </tr>
            <tr>
                <td colspan="2" class="blank"> </td>
                <td colspan="2" class="total-line">Subtotal 12%</td>
                <td class="total-value"><div id="subtotal">${{$factura->subtotal}}</div></td>
            </tr>
    
            <tr>
                <td colspan="2" class="blank"> </td>
                <td colspan="2" class="total-line">Descuento Total</td>
                <td class="total-value"><div id="totalDesc">${{$factura->descuento_Total}}</div></td>
            </tr>
    
            <tr>
                <td colspan="2" class="blank"> </td>
                <td colspan="2" class="total-line">Subtotal</td>
                <td class="total-value"><div class="subtotalD">${{$factura->totalFactura}}</div></td>
            </tr>
    
            <tr>
    
                <td colspan="2" class="blank"> </td>
                <td colspan="2" class="total-line">Total</td>
                <td class="total-value"><div id="total">${{$factura->totalFactura}}</div></td>
            </tr>
            <tr>
                <td colspan="2" class="blank"> </td>
                <td colspan="2" class="total-line">IVA</td>
    
                <td class="total-value"><div id="iva">$0.00</div></td>
            </tr>
            <tr>
                <td colspan="2" class="blank"> </td>
                <td colspan="2" class="total-line balance"><b>Total USD<b></td>
                <td class="total-value balance"><div class="due">${{$factura->totalFactura}}</div></td>
                
            </tr>
            
       
        </tbody>
        @endforeach
      
      </table>
      <br>
      <br>
      <div class="footer_doc text-center" style="border-top: 1px solid #333; width: 300px; margin: 0 auto;">
        <br>
        <p style="text-align: center; line-height: 1px; font-size: 14px;"><b>Firma de Conformidad </b></p>
    </div>

    

            
    
    <footer>
        <table>
          <tr>
            <td>
                <p class="izq">
                  correo@gmail.com
                </p>
            </td>
            <td>
              <p class="page">
                Página
              </p>
            </td>
          </tr>
        </table>
      </footer>
   
    </div>


    
</body>
</html>

