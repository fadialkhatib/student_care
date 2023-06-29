<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Photo extends Model {

	protected $table = 'photos';
	public $timestamps = true;
	protected $fillable = array('image');

	public function posts()
	{
		return $this->belongsToMany(Post::class,'post_photo','photo_id','post_id');
	}

	public function treatments()
	{
		return $this->belongsToMany(Treatment::class,'tratment_photo' ,'post_id', 'treatment_id');
	}

	public function student()
	{
		return $this->hasOne('App/Models\Student');
	}

}