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
        'image',
        'Quantity',
        'Price',
        'Status',
        'image',
        'created_at',
        'updated_at'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'CusID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProID');
    }
    
}
