<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Black_list extends Model
{
    use HasFactory;
    protected $table = 'black_lists';
    public $timestamps = false;
    protected $fillable = ['user_id'];


function user()
{
    return $this->belongsTo(User::class , 'user_id');
    
}
}