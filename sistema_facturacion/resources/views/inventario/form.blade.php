<div class="form-floating mb-3">
    <label for="firstname_input">Nombre:</label>
    <input 
        type="text" 
        name="nombre" 
        class="form-control @error('nombre') is-invalid @enderror" 
        id="nombre_input"
        placeholder="Nombre"
        value="{{ isset($inventario->nombre)?$inventario->nombres:old('nombre') }}"
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
        placeholder="Escriba una descripción..."
        value="{{ isset($inventario->descripcion)?$inventario->descripcion:old('descripcion') }}"
    >
    
    @error('descripcion')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-floating mb-3">
    <label for="firstname_input">Cantidad:</label>
    <input 
        type="text" 
        name="cantidad" 
        class="form-control @error('cantidad') is-invalid @enderror" 
        id="cantidad_input"
        placeholder="Cantidad"
        value="{{ isset($inventario->cantidad)?$inventario->cantidad:old('cantidad') }}"
    >
    
    @error('cantidad')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-floating mb-3">
    <label for="firstname_input">Fecha de Ingreso:</label>
    <input 
        type="date" 
        name="fecha_ingreso" 
        class="form-control @error('fecha_ingreso') is-invalid @enderror" 
        id="fecha_ingreso_input"
        value="{{ isset($inventario->fecha_ingreso)?$inventario->fecha_ingreso:old('fecha_ingreso') }}"
    >
    
    @error('fecha_ingreso')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-floating mb-3">
    <label for="firstname_input">Fecha de la última revisión:</label>
    <input 
        type="date" 
        name="fecha_revision" 
        class="form-control @error('fecha_revision') is-invalid @enderror" 
        id="fecha_revision_input"
        value="{{ isset($inventario->fecha_revision)?$inventario->fecha_revision:old('fecha_revision') }}"
    >
    
    @error('fecha_revision')
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
        id="telefono_input"
        placeholder="Observación"
        value="{{ isset($inventario->observacion)?$inventario->observacion:old('observacion') }}"
    >
    
    @error('observacion')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>



                       

          