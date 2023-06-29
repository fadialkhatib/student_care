<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Report extends Model {

	protected $table = 'reports';
	public $timestamps = true;
	protected $fillable = array('report');

	public function posts()
	{
		return $this->belongsToMany(Post::class,'report_post','report_id', 'post_id');
	}

}