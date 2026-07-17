<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Save extends Model
{
    protected $fillable = ['user_id', 'realisation_id'];
    
    public $timestamps = false;
}
