<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class introproduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name', 'price', 'image','number','product_id','detail'
    ];
}
