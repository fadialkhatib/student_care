<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Subject_studying extends Model {

	protected $table = 'subject_studying';
	public $timestamps = true;
	protected $fillable = array('subject_id', 'studying_id');

	public function subject()
	{
		return $this->hasMany('App/Models\Subject');
	}

	public function studying()
	{
		return $this->hasMany('App/Models\Studying');
	}

}