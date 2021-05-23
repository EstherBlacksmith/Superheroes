<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Heroe;
use App\Models\Organization;
use App\Models\Alignment;
use App\Models\Power;

class CombatController extends Controller
{
    public function combatView(){
    	$fighter = Heroe::all();    

    	return view('combat',compact('fighter'));
    }

    public function combatCard(Request $request){

    	$fighter_1 = Heroe::find($request->id_1);
    	$fighter_2 = Heroe::find($request->id_2);
	
		$alignments_1 = Heroe::find($request->id_1)->alignments;
    	$alignments_2 = Heroe::find($request->id_2)->alignments;

    	$organizations_1 = Heroe::find($request->id_2)->organizations;
    	$organizations_2 = Heroe::find($request->id_2)->organizations;

    	$powers_1 = Heroe::find($request->id_2)->powers;
    	$powers_2 = Heroe::find($request->id_2)->powers;

		$randomInitiative       =   rand(1,2);
    	/*$organizations = Heroe::organizations()->name();
    	$powers = Heroe::powers()->name();
    	$alignments = Heroe::alignments()->name();*/
    	return view('combatCard',compact('fighter_1','fighter_2','alignments_1','alignments_2','organizations_1','organizations_2','powers_1','powers_2','randomInitiative'));


    }
}
