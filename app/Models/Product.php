<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name', 'price', 'image','number'
    ];

    // public function articles() {
        
    //     return $this->belongsTo('App\Models\Article');
        
    // }
}
