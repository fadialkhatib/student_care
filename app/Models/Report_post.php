<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Report_post extends Model {

	protected $table = 'report_post';
	public $timestamps = true;
	protected $fillable = array('post_id', 'report_id');

	// public function post()
	// {
	// 	return $this->hasMany('App/Models\Post', 'post_id');
	// }

	// public function reports()
	// {
	// 	return $this->hasMany('App/Models\Report', 'report_id');
	// }

}