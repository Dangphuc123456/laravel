<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer'; // tên bảng
    protected $primaryKey = 'CusID';    // khóa chính
    // Các cột trong bảng
    protected $fillable = ['CusName', 'CusEmail', 'CusAddress', 'CusPhone', 'Note', 'Payment'];
    public function order()
    {
        return $this->hasMany(OrderModel::class, 'CusID', 'CusID');
    }
    
}
