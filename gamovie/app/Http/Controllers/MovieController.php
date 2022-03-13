<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact("movies"));
    }

    public function showMovie($id)
    {
        $movie = Movie::find($id);
        return view('movies.movie', compact("movie"));
    }

    public function addMovie($id)
    {
        $time = date("Y-m-d");

        DB::insert('insert into movie_user ( movie_id,user_id,fecha) values (?, ?,?)', [$id, Auth::user()->id, $time]);

        return Redirect::back()->with('success', '¡Pelicula añadida!');
    }

    public function userMovies()
    {

        $user = Auth::user();

        return view('movies.userMovies', compact("user"));
    }
}
