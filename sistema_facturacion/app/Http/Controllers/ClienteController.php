<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ClienteController extends Controller
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
        #$data['clientes']=Cliente::all();
        $clientes=DB::table('clientes')
                    ->select('id_cliente','nombres','apellidos','numero_cedula','direccion','telefono','correo')
                    ->where('apellidos', 'LIKE','%'.$texto.'%' )
                    ->orWhere('numero_cedula', 'LIKE','%'.$texto.'%')
                    ->orderBy('id_cliente', 'asc')
                    ->paginate(5);

        return view('cliente.index', compact('clientes', 'texto'));
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

        return view('cliente.create');
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
            'numero_cedula' => 'required|digits:10',
            'direccion' => 'required',
            'telefono' => 'numeric',
            'correo' => 'email',
        ]);
        $cliente = new Cliente;
        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->numero_cedula = $request->numero_cedula;
        $cliente->direccion = $request->direccion;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;

        $cliente->save();

        return redirect('/clientes/crear')->with('success', 'El cliente se ha creado correctamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id_cliente)
    {
        if (!Gate::allows('is-admin')) {
            return redirect('/')->with('error', '¡Usuario no autorizado!');
        }

        $cliente=Cliente::where('id_cliente','=',$id_cliente)->firstOrFail();
        return view('cliente.edit', ['cliente' => $cliente]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_cliente)
    {
        //
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'numero_cedula' => 'required|digits:10',
            'direccion' => 'required',
            'telefono' => 'numeric',
            'correo' => 'email',
        ]);
        
        $dataCliente = request()->except(['_token', '_method']); 
        $cliente= Cliente::findOrFail($id_cliente);
                
        Cliente::where('id_cliente', '=', $id_cliente)->update($dataCliente);
        
        return redirect()->back()->with('success','El objeto fue editado correctamente.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_cliente)
    {
        //
        $cliente = Cliente::findOrFail($id_cliente);
        if($cliente->delete()){

            return redirect('clientes/listar/')->with('success', 'Se ha borrado el objeto');
        }else{    
                        
            return redirect('clientes/listar/')->with('error', 'No se ha borrado el objeto');
        }
    }
       
    public function getByDNI($dni){
        $cliente = Cliente::where('numero_cedula', '=', $dni)->firstOrFail();
        return response()->json($cliente, 200);
    }
    
}

