<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = 'semesters';

    public function subjects()
    {
    	return $this->hasMany('App\Subject');
    }
}
