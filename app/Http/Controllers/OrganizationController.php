<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\Heroe;

class OrganizationController extends Controller
{
	public function createView(){
		return view('organization.create');

	}
    
    public function create(Request $request){
    	$validated = $request->validate([
        	'name' => 'required|max:255',
        	'description' => 'required|max:255',
    	]);

        $organization = new organization();
        $organization->name = $request->name;
        $organization->description = $request->description;
        $organization->save();

    }

    public function organizationView(){
        $organizations = Organization::all()->toArray();

        return view('organization.index',compact('organizations'));

    }

    public function delete($id){       

    	$organization = organization::find($id);
    	if($organization->id <> 0) {
    		//eliminamos los registros relacionados    
            $organization->heroes()->detach();
            //Eliminamos la organización
            $organization->delete();
    	}

        return redirect()->back()->with('success', 'Organización eliminada');   

    }
    

    public function updateView($id){

        $organization = organization::find($id)->toArray(); 

        return view('organization.update',compact('organization'));

    }



    public function update(Request $request){
        
		$validated = $request->validate([
        	'name' => 'required|max:255',
        	'description' => 'required|max:255',
    	]);

        $organization = organization::find($request->id);

    	if($organization->id <> 0) {
        	$organization->name = $request->name;
        	$organization->description = $request->description;
            $organization->heroes()->sync($request['heroes']);
        	$organization->save();
        }

        return redirect()->back()->with('success', 'Organización actualizada');  
    }


}
       