<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'amount'
    ];

    protected $with = [
        'product'
    ];

    function user(){
        return $this->belongsTo(User::class);
    }

    function product(){
        return $this->belongsTo(Product::class);
    }
}
