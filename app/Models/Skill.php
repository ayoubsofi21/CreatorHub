<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function offers()
    {
        return $this->belongsToMany(
            Offer::class,
            'offer_skill'
        );
    }

    public function realisations()
    {
        return $this->belongsToMany(
            Realisation::class,
            'realisation_skill'
        );
    }
}