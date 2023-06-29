<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Post_photo extends Model {

	protected $table = 'post_photo';
	public $timestamps = true;
	protected $fillable = array('post_id', 'photo_id');

	/*public function post()
	{
		return $this->hasMany('App/Models\Post');
	}

	public function photo()
	{
		return $this->hasMany('App/Models\Photo');
	}*/

}