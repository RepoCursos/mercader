<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
