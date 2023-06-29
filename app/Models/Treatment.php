<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Treatment extends Model {

	protected $table = 'treatments';
	public $timestamps = true;
	protected $fillable = array('name', 'description', 'self_diagnosed');

	public function photos()
	{
		return $this->belongsToMany(Photo::class,'treatment_photo', 'treatment_id', 'photo_id');
	}

	public function post()
	{
		return $this->hasMany('App/Models\Post', 'treatment_id');
	}

	public function subject()
	{
		return $this->hasMany('App/Models\Subject', 'treatment_id');
	}

}