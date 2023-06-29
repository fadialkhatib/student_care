<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Studying extends Model {

	protected $table = 'studying';
	public $timestamps = true;
	protected $fillable = array('year', 'semister');

	public function student()
	{
		return $this->belongsToMany('App/Models\Student', 'student_id');
	}

	public function subject()
	{
		return $this->belongsToMany('App/Models\Subject', 'subject_id', 'studying_id');
	}

}