<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['reservation_id','user_id','name','phone','date', 'reservation_time_id','persons','status'];
    public function reservationTime() : BelongsTo
    {
        return $this->belongsTo(ReservationTime::class,'reservation_time_id','id');
    }
}
