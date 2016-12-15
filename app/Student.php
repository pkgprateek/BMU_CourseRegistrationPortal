<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;
    public $fillable = ['registration_id', 'name', 'email', 'batch_year', 'specialization', 'contact'];

    public function faculty()
    {
    	return $this->belongsTo('App\faculty');
    }
}