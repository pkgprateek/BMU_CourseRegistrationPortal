<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';

    public function semester()
    {
    	return $this->belongsTo('App\Semester');
    }
}
