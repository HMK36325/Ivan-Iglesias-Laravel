<?php

namespace App\Http\Controllers;

use App\Mail\ContactaMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactaController extends Controller
{
    public function index(){
        return view('contacta.index');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'mensaje'=>'required',
        ]);
        $correo=new ContactaMail($request->all());
        Mail::to('vyd15559@educastur.es')->send($correo);
        return redirect(route('contacta.index'))->with('success','Email enviado');
    }

}
