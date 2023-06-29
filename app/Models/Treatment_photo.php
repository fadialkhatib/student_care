<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Treatment_photo extends Model {

	protected $table = 'treatment_photo';
	public $timestamps = true;
	protected $fillable = array('treatment_id', 'photo_id');

	public function treatment()
	{
		return $this->hasMany('App/Models\Treatment', 'treatment_id');
	}

	public function photo()
	{
		return $this->hasMany('App/Models\Photo', 'photo_id');
	}

}