<div class="form-floating mb-3">
        <label for="firstname_input">Nombres:</label>
        <input 
            type="text" 
            name="nombres" 
            class="form-control @error('nombres') is-invalid @enderror" 
            id="nombre_input"
            placeholder="Nombres"
            value="{{ isset($medico->nombres)?$medico->nombres:old('nombres') }}"
            
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
            id="nombre_input"
            placeholder="Apellidos"
            value="{{ isset($medico->apellidos)?$medico->apellidos:old('apellidos') }}"
            
        >
        
        @error('apellidos')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
 </div>

 <div class="form-floating mb-3">
        <label for="firstname_input">Especialidad:</label>
        <select class="form-control" id="especialidad_select" name="especialidad_id" >
            @foreach( $especialidades as $especialidad )
                <option value="{{ $especialidad->id_especialidad }}" {{ isset($medico->especialidad_id) ? ($medico->especialidad_id === $especialidad->id_especialidad ? 'selected':''):'' }}>{{$especialidad->nombre}} </option>    
                
            @endforeach
        
            
        </select>
        
        @error('especialidad_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
 </div>

 <div class="form-floating mb-3">
        <label for="firstname_input">Observación:</label>
        <input 
            type="text" 
            name="observacion" 
            class="form-control @error('observacion') is-invalid @enderror" 
            id="descripcion_input"
            placeholder="Observación"
            value="{{ isset($medico->observacion)?$medico->observacion:old('observacion') }}"
        >
        
        @error('observacion')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
 </div>




