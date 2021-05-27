<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Heroe;
use App\Models\Organization;
use App\Models\Alignment;
use App\Models\Power;

class CombatController extends Controller
{
    public $stringCombat = "";
    public function combatView(){
    	$fighter = Heroe::all();    

    	return view('combat',compact('fighter'));
    }

    public function combatCard(Request $request){

    	$fighter_1 = Heroe::find($request->id_1);
    	$fighter_2 = Heroe::find($request->id_2);
	
		$alignments_1 = Heroe::find($request->id_1)->alignments;
    	$alignments_2 = Heroe::find($request->id_2)->alignments;

    	$organizations_1 = Heroe::find($request->id_1)->organizations;
    	$organizations_2 = Heroe::find($request->id_2)->organizations;

    	$powers_1 = Heroe::find($request->id_1)->powers;
    	$powers_2 = Heroe::find($request->id_2)->powers;

		$randomInitiative       =   mt_rand(1,20);
        if($randomInitiative > 10){
            $randomInitiative = 2;
        }else{
            $randomInitiative = 1;
        }


        $winner = $this->combatResult($fighter_1,$fighter_2,$powers_1,$powers_2,$randomInitiative);

        if($winner->id == $fighter_1->id){
            $winnerCard = 1;
        }else{
            $winnerCard = 2;
        }

        $stringCombat = $this->GetStringCombat();

    	return view('combatCard',compact('fighter_1','fighter_2','alignments_1','alignments_2','organizations_1','organizations_2','powers_1','powers_2','randomInitiative','winner','winnerCard','stringCombat'));


    }

    public function combatResult($fighter_1,$fighter_2,$powers_1,$powers_2,$randomInitiative){ 

        $stringCombat = "" ;

        //empieza el que tiene la iniciativa
        if($randomInitiative == 1){
            $heroe_1 = $fighter_1;
            $heroe_2 = $fighter_2;
            $skills_1 = $powers_1->toArray(); 
            $skills_2 = $powers_2->toArray(); 

        }else{
            $heroe_1 = $fighter_2;
            $heroe_2 = $fighter_1;
            $skills_1 = $powers_2->toArray(); 
            $skills_2 = $powers_1->toArray(); 
        }

        $winner = $heroe_1;
        $turn_1 = 0;
        $turn_2 = 0;

        $combatPoints_1 = $heroe_1->vital_points;
        $combatPoints_2 = $heroe_2->vital_points;
      

        if($heroe_1->vital_points < $heroe_2->vital_points){
            $MinVitalPoints =  $heroe_1->vital_points;
        }else{
            $MinVitalPoints = $heroe_2->vital_points;
        }

        if($MinVitalPoints == 0){
            $MinVitalPoints = 10;
        }
        
        //mientras una tenga puntos de vida
        do {
            if($turn_1 < count ($skills_1)){
                $turn_1 = 0;
            }

            if($turn_2 < count ($skills_2)){
                $turn_2 = 0;
            }

            //la suerte influye...
            if (mt_rand(0,100) > 25) {
               $combatPoints_2 = $combatPoints_2 - ( ($skills_1[ $turn_1]['damage_points'] * $heroe_1->strength) / 10 );
                $stringCombat =  $stringCombat ."<br>" . $heroe_1->heroe_name . " hace " . $skills_1[ $turn_1]['name'] ;
                $stringCombat =  $stringCombat ."<br>" . $heroe_1->heroe_name . " hace " . ( ($skills_1[ $turn_1]['damage_points'] * $heroe_1->strength) / 10 ). " puntos de daño";
            }

            if ($combatPoints_2 <= 0){
                $winner = $heroe_1;
                break;
            }

            if (mt_rand(0,100) > 25) {
             $combatPoints_1 = $combatPoints_1 - ( ($skills_2[ $turn_1]['damage_points'] * $heroe_2->strength) / 10 ) ;
                 $stringCombat =  $stringCombat ."<br>" . $heroe_2->heroe_name . " hace " . $skills_2[ $turn_1]['name'] ;
                 $stringCombat =  $stringCombat ."<br>" .  $heroe_2->heroe_name . " hace " . ( ($skills_2[ $turn_1]['damage_points'] * $heroe_2->strength) / 10 ) . " puntos de daño ";
            }          

            if ($combatPoints_1 <= 0){
                $winner = $heroe_2;
                break;
            }         

            $turn_1 = $turn_1 ++;
            $turn_2 = $turn_2 ++;
        }while ($MinVitalPoints > 0) ;
        
        $this->setStringCombat( $stringCombat );
        
        return $winner;
    }   

    public function setStringCombat($stringCombat ){
        $this->stringCombat =  $stringCombat ;
    }

    public function GetStringCombat (){
        return  $this->stringCombat ;
    }
}
