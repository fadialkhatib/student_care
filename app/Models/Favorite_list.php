<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Favorite_list extends Model {

	protected $table = 'favorite_lists';
	public $timestamps = true;
	protected $fillable = array('patient_id', 'post_id');

	// public function patient()
	// {
	// 	return $this->belongsTo(Patient::class, 'patient_id');
	// }

	// public function post()
	// {
	// 	return $this->belongsTo(Post::class, 'post_id');
	// }

}