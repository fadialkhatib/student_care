<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Question extends Model {

	protected $table = 'questions';
	public $timestamps = true;
	protected $fillable = array('question');

}