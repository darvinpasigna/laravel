<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship_Model extends Model
{
    use HasFactory;

    protected $table = "shipments";
    protected $fillable = [
        "customer_name",
        "customer_address", "customer_contact",
        "prod_name", "quantity", "price",
        "total_price"
        ];
}
