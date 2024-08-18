<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers_Model extends Model
{
    use HasFactory;
    protected $table = "customers";
    protected $fillable = [
        'custom_id', 'fname', 
        'lname', 'contact', 
        'email', 'password', 
        'address', 'city', 
        'province', 'zipcode', 'image'
    ];

    // Automatically generate a six-digit custom_id
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($customer) {
            do {
                $customer->custom_id = mt_rand(100000, 999999);
            } while (self::where('custom_id', $customer->custom_id)->exists());
        });
    }
    
}
