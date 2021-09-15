<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if (!Gate::allows('is-admin')) {
            return redirect('/')->with('error', '¡Usuario no autorizado!');
        }

        $texto=trim($request->get('texto'));
        
        $especialidades=DB::table('especialidads')
                    ->select('id_especialidad','nombre','descripcion','estado')
                    ->where('nombre', 'LIKE','%'.$texto.'%')
                    ->orderBy('id_especialidad', 'asc')
                    ->paginate(5);

        return view('especialidad.index', compact('especialidades', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (!Gate::allows('is-admin')) {
            return redirect('/')->with('error', '¡Usuario no autorizado!');
        }

        return view('especialidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
        ]);
        $especialidad = new Especialidad;
        $especialidad->nombre = $request->nombre;
        $especialidad->descripcion = $request->descripcion;
        $especialidad->estado = $request->estado;
 

        $especialidad->save();

        return redirect('/especialidad/crear')->with('success', 'El objeto se ha creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function show(Especialidad $especialidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function edit($id_especialidad)
    {
        //
        if (!Gate::allows('is-admin')) {
            return redirect('/')->with('error', '¡Usuario no autorizado!');
        }
     
        $especialidad=Especialidad::where('id_especialidad','=',$id_especialidad)->firstOrFail();
        return view('especialidad.edit', ['especialidad' => $especialidad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_especialidad)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
        ]);
        $dataEspecialidad = request()->except(['_token', '_method']); 
        $especialidad= Especialidad::findOrFail($id_especialidad);
                
        Especialidad::where('id_especialidad', '=', $id_especialidad)->update($dataEspecialidad);
        
        return redirect()->back()->with('success','El objeto fue editado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_especialidad)
    {
        //
        $especialidad = Especialidad::findOrFail($id_especialidad);
        if($especialidad->delete()){
            return redirect('especialidad/listar/')->with('success', 'Se ha borrado el objeto');
        }else{                
                return redirect('especialidad/listar/')->with('error', 'No se ha borrado el objeto');
        }
    }

    public function getEspecialidades(){
        // $especialidad = Medico::with(['especialidad'])->get();
         $especialidad = Especialidad::select(['id_especialidad','nombre','descripcion','estado'])->get();
         
         return response()->json($especialidad, 200);
     }
}
