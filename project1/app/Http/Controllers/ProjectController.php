<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{

    public function __construct(){
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('user')->paginate(10);
        return view("projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //Este es el metodo que envia las variables que se usan en el form
    {
        // Estas variables son las que se utilizan en projects.form
        $project= new Project;
        $title=__("Crear Proyecto"); 
        $textButton=__("Crear");
        $route= route("projects.store"); //Este es el metodo al que llama el action del form. Al store para hacer la inserccion en la BD

        return view("projects.create", compact("title","textButton","route","project")); //Devuleve la vista create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //Este metodo es que llama al ejecutar el formulario desde create
    {
        $this->validate($request, [
            "name"=> "required|max:140|unique:projects", //Verifica que el request que introduce el usuario sea valido
            "description" => "nullable|string|min:10"
        ]);
        
        Project::create($request->only("name","description"));

        return redirect(route("projects.index"))->with("success", __("¡Proyecto creado!"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $update=true;
        $title=__("Editar Proyecto"); 
        $textButton=__("Actualizar");
        $route= route("projects.update", ["project" => $project]);//Este metodo es que llama al ejecutar el formulario desde edit

        return view("projects.edit", compact("update", "title", "textButton", "route", "project")); //devuelve la vista edit.blade.php con esas variables
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validate($request, [
            "name"=> "required|unique:projects,name," . $project->id, //Verifica que el request que introduce el usuario sea valido
            "description" => "nullable|string|min:10"
        ]);

        $project->fill($request->only("name", "description"))->save();//Rellena los campos si son validos y los guarda
        return redirect(route("projects.index"))->with("success", __("¡Proyecto actualizado!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project) //Este metodo se llama desde index.balde.php Linea 32
    {
        $project->delete();
        return back()->with("success", __("¡Proyecto eliminado!"));
    }
}
