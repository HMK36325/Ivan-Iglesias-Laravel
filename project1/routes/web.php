<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactaMail;
use Illuminate\Http\Request;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('projects', ProjectController::class);
Route::resource('admin', UserController::class);

Route::get('/prueba',function(){//RUTA PARA HACER PRUEBAS Y VER LOS CAMBIOS Y EJECUTAR ALGUN CAMBIO COMO CAMBIAR PERMISOS
    // $user=User::find(47)->roles()->sync([1,2,3]); //LE DOY AL USUARIO QUE QUIERO LOS ROLES QUE QUIERO
       $user=User::find(1)->role()->sync([1,2,3]);
 return $user;
 });

//PARA NO CREAR UN CONTACTACONTROLLER SOLO PARA ESTO, METO EN WEB ESTE METODO
Route::get('contacta',function(){
    $user= Auth::user();
    return view("emails.index", compact("user")); //DEVUELVE EL FORMULARIO Y LO RELLENA CON LOS DATOS DEL USUARIO LOGEADO
});

Route::post('contactaProcess',function(Request $request){
    $correo=new ContactaMail($request->all());
    Mail::to("HMK36325@educastur.es")->send($correo);//SE CREA EL EMAIL CON LOS DATOS QUE DEVOLVAMOS EN ContactaMail
    return redirect(route('home'))->with('success','Email enviado');
});