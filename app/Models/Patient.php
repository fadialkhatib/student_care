<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Patient extends Model {

	protected $table = 'patients';
	public $timestamps = true;
	protected $fillable = array('user_id', 'date_of_birth', 'location');

	public function user()
	{
		return $this->belongsTo('App/Models\User', 'user_id');
	}

	public function post()
	{
		return $this->belongsToMany(Post::class, 'favorite_lists','patient_id','post_id');
	}

	public function date()
	{
		return $this->belongsToMany('App/Models\Date', 'date_id');
	}

	public function favorite_list()
	{
		return $this->hasMany('App/Models\Favorite_list', 'patient_id');
	}

}