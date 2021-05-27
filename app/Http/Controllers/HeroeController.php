<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Heroe;
use App\Models\Organization;
use App\Models\Alignment;
use App\Models\Power;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ImageUploadController;

class HeroeController extends Controller{

    public function createView(){

    	$powers = Power::all();
    	$organizations = Organization::all();
    	$alignments = Alignment::all();

		return view('heroe.create',compact('organizations','alignments','powers'));

	}

	public function getHeroeByName($name) {
		$heroes = Heroe::where('real_name', $name)->orWhere('heroe_name', $name)->get();
	}

	public function getHeroesByAlignment($id) {
		$heroes = Alignment::find($id)->Heroes;	
    }


	public function IndexView(Request $request){
        $regPaginas = 5;
        
        $powersbyHeroe = array();
        $organizationsbyHeroe =array();        
        $compact = array();

        $compact  = ['organizations','alignments','powers','heroes'];

        $heroes;

        if($request->has('heroe_name')){           
            $heroes = Heroe::where('heroe_name','like','%'.$request->heroe_name. '%'); 
        }

        if($request->has('real_name')){           
            $heroes = Heroe::where('real_name','like','%'.$request->real_name. '%'); 
        }

        if($request->has('organization')){

           if($request->organization != 'Todas'){        
                // Devuelve todos los heroes qur tienen al menos una organization
                $heroes = Heroe::has('organizations');                
            }
        }       
        
  
        if($request->has('powers')){

           if($request->powers != 'Todos'){           
                // Devuelve todos los heroes que tienen al menos un poder
                $heroes = Heroe::has('powers');                
            }
        }

        if($request->has('alignment')){

            if($request->alignment != 'Todos'){
                echo($request->alignment);
                $heroes = Heroe::where('alignment_id',$request->alignment);                
            }

        }	

         if (empty($heroes)){
            //Inicializamos la variable con todos los heroes 
            $heroes = Heroe::where('id','<>',0);
        }

        
        $heroes = $heroes->paginate($regPaginas);

    	$powers = Power::all()->toArray();
    	$organizations = Organization::all()->toArray();
    	$alignments = Alignment::all()->toArray();

    	foreach ($heroes as $heroe ) {
    		$powersbyHeroe[$heroe['id']] = Heroe::find($heroe['id'])->powers;
    		$organizationsbyHeroe[$heroe['id']] = Heroe::find($heroe['id'])->organizations;
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
            'heroe_name' => 'unique:heroes,heroe_name|required|unique:heroes|max:255',
        	'real_name' => 'required|max:255',
        	'alignment' => 'required|numeric',
            'vital_points' => 'required|numeric|max:100',
            'strength' => 'required|numeric|max:10',
    	]);

    	$heroe = heroe::where('heroe_name',$request->heroe_name)->first();

    	//comprobamos que o exista ya uno con ese nombre
    	if(!empty($heroe)){
            //este mensage no es necesario, ya que con el unque mos lo está controlando
    		return redirect()->back()->with('message', 'Este super héroe ya existe');
		}

        $heroe = new heroe();
        $heroe->real_name = $request->real_name;
        $heroe->heroe_name = $request->heroe_name;
        $heroe->alignment_id = $request->alignment;
        $heroe->vital_points = $request->vital_points;
        $heroe->strength = $request->strength;

        $heroe->save();

		$heroe->powers()->attach($request['power']);
		$heroe->organizations()->attach($request['organization']);

		return redirect()->back()->with('success', 'Super héroe creado correctamente');   

    }

    public function delete($id){
    	$heroe = heroe::find($id);

    	if($heroe->id <> 0) {
            //eliminamos la imagen de la carpeta
             app('App\Http\Controllers\ImageUploadController')->deleteImageNoRequest($heroe,$heroe->image_name);

    		//eliminamos los registros relacionados    
            $heroe->organizations()->detach();
            $heroe->powers()->detach();

            //Eliminamos el héroe
    		$heroe->delete();
    	}



        return redirect()->back()->with('success', 'Super héroe eliminado');   
    }

    public function updateView($id){

    	$heroe = Heroe::with('powers')->with('organizations')->find($id);


    	$powersAll = Power::all()->toArray();
    	$organizationsAll = Organization::all();
    	$alignments = Alignment::all();

		return view('heroe.update',compact('organizationsAll','alignments','powersAll','heroe'));

	}

    
    public function update(Request $request){
		$validated = $request->validate([
        	'real_name' => 'required|max:255',
            'alignment' => 'required|numeric',
            'power'=> 'required',
            'vital_points' => 'required|numeric|max:100',
            'strength' => 'required|numeric|max:10',
    	]);

        $heroe =heroe::find($request->id);          


    	if($heroe->id <> 0) {
        	$heroe->real_name = $request->real_name;
            $heroe->alignment_id =  $request->alignment;
            $heroe->organizations()->sync($request['organization']);
            $heroe->powers()->sync($request['power']);
            $heroe->vital_points = $request->vital_points;
            $heroe->strength = $request->strength;
        	$heroe->save();
        }else{
            return redirect()->back()->with('error', 'Super héroe no encontrado');   
        }
        return redirect()->back()->with('success', 'Super héroe actualizado correctamente');   


    }
    
    public function imageUploadPost(Request $request)    {
        $request->validate([
            'image' => 'requred|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->heroe_name.$request->image->extension();  
     
        $request->image->move(public_path('images'), $imageName);
  
        /* Store $imageName name in DATABASE from HERE */
    
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName); 
    }
    
}


