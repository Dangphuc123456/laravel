<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $primaryKey = 'CartID';
    protected $fillable = [
        'CartID',
        'CusID',
        'ProID',
        'Quantity',
        'Price',
        'Status',
        'created_at',
        'updated_at',
        'ProName'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'CusID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProID');
    }
    public function orderModel()
    {
        return $this->hasMany(OrderModel::class, 'ProID', 'ProID'); // Replace 'OrderModel' with the actual model name
    }
}
