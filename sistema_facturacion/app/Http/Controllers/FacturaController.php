<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Cliente;
use App\Models\Medico;
use App\Models\Detalle;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use PdfReport;

use Illuminate\Database\Eloquent\Builder;

class FacturaController extends Controller
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
        $clientes = Cliente::select(['id_cliente','nombres','apellidos','numero_cedula','direccion','telefono','correo'])->get();
        $medicos = Medico::select(['id_medico','nombres','observacion','especialidad_id'])->get();
        $accounts = Account::select(['id_account','name'])->get();
        
        $facturas=DB::table('facturas')
                    ->select('id_factura','forma_pago','observacion','fecha','cliente_id','medico_id', 'anulado', 'account_id')
                    ->where('fecha', 'LIKE','%'.$texto.'%')
                    ->orderBy('id_factura', 'asc')
                    ->paginate(5);

        return view('factura.index', compact('facturas', 'texto', 'clientes','accounts'));
        
      

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        //
        $texto=trim($request->get('texto'));
        $clientes = Cliente::select(['id_cliente','nombres','apellidos','numero_cedula','direccion','telefono','correo'])->get();
        $medicos = Medico::select(['id_medico','nombres','observacion','especialidad_id'])->get();
        $accounts = Account::select(['id_account','name'])->get();
        
        $facturas=DB::table('facturas')
                    ->select('id_factura','forma_pago','observacion','fecha','cliente_id','medico_id', 'anulado', 'account_id')
                    ->where('fecha', 'LIKE','%'.$texto.'%')
                    ->orderBy('id_factura', 'desc')
                    ->paginate(5);

        return view('factura.imprimir.lista', compact('facturas', 'texto', 'clientes', 'accounts'));
    }

    public function verFactura($id_factura)
    {
        //
        $factura= Factura::where('id_factura','=',$id_factura)->firstOrFail();
        $clientes = Cliente::select(['id_cliente','nombres','apellidos','numero_cedula','direccion','telefono','correo'])->get();
        $medicos = Medico::select(['id_medico','nombres','observacion','especialidad_id'])->get();
        
        
        
        return view('factura.imprimir.formato', ['factura' =>$factura, 'clientes' =>$clientes, 'medicos' =>$medicos]);
        
    
 
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $clientes = Cliente::select(['id_cliente','nombres','apellidos','numero_cedula','direccion','telefono','correo'])->get();
        $medicos = Medico::select(['id_medico','nombres','observacion','especialidad_id'])->get();
        
        
        return view('factura.principal', ['clientes' =>$clientes, 'medicos' =>$medicos]);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        if(!$request->cliente_id){
            $request->validate([
                'nombresC' => 'required',
                'apellidosC' => 'required',
                'numero_cedula' => 'required|digits:10',
                'direccion' => 'required',
                'telefono' => 'numeric',
                'correo' => 'email',
            ]);
            $cliente = new Cliente;
            $cliente->nombres = $request->nombresC;
            $cliente->apellidos = $request->apellidosC;
            $cliente->numero_cedula = $request->numero_cedula;
            $cliente->direccion = $request->direccion;
            $cliente->telefono = $request->telefono;
            $cliente->correo = $request->correo;
            
            $cliente->save();
        }

    
        $request->validate([
            'forma_pago' => 'required',
            'observacion' => 'required',
            'totalFactura' => 'numeric',
            'fecha' => 'date',
        ]);
        $factura = new Factura;
        $factura->forma_pago = $request->forma_pago;
        $factura->observacion = $request->observacion;
        $factura->totalFactura = $request->totalFactura;
        $factura->subtotal = $request->subtotal;
        $factura->descuento_Total = $request->descuento_Total;
        $factura->fecha = $request->fecha;
        $factura->anulado = false;
        $factura->cliente_id = $request->cliente_id ? $request->cliente_id : $cliente->id_cliente;
        $factura->medico_id = $request->medico_id;
        $factura->account_id = $request->account_id;

        $factura->save();



        //Detalle de Factura
        foreach($request->servicio_id as $key => $value){
            $detalle = new Detalle;
            $detalle->descripcion = $request->descripcion[$key];
            $detalle->cantidad = $request->cantidad[$key];
            $detalle->descuento_unitario = str_replace("$","",$request->descuento_unitario[$key]);
            $detalle->precio_unitario = str_replace("$","",$request->precio_unitario[$key]);
            $detalle->total = floatval(str_replace("$","",$request->precio_unitario[$key]))*intval($request->cantidad[$key]);
            $detalle->factura_id = $factura->id_factura;
            $detalle->servicio_id = $request->servicio_id[$key];
            $detalle->save();

        }
        
       

        return redirect('/factura/crear')->with('success', 'La factura se ha creado correctamente.');

    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit($id_factura)
    {
        //
      

        $factura= Factura::where('id_factura','=',$id_factura)->firstOrFail();
        $clientes = Cliente::select(['id_cliente','nombres','apellidos','numero_cedula','direccion','telefono','correo'])->get();
        $medicos = Medico::select(['id_medico','nombres','observacion','especialidad_id'])->get();
        
        
        return view('factura.anular', ['factura' =>$factura, 'clientes' =>$clientes, 'medicos' =>$medicos]);
        
    
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_factura)
    {

        $dataFactura = request()->except(['_token', '_method']); 
        $factura= Factura::findOrFail($id_factura);
                
        Factura::where('id_factura', '=', $id_factura)->update($dataFactura);
        
        return redirect('/factura/listar')->with('success','El objeto cambio de estado.');

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factura $factura)
    {
        //
    }

    public function getId($numero){
        $factura = Factura::where('id_factura', '=', $numero)->firstOrFail();
        $factura->load('clientes');
        $factura->load('medicos');
        $factura->load('detalle');
        return response()->json($factura, 200);
    }


    public function displayReport(Request $request){
        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        $sortBy = 'id_factura';
        $filterBy = $request->filter_by;
        $value = $request->value;
        
        
        

        $title = 'Reporte de Ingresos'; 

        $meta = [ 
            'Desde' => $fromDate . ' a ' . $toDate,
            'Filtro por' => $filterBy
        ];
        

        $queryBuilder = Factura::select(['id_factura','forma_pago', 'fecha','cliente_id', 'medico_id', 'anulado', 'totalFactura','clientes.nombres AS cliente_nombres','clientes.apellidos AS cliente_apellidos','medicos.nombres AS medico_nombres','medicos.apellidos AS medico_apellidos','accounts.name AS account_name','especialidads.nombre AS especialidad_nombre'])//->with(['medicos','medicos.especialidad', 'clientes']) 
                        ->join('clientes', 'cliente_id', '=', 'clientes.id_cliente')
                        ->join('medicos', 'medico_id', '=', 'medicos.id_medico')
                        ->join('accounts', 'account_id', '=', 'accounts.id_account')
                        ->join('especialidads', 'medicos.especialidad_id', '=', 'especialidads.id_especialidad')
                        ->whereBetween('fecha', [$fromDate, $toDate]);

        

    

    
        if($filterBy === 'medico'){
            $queryBuilder->where('medico_id','=',$value);
         
          
        }

        if($filterBy === 'especialidad'){
            $queryBuilder->whereHas('medicos', function(Builder $query) use($value){
                $query->where('especialidad_id','=',$value);
            });
           
          
           
        }

        $columns = [ 
            'Nombre Médico' => function($result) { 
                return $result->medico_nombres.' '.$result->medico_apellidos;
            },
            'Especialidad' => 'especialidad_nombre',
            'Fecha'=> 'fecha', 
            'Cliente' =>function($result) { 
                return $result->cliente_nombres.' '.$result->cliente_apellidos;
            },
            'Nombre Facturador/a' => function($result) { 
                return $result->account_name;
            },
            'Estado' => function($result) { 
                return $result->anulado ? 'Anulada':'Activa';
            },
            'Total' => function($result) { 
                return $result->anulado ? number_format(0,2):$result->totalFactura;
            },

            
        ];

       
    

        $queryBuilder->orderBy($sortBy);
        return PdfReport::of($title, $meta, $queryBuilder, $columns)
                    ->editColumn('Fecha', [ 
                        
                        'class' => 'left'
                    ])
                    ->editColumns(['Total'], [ 
                        'class' => 'right bold'
                    ])
                    ->showTotal([ 
                        'Total' => 'point' 
                    ])
                    ->limit(20) 
                    ->stream(); 
    
                
        //return $queryBuilder->get();

    }


    public function viewReport(Request $request){
        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        $sortBy = 'id_factura';
        $filterBy = $request->filter_by;
        $value = $request->value;
        

        $title = 'Reporte de Ingresos'; // Report title

        $meta = [ // For displaying filters description on header
            'Registered on' => $fromDate . ' To ' . $toDate,
            'Sort By' => $sortBy
        ];

        $queryBuilder = Factura::select(['id_factura','forma_pago', 'observacion', 'fecha','cliente_id', 'medico_id', 'anulado', 'totalFactura'])->with(['medicos','medicos.especialidad', 'clientes']) // Do some querying..
                        ->whereBetween('fecha', [$fromDate, $toDate]);

        if($filterBy === 'medico'){
            $queryBuilder->where('medico_id','=',$value);
        }

        if($filterBy === 'especialidad'){
            $queryBuilder->whereHas('medicos', function(Builder $query) use($value){
                $query->where('especialidad_id','=',$value);
            });
        }

    

        $queryBuilder->orderBy($sortBy);
                
        return $queryBuilder->get();
        

    }
}
