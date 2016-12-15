<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormRegistration extends Model
{
    public $fillable = ['registration_id', 'name', 'batch', 'branch', 'semester', 'verify_status'];
}
