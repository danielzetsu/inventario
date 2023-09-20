<?php

namespace App\Http\Controllers\Articulos;

use App\Http\Controllers\Controller;
use App\Models\productos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 


class ArticulosController extends Controller
{ 
 
    public function index()
    {
        $hasta   = Carbon::createFromDate(date("Y"),date("m"),date("d"));
        $hasta   = $hasta->endOfMonth()->format('d/m/Y');//->addMonth()
        $desde   = Carbon::createFromDate(date("Y"),date("m"),date("d"));
        $desde   = $desde->startOfMonth()->format('d/m/Y');

        $articulos = Productos::get();
        //dd($articulos);
        return view('articulos.index', compact('articulos'));
    }

    public function create()
    {
        return view('articulos.create');
    }

    public function store(Request $request)
    {
        $msg = array();
        $messages = [ 

            'nombre.required'         =>  'el Campo nombre ...es Obligatorio',
            'referencia.required'         =>  'el Campo referencia ...es Obligatorio',
            'precio.required'         =>  'el Campo precio ...es Obligatorio',
            'peso.required'         =>  'el Campo peso ...es Obligatorio',
            'categoria.required'         =>  'el Campo categoría ...es Obligatorio',
            'stock.required'         =>  'el Campo stock ...es Obligatorio',
            'fecha.required'         =>  'el Campo fecha ...es Obligatorio' 


            ];
            //'identificacion' => 'required|unique:medida|max:20',
            $validator = Validator::make($request->all(), [  
                    'nombre'    =>'required',
                    'referencia'    =>'required',
                    'precio'    =>'required',
                    'peso'  =>'required',
                    'categoria'     =>'required',
                    'stock'     =>'required',
                    'fecha'     =>'required' 

            ],$messages);

            if ($validator->fails()) { 
                $failed = $validator->failed();
                //dd($failed);
                $msg[] = "Error Valide los datos ingresados";
                //dd($validator);

                //$this->validate($request,[]);
                
                //return redirect()->route('articulos.store')
                return view('articulos.store')
                            ->withErrors($validator)
                            ->with("msg",$msg)
                            ->with("guardar",false)
                            ->with("failed",$failed);
            }

            $content = new Productos;
            $content->nombre = $request->nombre;
            $content->referencia = $request->referencia;
            $content->precio = $request->precio;
            $content->peso = $request->peso;
            $content->categoria = $request->categoria;
            $content->stock = $request->stock;
            $content->fecha = $request->fecha;
            //dd($content);
            if ($content->save()==false) {
                $msg[] = "Error Valide Al guardar los datos ingresados";

                return view('articulos.store')
                            ->with("msg",$msg)
                            ->with("guardar",false);
            }
                /*$msg[] = "los datos ingresados sean guardado";
                //dd($validator);
                return view('articulos')
                            ->with("msg",$msg)
                            ->with("guardar",true);*/
        
        //Productos::create($request->all());

        return redirect()->route('articulos.index')->with('guardar', 'Categoría creada correctamente.');
    }

    public function edit($id)
    {
        $productos = Productos::find($id);
        return view('articulos.edit', compact('productos'));
    }

    public function update(Request $request, $id)
    {
        $msg = array();
        $messages = [ 

            'nombre.required'         =>  'el Campo nombre ...es Obligatorio',
            'referencia.required'         =>  'el Campo referencia ...es Obligatorio',
            'precio.required'         =>  'el Campo precio ...es Obligatorio',
            'peso.required'         =>  'el Campo peso ...es Obligatorio',
            'categoria.required'         =>  'el Campo categoría ...es Obligatorio',
            'stock.required'         =>  'el Campo stock ...es Obligatorio',
            'fecha.required'         =>  'el Campo fecha ...es Obligatorio' 


            ];
            //'identificacion' => 'required|unique:medida|max:20',
            $validator = Validator::make($request->all(), [  
                    'nombre'    =>'required',
                    'referencia'    =>'required',
                    'precio'    =>'required',
                    'peso'  =>'required',
                    'categoria'     =>'required',
                    'stock'     =>'required',
                    'fecha'     =>'required' 

            ],$messages);

            if ($validator->fails()) { 
                $failed = $validator->failed();
                //dd($failed);
                $msg[] = "Error Valide los datos ingresados";
                //dd($validator);

                //$this->validate($request,[]);
                
                //return redirect()->route('articulos.store')
                return view('articulos.store')
                            ->withErrors($validator)
                            ->with("msg",$msg)
                            ->with("guardar",false)
                            ->with("failed",$failed);
            }

            $content = Productos::find($id);
            //dd($content);
            $content->nombre = $request->nombre;
            $content->referencia = $request->referencia;
            $content->precio = $request->precio;
            $content->peso = $request->peso;
            $content->categoria = $request->categoria;
            $content->stock = $request->stock;
            $content->fecha = $request->fecha;
            //dd($content);
            if ($content->save()==false) {
                $msg[] = "Error Valide Al guardar los datos ingresados";

                return view('articulos.store')
                            ->with("msg",$msg)
                            ->with("guardar",false);
            }
                /*$msg[] = "los datos ingresados sean guardado";
                //dd($validator);
                return view('articulos')
                            ->with("msg",$msg)
                            ->with("guardar",true);*/
        
        //Productos::create($request->all());

        return redirect()->route('articulos.index')->with('guardar', 'Categoría creada correctamente.');
    }

    public function destroy($id)
    {
        $val = Productos::join("public.ventas_productos","ventas_productos.productos_id","=","productos.id")->where("productos.id",$id)->first();
        //dd($val=="");
        if ($val=="") {
            $data = Productos::find($id);
            //dd($data);
            $data->delete();
        }

        return redirect()->route('articulos.index')->with('success', 'Categoría eliminada correctamente.');
    }

}
