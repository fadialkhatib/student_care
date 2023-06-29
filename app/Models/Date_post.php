<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Date_post extends Model {

	protected $table = 'date_post';
	public $timestamps = true;
	protected $fillable = array('date_id', 'post_id');

	// public function date()
	// {
	// 	return $this->hasMany('App/Models\Date', 'date_id');
	// }

	// public function post()
	// {
	// 	return $this->hasMany('App/Models\Post', 'post_id');
	// }

}