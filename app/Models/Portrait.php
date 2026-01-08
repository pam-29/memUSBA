<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Portrait extends Model
{
    // Remplissage de l'URL
    protected $fillable = ['source'];

    // Un portrait peut avoir plusieurs memes créés avec
    public function memes(): HasMany
    {
        return $this->hasMany(Meme::class);
    }
}