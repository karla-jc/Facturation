
<div class="form-group row mb-3">
        <label for="firstname_input" class="col-sm-2 col-form-label">Agregar Servicio:</label>
        <div class="col-sm-6">
        <select class="input_servicio form-control" id="servicio_select" name="servicios" >
                <option value="" id="servicio_option"></option>    
                    
        </select>
        </div>

        <div class="col-sm-3">
        <select class="input_servicio form-control" id="columna_select" name="" >
                <option class="columna_opcion" value="0">1</option>    
                    
        </select>
        </div>
        
        @error('servicio_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
 </div>


<table id="items">
		
        <thead>
            <tr>
                <th>#</th>
                <th>Descripción</th>
                <th>Precio Unitario</th>
                <th>Descuento Unitario</th>
                <th>Cantidad</th>
                <th>Precio Total</th>
                <th class="d-none">Descuento Total</th>
            </tr>
        </thead>
        
        
        <tbody>
        <tr class="item-row" data-pos="0">
            <td><div class="delete-wpr">1<a class="delete" href="#" title="Remove row" style="display: none;">X</a></div></td>
            <td class="description" ><textarea id="descripcion_servicio_0" name="descripcion[]">Descripción del servicio</textarea><input type="hidden" id="servicio_id_input_0" name="servicio_id[0]"></td>
            <td><textarea class="cost" id="precio_servicio_0" name="precio_unitario[]">$0.00</textarea></td>
            <td><textarea class="du"  name="descuento_unitario[]">$0.00</textarea></td>
            <td><textarea class="qty" name="cantidad[]">0</textarea></td>
            <td><span class="price">$0.00</span></td>
            <td class="d-none"><span class="descuentoT">$0.00</span></td>
        </tr>
        
        <tr id="hiderow">
          <td colspan="6"><a id="addrow" href="javascript:;" title="Add a row">Añadir Nuevo Servicio</a></td>
        </tr>
        
        <tr>
            <td colspan="3" class="blank"> </td>
            <td colspan="2" class="total-line">Subtotal 0%</td>
            <td class="total-value"><div id="">$0.00</div></td>
        </tr>
        <tr>
            <td colspan="3" class="blank"> </td>
            <td colspan="2" class="total-line">Subtotal 12%</td>
            <td class="total-value"><div id="subtotal">$0.00</div> <input type="hidden" id="subtotalDoce" name="subtotal"> </td>
        </tr>

        <tr>
            <td colspan="3" class="blank"> </td>
            <td colspan="2" class="total-line">Descuento Total</td>
            <td class="total-value"><div id="totalDesc">$0.00</div> <input type="hidden" id="descuentoT" name="descuento_Total"> </td>
        </tr>

        <tr>
            <td colspan="3" class="blank"> </td>
            <td colspan="2" class="total-line">Subtotal</td>
            <td class="total-value"><div class="subtotalD">$0.00</div></td>
        </tr>

        <tr>

            <td colspan="3" class="blank"> </td>
            <td colspan="2" class="total-line">Total</td>
            <td class="total-value"><div id="total">$0.00</div></td>
        </tr>
        <tr>
            <td colspan="3" class="blank"> </td>
            <td colspan="2" class="total-line">IVA</td>

            <td class="total-value"><div id="iva">$0.00</div></td>
        </tr>
        <tr>
            <td colspan="3" class="blank"> </td>
            <td colspan="2" class="total-line balance">Total USD</td>
            <td class="total-value balance"><div class="due">$0.00</div> <input type="hidden" id="total_factura" name="totalFactura"> </td>
            
        </tr>
        </tbody>
      
      </table>
