<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Subject extends Model {

	protected $table = 'subjects';
	public $timestamps = true;
	protected $fillable = array('treatment_id', 'name', 'year');



	function student() 
	{
		return $this->belongsToMany(Student::class , 'subject_lists' ,'subject_id','student_id');	
	}


	public function treatment()
	{
		return $this->belongsTo('App/Models\Treatment', 'treatment_id');
	}

	public function studying()
	{
		return $this->belongsToMany('App/Models\Studying', 'studying_id', 'subject_id');
	}

	public function university()
	{
		return $this->belongsToMany('App/Models\University', 'university_id', 'subject_id');
	}

}