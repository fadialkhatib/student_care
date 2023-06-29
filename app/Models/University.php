<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class University extends Model {

	protected $table = 'universities';
	public $timestamps = true;
	protected $fillable = array('name', 'location');

	public function subject()
	{
		return $this->belongsToMany('App/Models\Subject', 'subject_id', 'university_id');
	}

	public function student()
	{
		return $this->hasMany('App/Models\Student', 'university_id');
	}

}