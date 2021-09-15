<input type="hidden" id="medico_id_input" name="medico_id">

<div class="form-floating mb-3">
        <label for="firstname_input">Nombre:</label>
        <select class="input_medico form-control" id="medico_nombre_select" name="nombres" >
            <option value="" disabled selected>Seleccionar Médico</option>

        </select>
        
        @error('nombres')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
 </div>


 <input type="hidden" id="medico_apellido_input" name="apellidos">

 <div class="form-group row mb-3">
        <label for="especialidad_input" class="col-sm-3 col-form-label">Especialidad:</label>
        <div class="col-sm-9">
        <input 
            type="text" 
            name="especialidad" 
            class="input_medico form-control @error('especialidad') is-invalid @enderror" 
            id="medico_especialidad_input"
            placeholder="Especialidad"
            value=""
            disabled
        >
        </div>
        
        @error('especialidad')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
 </div>

