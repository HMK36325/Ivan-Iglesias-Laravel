<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Libros;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }
    
    public function list_users(){
        $users=User::all();
        return view ('admin.list-users', compact('users'));  
    }
    public function list_libros(){
        $libros=Libros::all();
       // dd($libros);
        return view ('admin.list-libros', compact('libros'));  
    }

}
