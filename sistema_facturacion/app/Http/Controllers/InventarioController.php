<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
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
        #$data['clientes']=Cliente::all();
        $inventarios=DB::table('inventarios')
                    ->select('id_inventario','nombre','descripcion','cantidad','fecha_ingreso','fecha_revision','observacion')
                    ->where('nombre', 'LIKE','%'.$texto.'%' )
                    ->orWhere('fecha_ingreso', 'LIKE','%'.$texto.'%')
                    ->orderBy('id_inventario', 'asc')
                    ->paginate(5);

        return view('inventario.index', compact('inventarios', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('inventario.create');
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
            'cantidad' => 'required|numeric',
            'fecha_ingreso' => 'date',
            'fecha_revision' => 'date',
            'observacion' => 'required',
        ]);
        $inventario = new Inventario;
        $inventario->nombre = $request->nombre;
        $inventario->descripcion = $request->descripcion;
        $inventario->cantidad = $request->cantidad;
        $inventario->fecha_ingreso = $request->fecha_ingreso;
        $inventario->fecha_revision = $request->fecha_revision;
        $inventario->observacion = $request->observacion;

        $inventario->save();

        return redirect('/inventario/crear')->with('success', 'El objeto se ha creado correctamente.');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $inventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function edit($id_inventario)
    {
        //
        $inventario=Inventario::where('id_inventario','=',$id_inventario)->firstOrFail();
        return view('inventario.edit', ['inventario' => $inventario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_inventario)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'cantidad' => 'required|numeric',
            'fecha_ingreso' => 'date',
            'fecha_revision' => 'date',
            'observacion' => 'required',
        ]);

        $dataInventario = request()->except(['_token', '_method']); 
        $inventario= Inventario::findOrFail($id_inventario);
                
        Inventario::where('id_inventario', '=', $id_inventario)->update($dataInventario);
        
        return redirect()->back()->with('success','El objeto fue editado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_inventario)
    {
        //
        $inventario = Inventario::findOrFail($id_inventario);
        if($inventario->delete()){

            return redirect('inventario/listar/')->with('success', 'Se ha borrado el objeto');
        }else{    
                        
            return redirect('inventario/listar/')->with('error', 'No se ha borrado el objeto');
        }

    }
}
