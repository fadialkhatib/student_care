<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Queue extends Model {

	protected $table = 'queues';
	public $timestamps = true;
	protected $fillable = array('student_id', 'approved');

	public function student()
	{
		return $this->belongsTo('App/Models\Student', 'student_id');
	}

}