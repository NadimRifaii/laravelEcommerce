<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(Order::class);
    }
    public function orderedItems(){
        return $this->belongsTo(OrderedItems::class);
    }
}
