<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Post extends Model {

protected $table = 'posts';
	public $timestamps = true;
	protected $fillable = array('student_id', 'description', 'treatment_id');

	public function report()
	{
		return $this->belongsToMany(Report::class,'report_post','post_id', 'report_id');
	}

	public function patient()
	{
		return $this->belongsToMany(Patient::class,'favorite_lists','post_id','patient_id');
	}

	public function dates()
	{
		return $this->belongsToMany(Date::class,'date_post','post_id', 'date_id');
	}

	public function student()
	{
		return $this->belongsTo('App/Models\Student', 'student_id');
	}

	public function photos()
	{
		return $this->belongsToMany(Photo::class,'post_photo','post_id','photo_id');
	}

	public function treatment()
	{
		return $this->belongsTo('App/Models\Treatment', 'treatment_id');
	}

	public function favorite_list()
	{
		return $this->hasMany('App/Models\Favorite_list', 'post_id');
	}

}