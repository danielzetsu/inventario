<?php

namespace App\Http\Controllers\Ventas;

use App\Http\Controllers\Controller;
use App\Models\Productos;
use App\Models\VentasProductos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 


class VentasController extends Controller
{
    
    public function index()
    {
        $hasta   = Carbon::createFromDate(date("Y"),date("m"),date("d"));
        $hasta   = $hasta->endOfMonth()->format('d/m/Y');//->addMonth()
        $desde   = Carbon::createFromDate(date("Y"),date("m"),date("d"));
        $desde   = $desde->startOfMonth()->format('d/m/Y');

        $ventas = VentasProductos::join("public.productos","ventas_productos.productos_id","=","productos.id")
            ->select("ventas_productos.id","ventas_productos.productos_id","productos.referencia","ventas_productos.cantidad","productos.categoria","ventas_productos.created_at")
            ->get();
        //dd($ventas);
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $articulos = Productos::get();
        return view('ventas.create',compact('articulos'));
    }

    public function change($id ,Request $request) {


            $contenedor = Productos::find($id);
            //dd($contenedor);
        echo "<script> jQuery('#cantidad').val(\"$contenedor->stock\");  </script>\n"; 
        echo "<script> jQuery('#precio').val(\"$contenedor->precio\");  </script>\n";
        
       //return $factura;
    }

    public function store(Request $request)
    {

        $msg = array();
        $messages = [ 

            'productos_id.required'         =>  'el Campo articulos ...es Obligatorio',
            'Cantidad.required'         =>  'el Campo cantidad ...es Obligatorio',


            ];
            //'identificacion' => 'required|unique:medida|max:20',
            $validator = Validator::make($request->all(), [  
                    'productos_id'    =>'required',
                    'cantidad'    =>'required'

            ],$messages);

            if ($validator->fails()) { 
                $failed = $validator->failed();
                //dd($failed);
                $msg[] = "Error Valide los datos ingresados";
                //dd($validator); 
                
                //return redirect()->route('ventas.store')
                return view('ventas.store')
                            ->withErrors($validator)
                            ->with("msg",$msg)
                            ->with("guardar",false)
                            ->with("failed",$failed);
            }

            $producto = Productos::where("id",$request->productos_id)->first();

            if ($request->cantidad>$producto->stock) {
                $msg[] = "La cantidad supera el stock";

                return view('ventas.store')
                            ->with("msg",$msg)
                            ->with("guardar",false);

            }
            
            

            $content = new VentasProductos;
            //dd($content);
            $content->productos_id = $request->productos_id;
            $content->cantidad = $request->cantidad;
            //dd($content);
            if ($content->save()==false) {
                $msg[] = "Error Valide Al guardar los datos ingresados";

                return view('ventas.store')
                            ->with("msg",$msg)
                            ->with("guardar",false);
            }

            $producto = Productos::find($content->productos_id);
            $resultado =  ($producto->stock-$content->cantidad);
            $producto->stock = $resultado;
            //dd($producto);
            $producto->save();
                $msg[] = "creada correctamente";

                return view('ventas.store')
                            ->with("msg",$msg)
                            ->with("guardar",true);

        
        //VentasProductos::create($request->all());

        return redirect()->route('ventas.index')->with('guardar', 'Categoría creada correctamente.');
    }

    public function edit($id)
    {
        $articulos = Productos::get();
        $ventas = VentasProductos::find($id); 
        return view('ventas.edit', compact('ventas','articulos' ,'id'));
    }

    public function update(Request $request, $id)
    {
        $msg = array();
        $messages = [ 

            'productos_id.required'         =>  'el Campo articulos ...es Obligatorio',
            'Cantidad.required'         =>  'el Campo cantidad ...es Obligatorio',


            ];
            //'identificacion' => 'required|unique:medida|max:20',
            $validator = Validator::make($request->all(), [  
                    'productos_id'    =>'required',
                    'cantidad'    =>'required'

            ],$messages);

            if ($validator->fails()) { 
                $failed = $validator->failed();
                //dd($failed);
                $msg[] = "Error Valide los datos ingresados";
                //dd($validator); 
                
                //return redirect()->route('ventas.store')
                return view('ventas.store')
                            ->withErrors($validator)
                            ->with("msg",$msg)
                            ->with("guardar",false)
                            ->with("failed",$failed);
            }

            $producto = Productos::where("id",$request->productos_id)->first();
            //dd($request->cantidad>$producto->stock);
            if ($request->cantidad>$producto->stock) {
                $msg[] = "La cantidad supera el stock";

                return view('ventas.store')
                            ->with("msg",$msg)
                            ->with("guardar",false);

            }
            

            $content = VentasProductos::find($id);
            //dd($content);
            $content->productos_id = $request->productos_id;
            $content->cantidad = $request->cantidad;
            //dd($content);
            if ($content->save()==false) {
                $msg[] = "Error Valide Al guardar los datos ingresados";

                return view('ventas.store')
                            ->with("msg",$msg)
                            ->with("guardar",false);
            }

            $producto = Productos::find($content->productos_id);
            $resultado =  ($producto->stock-$content->cantidad);
            $producto->stock = $resultado;
            //dd($producto);
            $producto->save();

                $msg[] = "creada correctamente";

                return view('ventas.store')
                            ->with("msg",$msg)
                            ->with("guardar",true);

        return redirect()->route('ventas.index')->with('guardar', 'Categoría creada correctamente.');
    }

    public function destroy($id)
    {
        $val = VentasProductos::join("public.productos","ventas_productos.productos_id","=","productos.id")->where("productos.id",$id)->first();
        //dd($val=="");
        if ($val=="") {
            $data = VentasProductos::find($id);
            //dd($data);
            $data->delete();
        }

        return redirect()->route('ventas.index')->with('success', 'Categoría eliminada correctamente.');
    }


}
