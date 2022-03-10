<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->can('admin.layout')) {
            return view("admin.layout");
        } else {
            return view('welcome');
        }
    }

    public function users()
    {
        if (Auth::user()->can('admin.layout')) { 
            $users = User::all();
            return view("admin.users", compact("users"));
        } else {
            return view('welcome');
        }
    }

    public function ban($user_id)
    {

        $user = User::find($user_id);

        $user->ban();

        return redirect()
            ->back()
            ->with('success', 'Usuario baneado');
    }

    public function unban($user_id)
    {

        $user = User::find($user_id);

        $user->unban();

        return redirect()
            ->back()
            ->with('success', 'Usuario desbaneado');
    }
}
