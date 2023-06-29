<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Student_studying extends Model {

	protected $table = 'student_studying';
	public $timestamps = true;
	protected $fillable = array('student_id', 'studying_id');

	public function student()
	{
		return $this->hasMany('App/Models\Student');
	}

	public function studying()
	{
		return $this->hasMany('App/Models\Studying');
	}

}