<?php

namespace App\Http\Controllers\Admin;

use App\Models\Libros;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class librosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros=Libros::all();
         return view ('admin.list-libros', compact('libros'));  
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // abrir formulario para un nuevo registro
    {
        $libros = new libros();
        $title = __("Crear libro");
        $textButton = __("Crear");
        $route = route("libros.store");
        return view('admin.create', compact("title", "textButton", "route", "libros"));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // guardar en la base de datos el nuevo registro
    {
       // dd($request);
       // $libros= libros::create($request->all());
        //return redirect()->route('admin.edit',$libros);
        $this->validate($request, [
            "titulo"=> "required|max:30",
            "tematica"=>"required|max:20",
            "sinopsis"=>"required|max:140",
            "autor"=>"required|max:40"
          
          
        ]);   

            libros::create([
                'titulo'=>$request->input("titulo"),
                'tematica'=>$request->input("tematica"),
                'sinopsis'=>$request->input("sinopsis"),
                'autor'=>$request->input("autor"),
                //'portada'=>$request->file("portada")->store('', 'images'),
        
            ]);
            return redirect(url('/admin/list-libros'))
            ->with('success',__("Libro añadido"));
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(libros $libros) // visualizar un solo registro
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
       $libros=libros::find($id);
        $update = true;
        $title = __("Editar libro");
        $textButton = __("Actualizar");
        $route=route("libros.update", $libros->id);
        return view ("admin.edit",compact("update","title","textButton","route","libros"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "titulo"=> "required|max:30",
          
          
        ]);


       $libros=libros::find($id);
        $libros-> titulo = $request->get('titulo');
        $libros-> tematica = $request->get('tematica');
        $libros-> sinopsis = $request->get('sinopsis');
        $libros-> autor = $request->get('autor');
        if($request->hasFile('imagen')){
            Storage::disk('images')->delete('images/'.$libros->portada);
            $libros-> portada = $request->file('portada')->store('','images');
        }
        

        $libros-> save();
        return redirect(url("admin/list-libros"))
        ->with("success", __("¡libro actualizado!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(libros $libro)// eliminar registro
    {
         
         $libro->delete();
         return back()->with("success", __("Acabas de eliminar el libro"));
    }
}

