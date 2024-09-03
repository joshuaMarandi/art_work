<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'artwork_id', 'quantity', 'price',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function artwork()
    {
        return $this->belongsTo(Artwork::class);
    }
}
