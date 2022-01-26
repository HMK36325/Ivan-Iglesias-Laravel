<?php
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactaMail;
use App\Models\Suscripciones;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

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
Route::resource('users',\App\Http\Controllers\UserController::class);
Route::resource('/admin/peliculas',\App\Http\Controllers\PeliculasController::class);
Route::resource('/admin/usuarios',\App\Http\Controllers\UserController::class);
Route::resource('/admin/suscripciones',\App\Http\Controllers\SuscripcionesController::class);

//PRUEBAS
Route::get('/prueba',function(Request $request){//RUTA PARA HACER PRUEBAS Y VER LOS CAMBIOS Y EJECUTAR ALGUN CAMBIO COMO CAMBIAR PERMISOS
   // $request->user()->authorizeRoles(['administrador']);//PARA QUE SOLO PUEDA HACER CAMBIOS ENTRANDO EL LA RUTA EL ADMINISTRADOR
   $user=User::find(1)->roles()->sync([1,2,3,4]); //LE DOY AL USUARIO QUE QUIERO LOS ROLES QUE QUIERO, EN ESTE CASO A Oscar LE DOY TODOS LOS ROLES

   

return $user;
});

Route::resource('admin',\App\Http\Controllers\AdminController::class);

//FIN PRUEBAS



//-----------------------------------------------------------------------------------------------------------------------------
// INTERFAZ     DE    INICIO                                                                                                 //
//-----------------------------------------------------------------------------------------------------------------------------
Route::resource('/interface',\App\Http\Controllers\InterfaceController::class);
Route::get('tienda',[\App\Http\Controllers\InterfaceController::class,'tienda']);



//----------------------------------------------------------------------------------------------------------------------------
// INTERFAZ     DE   USUARIO REGISTRADO                                                                                      //
//----------------------------------------------------------------------------------------------------------------------------
Route::get('mispeliculas',[\App\Http\Controllers\InterfaceController::class,'mispeliculas']);
Route::get('peliculasrecom',[\App\Http\Controllers\InterfaceController::class,'peliculasrecom']);
Route::get('favoritos',[\App\Http\Controllers\InterfaceController::class,'favoritos']);
//Boton Soporte
Route::get('contacta',function(){
    return view("emails.index");
});
Route::post('contactaProcess',function(Request $request){
    $correo=new ContactaMail($request->all());
    Mail::to("oscarin.ramalin@gmail.com")->send($correo);
 return back()->with("success", __("¡UsuarioRegistrado!"));;
});

//----------------------------------------------------------------------------------------------------------------------------
// INTERFAZ     DE   PRIME                                                                                                 //
//----------------------------------------------------------------------------------------------------------------------------
Route::get('prime',[\App\Http\Controllers\InterfaceController::class,'prime']);
Route::post('registradoPrime',[\App\Http\Controllers\InterfaceController::class,'registradoPrime']);

//----------------------------------------------------------------------------------------------------------------------------
// INTERFAZ     PARA VISUALIZAR PELICULA                                                                                                 //
//----------------------------------------------------------------------------------------------------------------------------
Route::get('visualizar/{id}',[\App\Http\Controllers\InterfaceController::class,'visualizar']);
Route::get('ajax',[\App\Http\Controllers\InterfaceController::class,'JSON']);



//----------------------------------------------------------------------------------------------------------------------------
// INTERFAZ     ADMIN                                                                                             //
//----------------------------------------------------------------------------------------------------------------------------
Route::get('formularios',[\App\Http\Controllers\AdminController::class,'formularios']);
Route::get('paginanueva',[\App\Http\Controllers\AdminController::class,'paginanueva']);
Route::get('tablas',[\App\Http\Controllers\AdminController::class,'tablas']);
Route::get('cal',[\App\Http\Controllers\AdminController::class,'cal']);


/*


*/

