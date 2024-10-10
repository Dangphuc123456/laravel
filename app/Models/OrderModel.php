<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'CusID');
    }

    public function orderDetails()
    {
        return $this->hasMany(Odetail::class, 'OrdID');
    }
    public function product()
    {
        return $this->belongsToMany(Product::class, 'cart', 'OrdID', 'ProID')
                    ->withPivot('Quantity', 'Price');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class, 'OrdID', 'OrdID');
    }
    public function cart()
    {
        return $this->belongsToMany(Cart::class, 'order_cart', 'OrdID', 'OrdID');
    }
    public function cartItems()
    {
        return $this->hasMany(Cart::class, 'OrdID', 'OrdID');
    }
    protected $table = 'order'; // tên bảng
    protected $primaryKey = 'OrdID';
    // Các cột trong bảng
    protected $fillable = [  
        'OrdID',
        'CusID',
        'EmpID',
        'Name',
        'OrderDate',
        'Status',
        'Address',
        'Phone',
        'MoneyTotal',
        'Note',
        'Email',
        'Payment',
        'created_at',
        'updated_at'
    ];
}
