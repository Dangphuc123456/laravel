<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Authenticatable
{
    use HasFactory;
    protected $table = 'employee';  
    protected $fillable = [
        'username', 'EmpEmail', 'password', 'EmpPhone', 'EmpPosition', 'EmpSalary', 'EmpStartDate', 'EmpEndDate', 'EmpImage'
    ];

    protected $hidden = [
        'password',
    ];

    // Nếu có cần phải chỉ định khóa chính không phải là `id`
    protected $primaryKey = 'EmpID';
}


