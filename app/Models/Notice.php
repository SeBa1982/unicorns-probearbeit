<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = [
        'notiz',
        'order_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
