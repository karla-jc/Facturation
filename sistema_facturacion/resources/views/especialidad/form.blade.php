<div class="form-floating mb-3">
        <label for="firstname_input">Nombre:</label>
        <input 
            type="text" 
            name="nombre" 
            class="form-control text-uppercase @error('nombre') is-invalid @enderror" 
            id="nombre_input"
            placeholder="Nombre"
            value="{{ isset($especialidad->nombre)?$especialidad->nombre:old('nombre') }}"
            
        >
        
        @error('nombre')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
 </div>

 <div class="form-floating mb-3">
        <label for="firstname_input">Descripción:</label>
        <input 
            type="text" 
            name="descripcion" 
            class="form-control @error('descripcion') is-invalid @enderror" 
            id="descripcion_input"
            placeholder="Escriba una breve descripción"
            value="{{ isset($especialidad->descripcion)?$especialidad->descripcion:old('descripcion') }}"
        >
        
        @error('descripcion')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
 </div>

 <div class="form-floating mb-3">
        <label for="firstname_input">Estado</label>
        <select class="form-control" id="estado_select" name="estado" >
            <option value="" disabled >Seleccionar un valor</option>
            <option value="1" {{ isset($especialidad->estado ) ? ($especialidad->estado === 1 ? 'selected':'') : '' }}>Activo</option>
            <option value="0" {{ isset($especialidad->estado ) ? ($especialidad->estado === 0 ? 'selected':'') : '' }}>Inactivo</option>
            
        </select>
        
        @error('estado')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
 </div>


                           
    
              