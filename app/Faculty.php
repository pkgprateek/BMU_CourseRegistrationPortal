<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public $timestamps = false;
    public $fillable = ['name', 'email', 'contact'];

    public function students()
    {
    	return $this->hasMany('App\Student');
    }
}
