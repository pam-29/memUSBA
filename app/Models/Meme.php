<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Meme extends Model
{
    protected $fillable = ['text', 'portrait_id', 'likes', 'view', 'public'];

    public function portrait(): BelongsTo
    {
        return $this->belongsTo(Portrait::class);
    }
}