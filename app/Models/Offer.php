<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
        use HasFactory;
        //  public function user()
        //     {
        //         return $this->belongsTo(User::class);
        //     }

        // public function skills()
        // {
        //     return $this->belongsToMany(
        //         Skill::class,
        //         'offer_skill'
        //     );
        // }

        // public function candidatures()
        // {
        //     return $this->hasMany(Candidature::class);
        // }
        protected $fillable = [
            'user_id',
            'title',
            'description',
            'budget',
            'deadline',
            'status'
        ];

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
