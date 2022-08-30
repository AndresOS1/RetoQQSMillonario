<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use App\Models\Niveles;
use App\Models\Categorias;
use App\Models\Preguntas;
use App\Models\Respuestas;
use App\Models\Game;


class TheGameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::all();
        // $niveles = Niveles::all();
        // $categorias = Categorias::all();
        // $preguntas = Preguntas::all();
        // $respuestas = Respuestas::all();
        // $games = Game::all();

        // return view('Game.historialdeJuego', compact('users', 'niveles', 'categorias', 'preguntas','respuestas','games'));


        // SELECT * FROM preguntas ORDER BY rand() LIMIT 1;

        $preguntaAleatoria = Preguntas::select('pregunta')->orderByRaw('rand()')->take(1)->get();
        return $preguntaAleatoria;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $users = User::all();
        $niveles = Niveles::all();
        $categorias = Categorias::all();
        $preguntas = Preguntas::all();
        $respuestas = Respuestas::all();

        return view('Game.partida', compact('users', 'niveles', 'categorias', 'preguntas', 'respuestas'));

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
                        'user_id'=>'required',
                        'categoria_id'=>'required',
                        'pregunta_id'=>'required',
                        'respuesta_id'=>'required',
            ]);
            if(!$validation->fails()){

                $game =new Game;

                $game->user_id          = auth()->user()->id;
                $game->categoria_id     = $request->categoria_id;
                $game->pregunta_id      = $request->pregunta_id;
                $game->respuesta_id     = $request->respuesta_id;
                $game->save();
                if($game){
                    Alert::success('Partida Registrada Correctamente');
                    return redirect()->route('Game.index');
                }else{
                    Alert::error('Algo a salido mal');
                    return redirect()->route('Game.create');
                }
            }else{
                Alert::error('Falta un campo');
                return redirect()->route('Game.create');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
