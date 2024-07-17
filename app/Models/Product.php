<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'thumb_image', 'price', 'offer_price','quantity', 'short_description', 'long_description', 'sku', 'seo_title', 'category_id', 'seo_description', 'status', 'show_at_home'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function images(): HasMany
    {
        return $this->hasMany(ProductGallery::class);
    }
    public function options(): HasMany
    {
        return $this->hasMany(ProductOption::class);
    }
    public function sizes(): HasMany
    {
        return $this->hasMany(ProductSize::class);
    }
    public function productRatings() : HasMany
    {
        return $this->hasMany(ProductRating::class);
    }
}
