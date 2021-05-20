<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Heroe;
use App\Models\Organization;
use App\Models\Alignment;
use App\Models\Power;
use Illuminate\Support\Facades\DB;


class HeroeController extends Controller{

    public function createView(){

    	$powers = Power::all()->toArray();
    	$organizations = Organization::all()->toArray();
    	$alignments = Alignment::all()->toArray();

		return view('heroe.create',compact('organizations','alignments','powers'));

	}

	public function getHeroeByName($name) {
		$heroes = Heroe::where('real_name', $name)->orWhere('heroe_name', $name)->get()->toArray();
	}

	public function getHeroesByAlignment($id) {
		$heroes = Alignment::find($id)->Heroes;	
    }


    /*public function busqueda(Request $request){
        

        if($request->has('palabra_clave')){
            $heroe->where('nombre', 'like', $request->palabra_clave);
        }

        if($request->has('sector')){
            $noticia->whereHas('sector', function ($query) {
                $query->where('nombre', 'like', $request->sector);
            });
        }

        if($request->has('fuente')){
            $noticia->whereHas('fuente', function ($query) {
                $query->where('nombre', 'like', $request->fuente);
            });
        }

        $noticias = $noticias->get();
        return view('tuvista', compact('noticias'));
    }*/




	public function IndexView(Request $request){
        
        $powersbyHeroe = array();
        $organizationsbyHeroe =array();        
        $compact = array();

        $compact  = ['organizations','alignments','powers','heroes'];

        //Inicializamos la variable con todos los heroes 
        $heroes = Heroe::all()->toArray();


        if($request->has('heroe_name')){           
            $heroes = Heroe::where('heroe_name','like','%'.$request->heroe_name. '%')->get()->toArray(); 
        }

        if($request->has('real_name')){           
            $heroes = Heroe::where('real_name','like','%'.$request->real_name. '%')->get()->toArray(); 
        }

        if($request->has('organization')){

           if($request->organization != 'Todas'){        
                // Devuelve todos los heroes qur tienen al menos una organization
                $heroes = Heroe::has('organizations')->get()->toArray();                
            }
        }
        

        if($request->has('powers')){

           if($request->powers != 'Todos'){           
                // Devuelve todos los heroes que tienen al menos un poder
                $heroes = Heroe::has('powers')->get()->toArray();                
            }
        }

        if($request->has('alignment')){

            if($request->alignment != 'Todos'){
                echo($request->alignment);
                $heroes = Heroe::where('alignment_id',$request->alignment)->get()->toArray();                
            }

        }
	

    	$powers = Power::all()->toArray();
    	$organizations = Organization::all()->toArray();
    	$alignments = Alignment::all()->toArray();

    	foreach ($heroes as $heroe ) {
    		$powersbyHeroe[$heroe['id']] = Heroe::find($heroe['id'])->powers->toArray();
    		$organizationsbyHeroe[$heroe['id']] = Heroe::find($heroe['id'])->organizations->toArray();
    	}
   
        if ( isset($powersbyHeroe)){
            array_push($compact, 'powersbyHeroe');
        }

        if  (isset($organizationsbyHeroe)){
             array_push($compact, 'organizationsbyHeroe');
        }

		return view('heroe.index',compact($compact));

	}

    public function create(Request $request){

    	$validated = $request->validate([
        	'real_name' => 'required|max:255',
        	'heroe_name' => 'required|unique:heroes|max:255',
        	'alignment' => 'required|numeric',

    	]);

    	$heroe = heroe::where('heroe_name',$request->heroe_name)->first();

    	//comprobamos que o exista ya uno con ese nombre
    	if($heroe){
    		return back()->withErrors(['Este super héroe ya existe']);
		}

        $heroe = new heroe();
        $heroe->real_name = $request->real_name;
        $heroe->heroe_name = $request->heroe_name;
        $heroe->alignment_id = $request->alignment;

        $heroe->save();

		$heroe->powers()->attach($request['power']);
		$heroe->organizations()->attach($request['organization']);

		return redirect()->back()->with('success', 'Super héroe creado correctamente');   

    }

    public function delete($id){
    	$heroe = heroe::find($id);

    	if($heroe->id <> 0) {
    		//eliminamos los registros relacionados    
            $heroe->organizations()->detach();
            $heroe->powers()->detach();
            //Eliminamos el héroe
    		$heroe->delete();
    	}
        return redirect()->back()->with('success', 'Super héroe eliminado');   
    }

    public function updateView($id){

    	$heroe = Heroe::with('powers')->with('organizations')->find($id)->toArray();


    	$powersAll = Power::all()->toArray();
    	$organizationsAll = Organization::all()->toArray();
    	$alignments = Alignment::all()->toArray();

		return view('heroe.update',compact('organizationsAll','alignments','powersAll','heroe'));

	}

    
    public function update(Request $request){
		$validated = $request->validate([
        	'real_name' => 'required|max:255',
            'alignment' => 'required|numeric',
            'power'=> 'required',
    	]);

        $heroe =heroe::find($request->id);          


    	if($heroe->id <> 0) {
        	$heroe->real_name = $request->real_name;
            $heroe->alignment_id =  $request->alignment;

            $heroe->organizations()->sync($request['organization']);
            $heroe->powers()->sync($request['power']);
        	$heroe->save();
        }
        return redirect()->back()->with('success', 'Super héroe actualizado correctamente');   


    }
}


