<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Preguntas;

class PreguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $preguntas::all();

        return view('Preguntas.index', compact('preguntas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $preguntas = Preguntas::all();
        return view('Admin.preguntas.createRespuesta',compact('preguntas'));
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
            
                     'pregunta'=>'required'
         
        ]);


        if(!$validation->fails()){
            $pregunta=new Preguntas;
            $pregunta->pregunta = $request->pregunta;
            $pregunta->save();
            if($pregunta){
                Alert::success('Pregunta Registrada con Exito');
                return redirect()->route('Preguntas.index');
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
        return view('Preguntas.edit', compact('pregunta'));
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
            
                     'pregunta'=>'required'
         
        ]);


        if(!$validation->fails()){
            $pregunta=Preguntas::find($id);
            $pregunta->pregunta = $request->pregunta;
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
        $pregunta= Preguntas::findOrFile($id);
        $pregunta->delete();
        Alert::warning('Pregunta Elimindada Correctamente');
        return redirect()->route('Preguntas.index');
    }
}
