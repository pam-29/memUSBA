<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Portrait extends Model{
    protected $fillable = ['source'];

    public function memes(): HasMany {
        return $this->hasMany(Meme::class);
    }
}