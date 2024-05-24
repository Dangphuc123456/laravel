<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee'; // tên bảng
    protected $primaryKey = 'EmpID';    // khóa chính
    // Các cột trong bảng
    protected $fillable = [
    'EmpName',
    'EmpAddress',
    'EmpPhone',
    'EmpEmail',
    'EmpPosition',
    'EmpSalary',
    'EmpStartDate',
    'EmpEndDate',
    'EmpImage',
    'created_at',
    'updated_at'
    ];
}
