<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.layout");
    }

    public function users(){

        $users = User::all();
        return view("admin.users", compact("users"));
    }

    public function ban($user_id){

        $user = User::find($user_id);

        $user->ban();
        
        return redirect()
        ->back()
        ->with('success', 'Usuario baneado');
    }

    public function unban($user_id){

        $user = User::find($user_id);

        $user->unban();
        
        return redirect()
        ->back()
        ->with('success', 'Usuario desbaneado');
    }

}
