<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'status',
        'blog_category_id',
        'user_id',
        'seo_title',
        'seo_description'
    ];
    public function blogCategory(): BelongsTo {
    return $this->belongsTo(BlogCategory::class);
    }
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function comments() : HasMany
    {
        return $this->hasMany(BlogComment::class,'blog_id','id');
    }
}
