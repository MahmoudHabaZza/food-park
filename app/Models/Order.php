<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id','user_id','address','discount','subtotal',
        'final_total','product_qty','payment_method','payment_approve_date','transaction_id',
        'coupon_info','currency_name','order_status','delivery_charge','payment_status','address_id'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function userAddress() : BelongsTo {
        return $this->belongsTo(Address::class,'address_id','id');
    }
    public function items() : HasMany {
        return $this->hasMany(OrderItem::class);
    }
}
