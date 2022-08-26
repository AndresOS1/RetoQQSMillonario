<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Niveles;

class NivelesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $niveles = Niveles::all();
        return view('Niveles.index', compact('niveles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Niveles.create');
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
            'nivel'   =>   'required',
        ]);


        if(!$validator->fails()){
            $nivel = new Niveles;
            $nivel->nivel = $request->nivel;
            $nivel->save();
            if($nivel){
                Alert::success('Nivel Registrado con Exito');
                return redirect()->route('Niveles.index');
            }else{
                Alert::error('Error');
                return redirect()->route('Niveles.create');
            }
        }else{
            Alert::error('Falta un campo');
            return redirect()->route('Niveles.create');
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nivel = Niveles::finde($id);

        return view('Niveles.edit', compact('nivel'));
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
            'nivel'   =>   'required',
        ]);


        if(!$validator->fails()){
            $nivel = Niveles::find($id);
            $nivel->nivel = $request->nivel;
            $nivel->save();
            if($nivel){
                Alert::success('Nivel Actualizado Correctamente');
                return redirect()->route('Niveles.index');
            }else{
                Alert::error('Error');
                return redirect()->route('Niveles.create');
            }
        }else{
            Alert::error('Falta un campo');
            return redirect()->route('Niveles.create');
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
        $nivel = Niveles::findOrFail($id);
        $nivel->delete();
        Alert::warning('Nivel Eliminado Correctamente');
    }
}
