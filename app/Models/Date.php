<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Date extends Model {

	protected $table = 'dates';
	public $timestamps = true;
	protected $fillable = array('date');

	public function patient()
	{
		return $this->belongsToMany('App/Models\Patient', 'patient_id');
	}

	public function posts()
	{
		return $this->belongsToMany(Post::class,'date_post','date_id', 'post_id');
	}

}