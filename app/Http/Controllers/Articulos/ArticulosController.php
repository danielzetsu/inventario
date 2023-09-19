<?php

namespace App\Http\Controllers\Articulos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;


use Illuminate\Support\Facades\Validator; 


class ArticulosController extends Controller
{
    public function index()
    {

        $hasta   = Carbon::createFromDate(date("Y"),date("m"),date("d"));
        $hasta   = $hasta->endOfMonth()->format('d/m/Y');//->addMonth()
        $desde   = Carbon::createFromDate(date("Y"),date("m"),date("d"));
        $desde   = $desde->startOfMonth()->format('d/m/Y');


        return view('ventas.index',compact('desde'))
                    ->with("hasta",$hasta);

    }

    public function create(){

        $user               = \Auth::id();
        $usuario            = User::find($user);
        $empresa            = Empresa::get();

        $hasta   = Carbon::createFromDate(date("Y"),date("m"),date("d"));
        $hasta   = $hasta->format('d/m/Y');
        $desde   = Carbon::createFromDate(date("Y"),date("m"),date("d"));
        $desde   = $desde->startOfMonth()->format('d/m/Y');

        return view('ventas.control_promociones.create',compact('usuario'))
                    ->with("desde",$desde)
                    ->with("hasta",$hasta);
    }
 

    public function store(Request $request)
    {

        $msg = array();
        $messages = [ 

            'nombre.required'         =>  'el Campo Promociones ...es Obligatorio',
            'referencia.required'         =>  'el Campo Promociones ...es Obligatorio',
            'precio.required'         =>  'el Campo Promociones ...es Obligatorio',
            'peso.required'         =>  'el Campo Promociones ...es Obligatorio',
            'categoria.required'         =>  'el Campo Promociones ...es Obligatorio',
            'stock.required'         =>  'el Campo Promociones ...es Obligatorio',
            'fecha.required'         =>  'el Campo Promociones ...es Obligatorio',
            'guardar.required'         =>  'el Campo Promociones ...es Obligatorio'


            ];
            //'identificacion' => 'required|unique:medida|max:20',
            $validator = Validator::make($request->all(), [  
                    'nombre'    =>'required',
                    'referencia'    =>'required',
                    'precio'    =>'required',
                    'peso'  =>'required',
                    'categoria'     =>'required',
                    'stock'     =>'required',
                    'fecha'     =>'required',
                    'guardar'   =>'required'


            ],$messages);

            if ($validator->fails()) { 
                $failed = $validator->failed();
                //dd($failed);
                $msg[] = "Error Valide los datos ingresados";
                //dd($validator);
                return redirect('articulos?msg=Error Valide los datos ingresados')
                            ->withErrors($validator)
                            ->with("msg",$msg)
                            ->with("guardar",false)
                            ->with("failed",$failed);
            }
        // --------

            $factura = Articulos::where("factura",$request->factura)->first();

            $Acta= ControlPromociones::where("id_acta",$request->idacta)->first();

            if ($factura != "") {
                $msg[] = "Ya existe una Factura ingresada";

                return view('ventas.control_promociones.store')
                            ->with("msg",$msg)
                            ->with("guardar",false);
            }
            if ($Acta != "") {
                $msg[] = "Ya existe una Acta ingresada";

                return view('ventas.control_promociones.store')
                            ->with("msg",$msg)
                            ->with("guardar",false);
            }   

            $content = new ControlPromociones ();
            $sw = 0;
            $content_temp = ControlPromociones::where("factura",$request->factura)->where("id_acta",$request->idacta)->first();

            //dd($content_temp);
            if (!empty($content_temp)) {
                $content = $content_temp;
                
            }

            $content->promocion_id = $request->promocion_id;
            $content->factura = $request->factura;
            $content->motor = $request->motor;
            $content->chasis = $request->chasis;
            $content->valor = $request->valor;
            $content->codigo_app = $request->codigo;
            $content->id_acta = $request->idacta;
            $content->id_negocio = $request->idn;
            $content->fecha = date('d/m/Y');
            $content->empleados_id = $empleados->id;
            $content->empresa_id = $empresa->id;
            $content->adjunto = 0;
            $content->revisado = 0;


            //dd($content);

            if ($content->save()==false) {
                $msg[] = "Error Valide Al guardar los datos ingresados";

                return view('ventas.control_promociones.store')
                            ->with("msg",$msg)
                            ->with("guardar",false);
            }
                $msg[] = "los datos ingresados sean guardado";
                //dd($validator);
                return view('ventas.control_promociones.store')
                            ->with("msg",$msg)
                            ->with("guardar",true);
    }



    public function detalles(Request $request)
    {
        
        $user               = \Auth::id();
        $usuario            = User::find($user);

        $empleados       = Empleados::find($usuario->empleados_id); 

        $empresa            = Empresa::find($usuario->empresa_id);

        $base_datos          = $empresa->base_datos_padre;


        $msg = array();
        $messages = [ 

            'desde.required'         =>  'el Campo desde ...es Obligatorio',
            'hasta.required'         =>  'el Campo hasta ...es Obligatorio', 

            ];
            //'identificacion' => 'required|unique:medida|max:20',
            $validator = Validator::make($request->all(), [  

                'desde' => 'required',
                'hasta' => 'required', 


            ],$messages);

            if ($validator->fails()) { 
                $failed = $validator->failed();
                //dd($failed);
                $msg[] = "Error Valide los datos ingresados";
                //dd($validator);
                return view('ventas.control_promociones.store')
                            ->withErrors($validator)
                            ->with("msg",$msg)
                            ->with("guardar",false)
                            ->with("failed",$failed);
            }
        // --------


        $promocion_id = $request->promocion_id;
        $factura = $request->factura;
        $codigo = $request->codigo;
        $idacta = $request->idacta;
        $idn = $request->idn;
        $desde = $request->desde;
        $hasta = $request->hasta;
        $vendedores_id = $request->vendedores_id;



        $condicion = "1=1 ";
        $condicion2 = "1=1 ";


        if ($promocion_id != "") {
            $condicion .= " and promocion_id='$promocion_id'";
        }
        if ($factura != "") {
            $condicion .= " and factura='$factura'";
        }
        if ($codigo != "") {
            $condicion .= " and codigo_app='$codigo'";
        }
        if ($idacta != "") {
            $condicion .= " and id_acta='$idacta'";
        }
        if ($idn != "") {
            $condicion .= " and id_negocio='$idn'";
        }
        if ($desde != "") {
            $condicion .= " and ISNULL(f1.fecha,control_promocion.fecha)>='$desde'";
            $condicion2 .= " and ISNULL(f1.fecha,control_promocion.fecha)>='$desde'";
        }
        if ($hasta != "") {
            $condicion .= " and ISNULL(f1.fecha,control_promocion.fecha)<='$hasta'";
            $condicion2 .= " and ISNULL(f1.fecha,control_promocion.fecha)<='$hasta'";
        } 
        if ($vendedores_id != "") {
            $condicion .= " and v.vendedor= '$vendedores_id'";
            $condicion2 .= " and f1.vendedor= '$vendedores_id'";
        } 


        $dtl = ControlPromociones::join(\DB::raw("intranet.dbo.promocion as p with(nolock)"),"p.id","=","control_promocion.promocion_id")
                                    ->leftJoin(\DB::raw($base_datos.".factura1_2000 as f1 with(nolock)"),"control_promocion.factura","=","f1.numero")
                                    ->leftJoin(\DB::raw($base_datos.".clientes  as c with(nolock)"),"c.nit","=","f1.nit") 
                                    ->leftJoin(\DB::raw($base_datos.".factura2_2000  as f2 with(nolock)"),"f1.numero","=","f2.numero") 
                                    ->leftJoin(\DB::raw($base_datos.".vendedor as v with(nolock)"),"v.vendedor","=","f1.vendedor") 
                                    ->select('control_promocion.*')
                                    ->selectRaw("convert(varchar,f1.fecha,103) as fecha_factura 
                                                , f1.nit,  rtrim(c.razon_social) as nombre_cliente 
                                                , SUBSTRING(v.nombre, 0, 15) as nombre_vendedor
                                                , p.nombre as nombre_promocion
                                                , ISNULL(f2.referencia,0) as referencia")
                                    ->whereRaw("ISNULL([f1].[anulado],0) = 0 and ISNULL([f2].[anulado] ,0) = 0") 
                                    
                                    
                                    ->whereRaw($condicion)
                                    ->orderBy("fecha_factura")
                                    ->get();
        $rol = Roles::where("role",$usuario->role_id)->first();


        $sql_count = $dtl->where("adjunto",0)->count();/*ControlPromociones::Join(\DB::raw($base_datos.".factura1_2000 as f1 with(nolock)"),"control_promocion.factura","=","f1.numero")
                                        ->whereraw("ISNULL(adjunto,0)=0 ")
                                        ->whereRaw($condicion2)
                                        ->count();*/
        //dd($sql_count);
        //dd($dtl);

        return view('ventas.control_promociones.detalles',compact('dtl','rol','usuario','sql_count'));
    }

    public function edit($id)
    {

        $user               = \Auth::id();
        $usuario            = User::find($user);

        $contenedor = ControlPromociones::join("promocion","promocion.id","control_promocion.promocion_id")
                                        ->select("control_promocion.*","promocion.observacion")
                                        ->where("control_promocion.id",$id)
                                        ->first();

        $rol = Roles::where("role",$usuario->role_id)->first();

        //dd($contenedor);
        return view('ventas.control_promociones.edit',compact('contenedor','id','rol'));
    }
     
    public function update($id,Request $request)
    {

        $user               = \Auth::id();
        $usuario            = User::find($user);
        $empresa         = Empresa::find($usuario->empresa_id);
        $empleados       = Empleados::find($usuario->empleados_id);



        $msg = array();
        $messages = [ 

            'promocion_id.required'         =>  'el Campo Promociones ...es Obligatorio',
            'factura.required'         =>  'el Campo Factura ...es Obligatorio',
            'motor.required'         =>  'el Campo Motor ...es Obligatorio',
            'chasis.required'         =>  'el Campo Chasis ...es Obligatorio',
            'valor.required'         =>  'el Campo Valor ...es Obligatorio',
            'codigo.required'         =>  'el Campo Codigo ...es Obligatorio',
            'idacta.required'         =>  'el Campo Acta de Entrega ...es Obligatorio',
            'idn.required'         =>  'el Campo Nuemero de Negocio ...es Obligatorio',

            ];
            //'identificacion' => 'required|unique:medida|max:20',
            $validator = Validator::make($request->all(), [  

                'promocion_id' => 'required',
                'factura' => 'required',
                'motor' => 'required',
                'chasis' => 'required',
                'valor' => 'required',
                'codigo' => 'required',
                'idacta' => 'required',
                'idn' => 'required',


            ],$messages);

            if ($validator->fails()) { 
                $failed = $validator->failed();
                //dd($failed);
                $msg[] = "Error Valide los datos ingresados";
                //dd($validator);
                return view('ventas.control_promociones.store')
                            ->withErrors($validator)
                            ->with("msg",$msg)
                            ->with("guardar",false)
                            ->with("failed",$failed);
            }
        // --------
            $nfactura = $request->factura;

            $factura = ControlPromociones::where("factura",$nfactura)->where("id","<>",$id)->first();
            /*$factura = ControlPromociones::where("factura",$nfactura)
                                            ->whereNotExists(function ($query) use ($nfactura, $id)
                                                            {
                                                                $query->select(\DB::raw(1))
                                                                      ->from('control_promocion')
                                                                      ->where("factura",$nfactura)
                                                                      ->where("id",$id);
                                                            })
                                            ->first();*/
            //dd($factura);
            $Acta= ControlPromociones::where("id_acta",$request->idacta)->where("id","<>",$id)->first();

            if ($factura != "") {
                $msg[] = "Ya existe una Factura ingresada";

                return view('ventas.control_promociones.store')
                            ->with("msg",$msg)
                            ->with("guardar",false);
            }
            if ($Acta != "") {
                $msg[] = "Ya existe una Acta ingresada";

                return view('ventas.control_promociones.store')
                            ->with("msg",$msg)
                            ->with("guardar",false);
            }   
 
            $sw = 0;
            $content  = ControlPromociones::find($id);
 

            $content->promocion_id = $request->promocion_id;
            $content->factura = $request->factura;
            $content->motor = $request->motor;
            $content->chasis = $request->chasis;
            $content->valor = $request->valor;
            $content->codigo_app = $request->codigo;
            $content->id_acta = $request->idacta;
            $content->id_negocio = $request->idn;
            //$content->fecha = date('d/m/Y');
            $content->empleados_id = $empleados->id; 
            
            if($content->adjunto==''){
               $content->adjunto = 0;
            }
            if($content->revisado==''){
                $content->revisado = 0;
            }


            //dd($content);

            if ($content->save()==false) {
                $msg[] = "Error Valide Al guardar los datos ingresados";

                return view('ventas.control_promociones.store')
                            ->with("msg",$msg)
                            ->with("guardar",false);
            }
                $msg[] = "los datos ingresados sean guardado";
                //dd($validator);
                return view('ventas.control_promociones.store')
                            ->with("msg",$msg)
                            ->with("guardar",true);
    } 
}
