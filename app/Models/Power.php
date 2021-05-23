<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Power extends Model
{
    use HasFactory;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'damage_points',
    ];


    //Cada poder pueder ser usado por varios heroes
    public function heroes() {
		return $this->belongsToMany(Heroe::class);
	}


}
