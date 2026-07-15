<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
         public function user()
            {
                return $this->belongsTo(User::class);
            }

        public function skills()
        {
            return $this->belongsToMany(
                Skill::class,
                'offer_skill'
            );
        }

        public function candidatures()
        {
            return $this->hasMany(Candidature::class);
        }
}
