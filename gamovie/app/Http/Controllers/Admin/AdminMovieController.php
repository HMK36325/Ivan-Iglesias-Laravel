<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;


class AdminMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $movies = Movie::paginate(10);
        return view("admin.movies", compact("movies"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movie = new Movie();
        $title = __("CREAR NUEVA PELICULA");
        $route = route("movies.store");
        return view("admin.createMovie", compact("title", "route", "movie"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'año' => 'required|integer|min:1900|max:2030',
                "director" => 'required',
                "genero" => 'required',
                "distribuidora" => 'required',
                'image' => 'required|mimes:jpg,jpeg|max:30'
            ]);

            $trimmedName = substr($request->name, 0, 6);
            $newImageName = time() . '-' . $trimmedName . '.' . $request->image->extension();

            $request->image->move(public_path(''), $newImageName);
            try {
                Movie::create([
                    'name' => $request->input('name'),
                    'director' => $request->input('director'),
                    'año' => $request->input('año'),
                    'genero' => $request->input('genero'),
                    'distribuidora' => $request->input('distribuidora'),
                    'imagen' => $newImageName
                ]);

                return redirect('admin/movies')->with('success', 'Pelicula añadida!');
            } catch (QueryException $th) {

                return Redirect::back()->withErrors(['La película ya se encuentra en la base de datos', 'msg']);
            }
        } catch (ValidationException $e) {

            return Redirect::back()->withErrors(['Los datos introducidos no son validos', 'msg']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $update = true; //POR EL "METHOD(PUT)
        $title = __("EDITAR UNA PELICULA");
        $movie = Movie::find($movie->id);
        $route = route("movies.update", ["movie" => $movie]);
        return view("admin.updateMovie", compact("update", "title", "route", "movie"))->with('movie', $movie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        try {
            $request->validate([
                'name' => 'required',
                'año' => 'required|integer|min:1900|max:2030',
                "director" => 'required',
                "genero" => 'required',
                "distribuidora" => 'required',
                'image' => 'mimes:jpg,jpeg|max:30'
            ]);


            try {

                $thisMovie = Movie::find($movie->id);
    
                $thisMovie->name = $request->get('name');
                $thisMovie->director = $request->get('director');
                $thisMovie->año = $request->get('año');
                $thisMovie->genero = $request->get('genero');
                $thisMovie->distribuidora = $request->get('distribuidora');

                if ($request->image!=null) {
                    $trimmedName = substr($request->name, 0, 6);
                    $newImageName = time() . '-' . $trimmedName . '.' . $request->image->extension();
                    $request->image->move(public_path(''), $newImageName);
                }else{
                    $newImageName= $thisMovie->imagen;
                }

                $thisMovie->imagen = $newImageName;
    
                $thisMovie->save();
    
                return redirect('admin/movies')->with('success', 'Pelicula actualizada!');
    
            } catch (QueryException $th) {
    
                return Redirect::back()->withErrors(['Algo salió mal, puede que los campos introducidos se repitan en la base de datos', 'msg']);
            }
        } catch (ValidationException $e) {

            return Redirect::back()->withErrors(['Los datos introducidos no son validos', 'msg']);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return back()->with("success", __("¡Pelicula eliminada!"));
    }
}
