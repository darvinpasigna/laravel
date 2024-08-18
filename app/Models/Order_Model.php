<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Model extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = [
        "prod_name", "quantity",
        "price_per_item", "total_price",
        "main_img"
        ];
}
