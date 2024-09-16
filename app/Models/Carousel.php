<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Carousel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'link',
        'alt',
        'photo_id'
    ];

    public function photo(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'photo_id', 'id');
    }
}
