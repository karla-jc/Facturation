<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Especialidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class MedicoController extends Controller
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
        $especialidades = Especialidad::select(['id_especialidad','nombre','descripcion','estado'])->get();
        $medicos=DB::table('medicos')
                    ->select('id_medico','nombres','apellidos','especialidad_id','observacion')
                    ->where('apellidos', 'LIKE','%'.$texto.'%')
                    ->orWhere('nombres', 'LIKE','%'.$texto.'%')
                    ->orderBy('id_medico', 'asc')
                    ->paginate(5);

        return view('medico.index', compact('medicos', 'texto', 'especialidades'));

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

        $especialidades = Especialidad::select(['id_especialidad','nombre','descripcion','estado'])->get();
        return view('medico.create', ['especialidades' =>$especialidades]);
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
            'nombres' => 'required',
            'apellidos' => 'required',
            'observacion' => 'required',
            'especialidad_id' => 'required',
        ]);
        $medico = new Medico;
        $medico->nombres = $request->nombres;
        $medico->apellidos = $request->apellidos;
        $medico->observacion = $request->observacion;
        $medico->especialidad_id = $request->especialidad_id;

        $medico->save();
        return redirect('/medico/crear')->with('success', 'El médico se ha creado correctamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function show(Medico $medico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function edit($id_medico)
    {
        //
        if (!Gate::allows('is-admin')) {
            return redirect('/')->with('error', '¡Usuario no autorizado!');
        }
        
        $medico=Medico::where('id_medico','=',$id_medico)->firstOrFail();
        $especialidades = Especialidad::select(['id_especialidad','nombre','descripcion','estado'])->get();
        return view('medico.edit', ['medico' => $medico, 'especialidades'=>$especialidades]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_medico)
    {
        //

        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'observacion' => 'required',
            'especialidad_id' => 'required',
        ]);
        
        $dataMedico = request()->except(['_token', '_method']); 
        $medico= Medico::findOrFail($id_medico);
                
        Medico::where('id_medico', '=', $id_medico)->update($dataMedico);
        
        return redirect()->back()->with('success','El objeto fue editado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_medico)
    {
        //
        $medico = Medico::findOrFail($id_medico);
        if($medico->delete()){
            return redirect('medico/listar/')->with('success', 'Se ha borrado el objeto');
        }else{                
                return redirect('medico/listar/')->with('error', 'No se ha borrado el objeto');
        }
    }


    public function getByAll(){
       // $especialidad = Medico::with(['especialidad'])->get();
        $medico = Medico::select(['id_medico','nombres','apellidos','observacion','especialidad_id'])->get();
        
        return response()->json($medico, 200);
    }


    public function getByNombre($id_medico){
        $medico = Medico::where('id_medico', '=', $id_medico)->firstOrFail();
        $medico->load('especialidad');
        return response()->json($medico, 200);
    }
}
