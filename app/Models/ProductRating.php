<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductRating extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','product_id','rating','review','status'];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
