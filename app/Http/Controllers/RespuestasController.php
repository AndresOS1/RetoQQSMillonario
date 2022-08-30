<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Respuestas;
use App\Models\Preguntas;


class RespuestasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuestas = Respuestas::all();
        $preguntas = Preguntas::all();
        return view('Respuestas.index', compact('respuestas','preguntas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $preguntas = Preguntas::all();
        $respuestas = Respuestas::all();

        return view('Admin.preguntas.createRespuesta',compact('preguntas','respuestas'));
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
            'respuesta'     =>  'required',
            'resultado'     =>  'required',
            'pregunta_id'   =>  'required'
        ]);


        if(!$validator->fails()){

            $respuesta = new Respuestas;
            $respuesta->respuesta       = $request->respuesta;
            $respuesta->resultado       = $request->resultado;
            $respuesta->pregunta_id     = $request->pregunta_id;
            $respuesta->save();
            if($respuesta){
                Alert::success('Respuesta Registrada con Exito');
                return redirect()->route('Respuestas.create');
            }else{
                Alert::error('Error');
                return redirect()->route('Respuestas.create');
            }
        }else{
            Alert::error('Falta un campo');
            return redirect()->route('Respuestas.create');
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
        $respuesta = Respuestas::find($id);
        $preguntas = Respuestas::all();
        return view('Respuestas.edit', compact('respuesta', 'preguntas'));  
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

            'respuesta'     =>  'required',
            'resultado'     =>  'required',
            'pregunta_id'   =>  'required'
        ]);


        if(!$validator->fails()){

            $respuesta = Respuestas::find($id);
            $respuesta->respuesta       = $request->respuesta;
            $respuesta->resultado       = $request->resultado;
            $respuesta->pregunta_id     = $request->pregunta_id;
            $respuesta->save();
            if($respuesta){
                Alert::success('Respuesta Actualiza Correctamente');
                return redirect()->route('Respuestas.index');
            }else{
                Alert::error('Error');
                return redirect()->route('Respuestas.create');
            }
        }else{
            Alert::error('Falta un campo');
            return redirect()->route('Respuestas.create');
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
        $respuesta = Respuestas::findOrFail($id);
        $respuesta->delete();
        Alert::warning('Respuesta Eliminada Correctamente');
        return redirect()->route('Respuestas.index');
    }
}
