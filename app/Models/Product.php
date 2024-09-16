<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasSlug, Searchable;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_id',
        'price'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => (int) $this['id'],
            'name' => $this['name'],
            'slug' => $this['slug'],
            'description' => $this['description'],
            'price' => (float) $this['price'],
            'category' => (float) $this['category_id'],
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function photos(): BelongsToMany
    {
        return $this->belongsToMany(Media::class);
    }
}
