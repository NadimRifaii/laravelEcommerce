<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedItems extends Model
{
    use HasFactory;
    public function order(){
        return $this->belongsTo('orders');
    }
    public function product(){
        return $this->hasMany('products');
    }
}
