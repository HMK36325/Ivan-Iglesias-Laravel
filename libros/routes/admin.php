<?php

use Illuminate\Support\Facades\Route;

Use App\http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\librosController;

Route::group(['middleware'=>['can:admin']],function(){   // lo que hace esta función es que si no eres un administrador no puedes entrar en el panel de administrador
    Route::get('admin',[AdminController::class,'index']);
    Route::get('admin/list-users',[AdminController::class,'list_users']);
    Route::get('admin/list-libros',[AdminController::class,'list_libros']); 
    Route::resource('admin/users',UserController::class);
    Route::resource("admin/libros",librosController::class);   
    // Route::resource('permissions',PermissionController)
});

?>

