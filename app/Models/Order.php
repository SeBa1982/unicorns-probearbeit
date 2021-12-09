<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'an_pos',
        'bestelldatum',
        'article_id',
        'aricle_desc',
        'marke',
        'menge',
        'lieferdatum',
        'bestellnummer',
    ];

    protected $casts = [
        'an_pos' => 'array',
        'menge' => 'array',
    ];

    public function notice()
    {
        return $this->hasOne(Notice::class);
    }
}
