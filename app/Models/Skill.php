<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function offers()
        {
            return $this->belongsToMany(
                Offer::class,
                'offer_skill'
            );
        }
}
