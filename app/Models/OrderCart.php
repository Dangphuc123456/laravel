<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCart extends Model
{
    use HasFactory;
    protected $table = 'order_cart'; // tên bảng
    protected $primaryKey = 'ordercartID';
    // Các cột trong bảng
    protected $fillable = [  
        'ordercartID',
        'OrdID',
        'CartID'
    ];
}
