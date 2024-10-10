<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Authenticatable
{
    use HasFactory;

    // Đặt tên bảng đúng
    protected $table = 'customer';  

    protected $fillable = [
        'UserName', 'CusEmail', 'password', 'CusPhone'
    ];

    protected $hidden = [
        'password',
    ];

    protected $primaryKey = 'CusID';
}


