<?php

namespace App\Http\Controllers;

use App\Models\Peliculas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterfaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//------------------------------------------------------------------------------------------------------------------
// INTERFAZ     DE    INICIO                                                                                      //
//-------------------------------------------------------------------------------------------------------------------

    //Catalogo peliculas
    public function index()
    {
        $peliculas=Peliculas::all(); 
        return view("interface.index",compact("peliculas")); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Catalogo peliculas solo premium
    public function tienda(){
        $peliculas=Peliculas::all(); 
    return view("interface.tienda",compact("peliculas")); 
}

    //Categorias
    public function create()
    {
        $peliculas=Peliculas::all(); 
        return view("interface.categorias",compact("peliculas"));  
    }

   
//-------------------------------------------------------------------------------------------------------------------
// INTERFAZ DE USUARIO REGISTRADO                                                                                  //
//-------------------------------------------------------------------------------------------------------------------

//mis peliculas
public function mispeliculas(Request $request){
    $request->user()->authorizeRoles(['usuario','usuario_premium','administrador']);
    $peliculas=Peliculas::all(); 
    return view("interface.mispeliculas",compact("peliculas")); 
}
//peliculas recomendadas
public function peliculasrecom(Request $request){
    $request->user()->authorizeRoles(['usuario','usuario_premium','administrador']);
    $peliculas=Peliculas::all(); 
    return view("interface.peliculasrecom",compact("peliculas")); 
}
//favoritos
public function favoritos(Request $request){
    $request->user()->authorizeRoles(['usuario','usuario_premium','administrador']);
    $peliculas=Peliculas::all(); 
    return view("interface.favoritos",compact("peliculas")); 
}


//---------------------------------------------------------------------------------------------------------------------
// REGISTRO PRIME                                                                                                  //
//--------------------------------------------------------------------------------------------------------------------

public function prime(){
    return view("interface.prime"); 
}
public function registradoPrime(Request $request){
    $suscripcion=$request->get('sus');
    if($suscripcion=="Mensual"){
    $user=Auth::user()->suscripciones()->sync([2]);
    }
    elseif($suscripcion=="Anual"){
        $user=Auth::user()->suscripciones()->sync([3]);
        }
        else{
            $user=Auth::user()->suscripciones()->sync([1]);
        }
        $user=Auth::user()->roles()->sync([4]);
    return back()->with("success", __("¡UsuarioRegistrado!"));
}
//------------------------------------------------------------------------------------------------------------------
//VISUALIZAR PELICULA                                                                                            //
//-----------------------------------------------------------------------------------------------------------------

public function visualizar(Request $request,Peliculas $pelicula,$id){
    //despues de 30 dias de las suscripcion prmium, si no se vuelve a suscribir, se le quitará el rol de premium
    $peliculas = Peliculas::find($id); 
  $fecha_actual=strtotime(date("d-m-Y H:i:00",time()));
  if($fecha_actual < ($peliculas->created_at."+ 1 month") & Auth::user()!=null){
    $user=Auth::user()->roles()->sync([5]);
  }

    return view("interface.visualizar",compact("peliculas")); 
}

//------------------------------------------------------------------------------------------------------------------
//JSON ENLACES PELICULAS                                                                                         //
//-------------------------------------------------------------------------------------------------------------------

//guardo los enlaces de las peliculas para acceder mediante AJAX
public function JSON(){
    $peliculas=array(
        array("name"=>"Pulp Ficton","link"=>"https://www.youtube.com/embed/auCgsj0MV-M"),
        array("name"=>"La lista de Schindler","link"=>"https://www.youtube.com/embed/7q-ETFeMxwI"),
        array("name"=>"Seven","link"=>"https://www.youtube.com/embed/xhzBmjdehPA"),
        array("name"=>"El silencio de los corederos","link"=>"https://www.youtube.com/embed/tU_PuI591Uk"),
        array("name"=>"Taxi Driver","link"=>"https://www.youtube.com/embed/UUxD4-dEzn0"),
        array("name"=>"Alguien voló sobre el nido del cuco","link"=>"https://www.youtube.com/embed/OXrcDonY-B8"),
        array("name"=>"American History X","link"=>"https://www.youtube.com/embed/XfQYHqsiN5g"),
        array("name"=>"Blade Runner","link"=>"https://www.youtube.com/embed/eogpIG53Cis"),
        array("name"=>"Cadena Perpetua","link"=>"https://www.youtube.com/embed/4u87tmlj4oE"),
        array("name"=>"La chaqueta Metálica","link"=>"https://www.youtube.com/embed/7115nOKRFD8"),
        array("name"=>"El Club de la lucha","link"=>"https://www.youtube.com/embed/c06JMZ6uQ-U"),
        array("name"=>"El Golpe","link"=>"https://www.youtube.com/embed/_nAIb_J9T5M"),
        array("name"=>"El Padrino","link"=>"https://www.youtube.com/embed/gCVj1LeYnsc"),
        array("name"=>"El Padrino 2","link"=>"https://www.youtube.com/embed/cpt4cXjdJz0"),
        array("name"=>"El Pianista","link"=>"https://www.youtube.com/embed/BFwGqLa_oAo"),
        array("name"=>"El Precio del poder","link"=>"https://www.youtube.com/embed/He7IbXJy-Uk"),
        array("name"=>"La vida es bella","link"=>"https://www.youtube.com/embed/8_TJRfXIoY4"),
        array("name"=>"La naranja mecánica","link"=>"https://www.youtube.com/embed/A1eC4pG8rC0"),
     ); 
    return ($peliculas);

}











}
