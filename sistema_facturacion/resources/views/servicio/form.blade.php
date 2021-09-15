<div class="form-floating mb-3">
        <label for="firstname_input">Nombre:</label>
        <input 
            type="text" 
            name="nombre" 
            class="form-control text-uppercase @error('nombre') is-invalid @enderror" 
            id="nombre_input"
            placeholder="Nombre"
            value="{{ isset($servicio->nombre)?$servicio->nombre:old('nombre') }}"
            
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
            value="{{ isset($servicio->descripcion)?$servicio->descripcion:old('descripcion') }}"
        >
        
        @error('descripcion')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
 </div>

 

 <div class="form-floating mb-3">
        <label for="firstname_input">Valor:</label>
        <span class="input-group-text">$</span> 
        <input 
            type="number" 
            step="any"
            name="valor" 
            class="form-control @error('valor') is-invalid @enderror" 
            id="descripcion_input"
            placeholder="En dólares (con punto y dos decimales)"
            value="{{ isset($servicio->valor)?$servicio->valor:old('valor') }}"
        >
        
        @error('valor')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
 </div>


 <div class="form-floating mb-3">
        <label for="firstname_input">Paga IVA: </label>
        <select class="form-control" id="iva_select" name="iva" >
            <option value="" disabled >Seleccionar un valor</option>
            <option value="0" {{ isset($servicio->iva ) ? ($servicio->iva === 0 ? 'selected':'') : '' }}>No</option>
            <option value="1" {{ isset($servicio->iva ) ? ($servicio->iva === 1 ? 'selected':'') : '' }}>Si</option>
            
        </select>
        
        @error('iva')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
 </div>


 <div class="form-floating mb-3">
        <label for="firstname_input">Estado</label>
        <select class="form-control" id="estado_select" name="estado" >
            <option value="" disabled >Seleccionar un valor</option>
            <option value="1" {{ isset($servicio->estado ) ? ($servicio->estado === 1 ? 'selected':'') : '' }}>Activo</option>
            <option value="0" {{ isset($servicio->estado ) ? ($servicio->estado === 0 ? 'selected':'') : '' }}>Inactivo</option>
            
        </select>
        
        @error('estado')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
 </div>

