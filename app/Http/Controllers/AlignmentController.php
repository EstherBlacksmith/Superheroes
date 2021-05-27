<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alignment;
use App\Models\Heroe;


class AlignmentController extends Controller
{
    public function createView(){
		return view('alignment.create');

	}

    public function alignmentView(){
        $alignments = Alignment::orderBy('name');
        $alignments = $alignments->paginate(5);

        return view('alignment.index',compact('alignments'));

    }
    public function updateView($id){

         $alignment = Alignment::find($id); 

        return view('alignment.update',compact('alignment'));

    }


    public function create(Request $request){
    	$validated = $request->validate([
            'name' => 'unique:alignments,name|required|max:255',
        	'description' => 'required|max:255',
    	]);

        $alignment = new alignment();
        $alignment->name = $request->name;
        $alignment->description = $request->description;
        $alignment->save();

        return redirect()->back()->with('success', 'Alineamiento creado');   


    }

    public function delete($id){
    	$alignment = alignment::find($id);
    	
        if($alignment->id <> 0) {

            $heroe =Heroe::where('alignment_id',$alignment->id)->get();

    		//no podemos eliminar si hay registros relacionados
            if(!$heroe->isEmpty() ){
                return redirect()->back()->with('errors','Este alineamiento no se puede eliminar porque hay héroes que lo tienen');   
            }

    		$alignment->delete();

            return redirect()->back()->with('success', 'Alineamiento eliminado');   
    	}

    }
    
    public function update(Request $request){

		$validated = $request->validate([
        	'name' => 'required|max:255',
        	'description' => 'required|max:255',
    	]);

    	$alignment =alignment::find($request->id);
    	if($alignment->id <> 0) {
        	$alignment->name = $request->name;
        	$alignment->description = $request->description;
        	$alignment->save();
        }

        return redirect()->back()->with('success', 'Alineamiento actualizado');   


    }
}

