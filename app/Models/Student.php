<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Student extends Model {

	protected $table = 'students';
	public $timestamps = true;
	protected $fillable = array('user_id', 'verification_card', 'studying_year', 'university_id', 'photo_id');

	public function user()
	{
		return $this->belongsTo('App\Models\User', 'user_id');
	}


	function subject() 
	{
		return $this->belongsToMany(Subject::class , 'subject_lists' ,'student_id','subject_id');	
	}


	public function post()
	{
		return $this->hasMany('App\Models\Post', 'student_id');
	}

	public function photo()
	{
		return $this->belongsTo('App\Models\Photo', 'photo_id');
	}

	public function studying()
	{
		return $this->belongsToMany('App\Models\Studying', 'studying_id');
	}

	public function university()
	{
		return $this->belongsTo('App\Models\University', 'university_id');
	}

	public function queue()
	{
		return $this->hasMany('App\Models\Queue', 'student_id');
	}

}