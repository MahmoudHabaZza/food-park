<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id','user_id','address','discount','subtotal',
        'final_total','product_qty','payment_method','payment_approve_date','transaction_id',
        'coupon_info','currency_name','order_status','delivery_charge'
    ];
}