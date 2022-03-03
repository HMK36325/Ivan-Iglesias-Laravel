<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', ['middleware' => 'forbid-banned-user', function () {
    return view('welcome');
}]);
Auth::routes();

Route::get('admin/users',[\App\Http\Controllers\Admin\AdminController::class,'users']);
Route::get('admin/ban/{user_id}',[\App\Http\Controllers\Admin\AdminController::class,'ban']);
Route::get('admin/unban/{user_id}',[\App\Http\Controllers\Admin\AdminController::class,'unban']);
Route::resource('admin', \App\Http\Controllers\Admin\AdminController::class);

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth','forbid-banned-user');


//PARA NO CREAR UN CONTACTACONTROLLER SOLO PARA ESTO, METO EN WEB ESTE METODO
Route::get('contacta',function(){
    $user= Auth::user();
    return view("contacta.index", compact("user")); //DEVUELVE EL FORMULARIO Y LO RELLENA CON LOS DATOS DEL USUARIO LOGEADO
});

Route::post('contactaProcess',function(Request $request){
    $correo=new ContactaMail($request->all());
    Mail::to("HMK36325@educastur.es")->send($correo);//SE CREA EL EMAIL CON LOS DATOS QUE DEVOLVAMOS EN ContactaMail
    return redirect(route('home'))->with('success','Email enviado');
});



