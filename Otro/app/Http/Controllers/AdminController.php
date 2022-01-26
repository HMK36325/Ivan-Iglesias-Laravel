<?php

namespace App\Http\Controllers;

use App\Models\Peliculas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
                                                                                  ///
        $request->user()->authorizeRoles(['administrador']); 
        return view("admin.index");
        
    }

//------------------------------------------------------------
// INTERFAZ DE ADMIN                        //
//------------------------------------------------------------

//calendario
public function cal(Request $request){
    //unauthorized para todos salvo admin
    $request->user()->authorizeRoles(['administrador']);
    return view("admin.cal"); 
}

//formularios
public function formularios(Request $request){
    //unauthorized para todos salvo admin
    $request->user()->authorizeRoles(['administrador']);
    return view("admin.formularios"); 
}



//pagina nueva
public function paginanueva(Request $request){
    //unauthorized para todos salvo admin
    $request->user()->authorizeRoles(['administrador']);
    return view("admin.paginanueva"); 
}

//tablas crud
public function tablas(Request $request){
    //unauthorized para todos salvo admin
    $request->user()->authorizeRoles(['administrador']);
    return view("admin.tablas"); 
}


}
