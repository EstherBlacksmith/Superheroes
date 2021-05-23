<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heroe extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'real_name',
        'heroe_name',
        'alignment_id',
        'image_name',
        'vital_points',
        'combat_vital_points',
        'strength',
    ];

	// un heroe tiene muchos poderes
    public function powers() {
		return $this->belongsToMany(Power::class);
	}

	//Un heroe puede ser parte de varias organizaciones 
	public function organizations() {
		return $this->belongsToMany(Organization::class);
	}

	//Un heroe tiene un alineamiento
	public function alignments() {
		return $this->belongsTo(Alignment::class);
	}
    
}