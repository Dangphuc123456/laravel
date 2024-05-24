<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;
    public function orderDetails()
    {
        // return $this->hasMany(Orders_details::class);
        return $this->hasMany(Odetail::class, 'OrdtID');
    }
    public function customer()
    {
        return $this->belongsTo(User::class, 'CusID');
    }
    public function customer_()
    {
        return $this->belongsTo(Customer::class, 'CusID','CusID');
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
