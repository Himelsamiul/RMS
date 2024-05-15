<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function OrderDetail(){
        return $this->belongsTo(OrderDetail::class);
    }

    public function Customer(){
        return $this->belongsTo(Customer::class);
    }
}
