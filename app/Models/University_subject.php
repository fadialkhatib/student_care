<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class University_subject extends Model {

	protected $table = 'university_subject';
	public $timestamps = true;
	protected $fillable = array('university_id', 'subject_id');

	public function university()
	{
		return $this->hasMany('App/Models\University');
	}

	public function subject()
	{
		return $this->hasMany('App/Models\Subject');
	}

}