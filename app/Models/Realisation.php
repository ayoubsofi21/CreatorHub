<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Realisation extends Model
{
  public function skills()
{
    return $this->belongsToMany(Skill::class); 
}
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
