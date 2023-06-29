<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Patient_post_date extends Model {

	protected $table = 'patient_post_date';
	public $timestamps = true;
	protected $fillable = array('patient_id', 'post_id', 'rate', 'approved', 'date_id');

	public function patient()
	{
		return $this->hasMany('App/Models\Patient', 'patient_id');
	}

	public function post()
	{
		return $this->hasMany('App/Models\Post', 'post_id');
	}

	public function date()
	{
		return $this->hasMany('App/Models\Date', 'date_id');
	}

}