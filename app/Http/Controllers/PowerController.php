<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Power;
use App\Models\Heroe;

class PowerController extends Controller
{
	public function createView(){
		return view('power.create');

	}
    
    public function create(Request $request){
    	$validated = $request->validate([
        	'name' => 'unique:Powers,name|required|max:255',
        	'description' => 'required|max:255',
            'damage_points' => 'integer|max:20'
    	]);


        $power = new Power();
        $power->name = $request->name;
        $power->description = $request->description;
        $power->damage_points = $request->damage_points;
        $power->save();

        return redirect()->back()->with('success', 'Poder creado'); 


    }

     public function powerView(){
        $powers = Power::orderBy('name');
        $powers = $powers->paginate(5);

        return view('power.index',compact('powers'));

    }

    public function delete($id){
    	$power = Power::find($id);
    	if($power->id <> 0) {
    		//eliminamos los registros relacionados
            $power->heroes()->detach();
            //Eliminamos el poder
    		$power->delete();
    	}

        return redirect()->back()->with('success', 'Poder eliminado'); 

    }


    public function updateView($id){

        $power = Power::find($id); 

        return view('power.update',compact('power'));

    }
    
    public function update(Request $request){

		$validated = $request->validate([
            'name' => 'required|max:255',
        	'description' => 'required|max:255',
            'damage_points' => 'integer|max:20'
    	]);

    	$power =Power::find($request->id);

    	if($power->id <> 0) {
        	$power->name = $request->name;
        	$power->description = $request->description;
            $power->damage_points = $request->damage_points;
            $power->heroes()->sync($request['heroes']);
        	$power->save();
        }

        return redirect()->back()->with('success', 'Poder actualizado');  
    }
}
