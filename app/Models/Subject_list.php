<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject_list extends Model
{
    use HasFactory;
    
	protected $table = 'subject_lists';
	protected $fillable = array('subject_id', 'student_id');

}
