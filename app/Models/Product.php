<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'thumb_image', 'price', 'offer_price', 'short_description', 'long_description', 'sku', 'seo_title', 'category_id', 'seo_description', 'status', 'show_at_home'];
}
