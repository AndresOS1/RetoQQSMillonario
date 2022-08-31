<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Niveles;
use App\Models\Categorias;
use Paginator;


class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda=$request->buscar;
        $categorias=Categorias::where('nombreCategoria','LIKE','%'.$busqueda.'%')
        ->paginate(7);
        // $categorias = Categorias::all();
        $niveles  = Niveles::all();
    
        return view('Admin.Categoria.index', compact('categorias','niveles','busqueda'));
    }
    public function playCategoria(){       
        $categorias=Categorias::select('nombreCategoria')
                        ->join('niveles','niveles.id_niveles','=','categorias.niveles_id')
                        ->where('niveles.nivel','=',1)->get();

        return view('categorias.cuestion',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveles = Niveles::all();

        return view('Admin.Categoria.create', compact('niveles'));
    }


    public function byLevel($id){


        return Categorias::where('niveles_id', $id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[

            'nombreCategoria'=>'required',
            'niveles_id'=>'required',
        ]);

        if(!$validator->fails()){
            $categoria = new Categorias;
            $categoria->nombreCategoria  = $request->nombreCategoria;
            $categoria->niveles_id       = $request->niveles_id;
            $categoria->save();

            if($categoria){
                Alert::success('Categoria Registrada con Exito');
                return redirect()->route('Categorias.index');
            }else{
                Alert::error('Error');
                return redirect()->route('Categorias.create');
            }
        }else{
            Alert::error('Falta un campo');
            return redirect()->route('Categorias.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $niveles = Niveles::all();
        $categorias = Categorias::find($id);
        
        return view('Admin.categoria.edit', compact('niveles', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[

            'nombreCategoria'=>'required',
            'niveles_id'=>'required',
        ]);

        if(!$validator->fails()){            
            $categoria = Categorias::find($id);
            $categoria->nombreCategoria  = $request->nombreCategoria;
            $categoria->niveles_id       = $request->niveles_id;
            $categoria->save();

            if($categoria){
                Alert::success('Categoria Actualizada Correctamente');
                return redirect()->route('Categorias.index');
            }else{
                Alert::error('Error');
                return redirect()->route('Categorias.create');
            }
        }else{
            Alert::error('Falta un campo');
            return redirect()->route('Categorias.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categorias::findOrFail($id);
        $categoria->delete();
        Alert::warning('Categoria Eliminada Correctamente');
        return redirect()->route('Categorias.index');
    }
}
