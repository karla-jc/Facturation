<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $texto=trim($request->get('texto'));
        
        $servicios=DB::table('servicios')
                    ->select('id_servicio','nombre','descripcion','valor','estado','iva')
                    ->where('nombre', 'LIKE','%'.$texto.'%')
                    ->orderBy('id_servicio', 'asc')
                    ->paginate(5);

        return view('servicio.index', compact('servicios', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('servicio.create');
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
            'valor' => 'numeric',
            'estado' => 'required',
            'iva' => 'required',
        ]);
        $servicio = new Servicio;
        $servicio->nombre = $request->nombre;
        $servicio->descripcion = $request->descripcion;
        $servicio->valor = $request->valor;
        $servicio->estado = $request->estado;
        $servicio->iva= $request->iva;
        
       $servicio->save();

       return redirect('/servicio/crear')->with('success', 'El objeto se ha creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit($id_servicio)
    {
        //
        $servicio=Servicio::where('id_servicio','=',$id_servicio)->firstOrFail();
        return view('servicio.edit', ['servicio' => $servicio]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_servicio)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'valor' => 'numeric',
            'estado' => 'required',
            'iva' => 'required',
        ]);
        $dataServicio = request()->except(['_token', '_method']); 
        $servicio= Servicio::findOrFail($id_servicio);
                
        Servicio::where('id_servicio', '=', $id_servicio)->update($dataServicio);
        
        return redirect()->back()->with('success','El objeto fue editado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_servicio)
    {
        //
        $servicio = Servicio::findOrFail($id_servicio);
        if($servicio->delete()){
            return redirect('servicio/listar/')->with('success', 'Se ha borrado el objeto');
        }else{                
                return redirect('servicio/listar/')->with('error', 'No se ha borrado el objeto');
        }
    }


    public function getByAllServices(){
        $servicio = Servicio::select(['id_servicio','nombre','descripcion','valor','estado','iva'])->get();
        
        return response()->json($servicio, 200);
    }


    public function getByNombreService($id_servicio){
        $servicio = Servicio::where('id_servicio', '=', $id_servicio)->firstOrFail();
        return response()->json($servicio, 200);
    }
}
