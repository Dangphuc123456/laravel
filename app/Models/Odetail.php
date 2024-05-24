<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odetail extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    protected $table = 'orderdetail'; // tên bảng
    // Các cột trong bảng
    protected $fillable = [
        'OrdID',
        'ProID',
        'Quantity',
        'Price',
        'created_at',
        'updated_at'
    ];
}
