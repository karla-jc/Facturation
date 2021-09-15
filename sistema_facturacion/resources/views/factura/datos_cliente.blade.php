<input type="hidden" id="cliente_id_input" name="cliente_id">

<div class="form-group row mb-3 d-none">
        <label for="cedula_input" class="col-sm-3 col-form-label">Cédula:</label>
        <input 
            type="text" 
            name="numero_cedula" 
            class="input_cliente form-control @error('nombres') is-invalid @enderror" 
            id="cliente_cedula_input"
            placeholder="Numero de cedula"
            value=""
            disabled
        >
        @error('numero_cedula')
        <small class="text-danger">*{{ $message }}</small>
        <br>
        @enderror
 </div>
<br>
<div class="form-group row mb-3 ">
        <label for="firstname_input" class="col-sm-3 col-form-label" >Nombres:</label>
        <div class="col-sm-9">
        <input 
            type="text" 
            name="nombresC" 
            class="input_cliente form-control @error('nombresC') is-invalid @enderror" 
            id="cliente_nombres_input"
            placeholder="Nombres"
            value=""
            disabled
        >
        </div>
        
        @error('nombresC')
        <small class="text-danger">*{{ $message }}</small>
        <br>
        @enderror
 </div>

 <div class="form-group row mb-3">
        <label for="firstname_input" class="col-sm-3 col-form-label">Apellidos:</label>
        <div class="col-sm-9">
        <input 
            type="text" 
            name="apellidosC" 
            class="input_cliente form-control @error('apellidosC') is-invalid @enderror" 
            id="cliente_apellidos_input"
            placeholder="Apellidos"
            value=""
            disabled
        >
        </div>
        
        @error('apellidosC')
        <small class="text-danger">*{{ $message }}</small>
        <br>
        @enderror
 </div>



 <div class="form-group row mb-3">
        <label for="firstname_input" class="col-sm-3 col-form-label">Dirección:</label>
        <div class="col-sm-9">
        <input 
            type="text" 
            name="direccion" 
            class="input_cliente form-control @error('direccion') is-invalid @enderror" 
            id="cliente_direccion_input"
            placeholder="Dirección"
            value=""
            disabled
        >
        </div>
        
        @error('direccion')
        <small class="text-danger">*{{ $message }}</small>
        <br>
        @enderror
 </div>

 <div class="form-group row mb-3">
        <label for="firstname_input" class="col-sm-3 col-form-label">Teléfono:</label>
        <div class="col-sm-9">
        <input 
            type="text" 
            name="telefono" 
            class="input_cliente form-control @error('telefono') is-invalid @enderror" 
            id="cliente_telefono_input"
            placeholder="Número de teléfono"
            value=""
            disabled
        >
        </div>
        
        @error('telefono')
        <small class="text-danger">*{{ $message }}</small>
        <br>
        @enderror
 </div>

 <div class="form-group row mb-3">
        <label for="firstname_input" class="col-sm-3 col-form-label">Correo:</label>
        <div class="col-sm-9">
        <input 
            type="email" 
            name="correo" 
            class="input_cliente form-control @error('correo') is-invalid @enderror" 
            id="cliente_correo_input"
            placeholder="Correo"
            value=""
            disabled
        >
        </div>
        
        @error('correo')
        <small class="text-danger">*{{ $message }}</small>
        <br>
        @enderror
 </div>

              