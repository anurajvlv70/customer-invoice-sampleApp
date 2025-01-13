<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

   
    protected $fillable = [
        'customer_Id',
        'date',
        'amount',
        'status',
    ];

    public function customer(){
        return $this->belongsTo(Customer::class,'customer_Id','id');
    }
}

