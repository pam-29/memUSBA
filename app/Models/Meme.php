<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Meme extends Model
{
    // Autoriser les colonnes que vous allez remplir
    protected $fillable = ['text', 'portrait_id', 'likes', 'view'];

    // Un meme appartient à un seul portrait
    public function portrait(): BelongsTo
    {
        return $this->belongsTo(Portrait::class);
    }
}