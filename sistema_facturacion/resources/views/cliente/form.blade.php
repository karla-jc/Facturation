<div class="form-floating mb-3">
        <label for="firstname_input">Nombres:</label>
        <input 
            type="text" 
            name="nombres" 
            class="form-control @error('nombres') is-invalid @enderror" 
            id="nombres_input"
            placeholder="Nombres"
            value="{{ isset($cliente->nombres)?$cliente->nombres:old('nombres') }}"
        >
        
        @error('nombres')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
 </div>

 <div class="form-floating mb-3">
        <label for="firstname_input">Apellidos:</label>
        <input 
            type="text" 
            name="apellidos" 
            class="form-control @error('apellidos') is-invalid @enderror" 
            id="apellidos_input"
            placeholder="Apellidos"
            value="{{ isset($cliente->apellidos)?$cliente->apellidos:old('apellidos') }}"
        >
        
        @error('apellidos')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
 </div>

 <div class="form-floating mb-3">
        <label for="firstname_input">Cédula:</label>
        <input 
            type="text" 
            name="numero_cedula" 
            class="form-control @error('numero_cedula') is-invalid @enderror" 
            id="numero_cedula_input"
            placeholder="Número de cédula"
            value="{{ isset($cliente->numero_cedula)?$cliente->numero_cedula:old('numero_cedula') }}"
        >
        
        @error('numero_cedula')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
 </div>

 <div class="form-floating mb-3">
        <label for="firstname_input">Dirección:</label>
        <input 
            type="text" 
            name="direccion" 
            class="form-control @error('direccion') is-invalid @enderror" 
            id="direccion_input"
            placeholder="Dirección"
            value="{{ isset($cliente->direccion)?$cliente->direccion:old('direccion') }}"
        >
        
        @error('direccion')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
 </div>

 <div class="form-floating mb-3">
        <label for="firstname_input">Teléfono:</label>
        <input 
            type="text" 
            name="telefono" 
            class="form-control @error('telefono') is-invalid @enderror" 
            id="telefono_input"
            placeholder="Número de teléfono"
            value="{{ isset($cliente->telefono)?$cliente->telefono:old('telefono') }}"
        >
        
        @error('telefono')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
 </div>

 <div class="form-floating mb-3">
        <label for="firstname_input">Correo:</label>
        <input 
            type="email" 
            name="correo" 
            class="form-control @error('correo') is-invalid @enderror" 
            id="correo_input"
            placeholder="Correo"
            value="{{ isset($cliente->correo)?$cliente->correo:old('correo') }}"
        >
        
        @error('correo')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
 </div>
    

                           
    
              