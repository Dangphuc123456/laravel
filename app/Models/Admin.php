<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    // Chỉ định tên bảng auth
    protected $table = 'auth';

    // Các cột có thể được điền giá trị vào
    protected $fillable = [
        'email',
        'password',
        'phone_number',
        'username',
        'role',
    ];

    // Ẩn cột password khi trả về dữ liệu
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Các kiểu dữ liệu cần định dạng
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Thêm logic kiểm tra vai trò
    public function isEmployee()
    {
        return $this->role === 'employee';
    }
}
