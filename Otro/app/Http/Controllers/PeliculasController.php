<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Peliculas;
use Illuminate\Http\Request;

class PeliculasController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
// METODO PARA VER EL CATALOGO DE PELICULAS
 

    public function index(Request $request)
    { 
      
        $peliculas=Peliculas::all(); 
        return view("peliculas.index", compact("peliculas")); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $pelicula = new Peliculas;
        $title = __("CREAR NUEVA PELICULA");//LAS VARIABLES QUE SE USAN EN projects.form
        $textButton = __("Crear");
        $route = route("peliculas.store");//METODO AL QUE LLAMARA
        return view("peliculas.create", compact("title", "textButton", "route", "pelicula"));//DEVUELVE LA VISTA(create.blade.php)
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) //METODO AL QUE SE LLAMA DESDE create()
    {
        $peliculas = new Peliculas();

        $peliculas->name = $request->get('name');
        $peliculas->director = $request->get('director');
        $peliculas->año = $request->get('año');
        $peliculas->genero = $request->get('genero');
        $peliculas->distribuidora = $request->get('distribuidora');
        $peliculas->sinopsis = $request->get('sinopsis');
        $peliculas->tipo = $request->get('tipo');
        $peliculas->imagen = $request->get('imagen');

        $peliculas->save();
        return redirect(route("peliculas.index"))
            ->with("success", __("¡Peliculas creada!"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peliculas  $pelicula
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Peliculas $pelicula)
    {
        
        $update = true;//POR EL "METHOD(PUT)
        $title = __("EDITAR UNA PELICULA");
        $textButton = __("Actualizar");
        $pelicula = Peliculas::find($pelicula->id);
        $route = route("peliculas.update", ["pelicula" => $pelicula]);
        return view("peliculas.edit",compact("update", "title", "textButton", "route", "pelicula"))->with('pelicula',$pelicula);
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peliculas  $peliculas
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Peliculas $pelicula) 
    {
       $peliculas = Peliculas::find($pelicula->id);

        $peliculas->name = $request->get('name');
        $peliculas->director = $request->get('director');
        $peliculas->año = $request->get('año');
        $peliculas->genero = $request->get('genero');
        $peliculas->distribuidora = $request->get('distribuidora');
        $peliculas->sinopsis = $request->get('sinopsis');
        $peliculas->tipo = $request->get('tipo');
        $peliculas->imagen = $request->get('imagen');

        $peliculas->save();
     
        return redirect(route("peliculas.index"))->with("success", __("¡Pelicula actualizada!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peliculas $peliculas
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Peliculas $pelicula)
    {
        $pelicula->delete();
        return back()->with("success", __("¡Peliculas eliminada!"));
    }
}
