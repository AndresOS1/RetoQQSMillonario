<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Categorias;
use App\Models\Preguntas;
use App\Models\Respuestas;

class PreguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $preguntas = Preguntas::all();
        $categorias = Categorias::all();


        return view('Admin.preguntas.index', compact('preguntas', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $preguntas = Preguntas::all();
        $categorias = Categorias::all();
        return view('Admin.preguntas.createRespuesta',compact('preguntas', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validation=Validator::make($request->all(),[
            
                     'pregunta'=>'required',
                     'categoria_id' => 'required'
         
        ]);


        if(!$validation->fails()){
            $pregunta=new Preguntas;
            $pregunta->pregunta = $request->pregunta;
            $pregunta->categoria_id = $request->categoria_id;
            $pregunta->save();
            if($pregunta){
                Alert::success('Pregunta Registrada con Exito');
                return redirect()->route('Preguntas.create');
            }else{
                Alert::error('Error');
                return redirect()->route('Preguntas.create');
            }
        }else{

            Alert::error('Falta un campo');
            return redirect()->route('Preguntas.create');
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
        $pregunta = Preguntas::find($id);
        $categorias = Categorias::all();
        $respuestas = Respuestas::find($id);
        return view('Preguntas.edit', compact('pregunta', 'categorias', 'respuestas'));
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
        $validation=Validator::make($request->all(),[
            
                     'pregunta'=>'required',
                     'categoria_id' => 'required'


         
        ]);


        if(!$validation->fails()){
            $pregunta=Preguntas::find($id);
            $pregunta->pregunta = $request->pregunta;
            $pregunta->categoria_id = $request->categoria_id;
            $pregunta->save();
            if($pregunta){
                Alert::success('Pregunta Actualizada con Exito');
                return redirect()->route('Preguntas.index');
            }else{
                Alert::error('Error');
                return redirect()->route('Preguntas.index');
            }
        }else{

            Alert::error('Falta un campo');
            return redirect()->route('Preguntas.index');
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
        $pregunta= Preguntas::findOrFail($id);
        $pregunta->delete();
        Alert::warning('Pregunta Elimindada Correctamente');
        return redirect()->route('Preguntas.index');
    }
}
