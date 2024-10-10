<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
   
    // Đặt tên bảng nếu không tuân theo quy tắc mặc định của Laravel
    protected $table = 'booking';

    // Chỉ định các thuộc tính có thể được gán đại diện (mass assignable)
    protected $fillable = [
        'name',
        'phone',
        'date',
        'time',
        'guest_count',
        'location',
        'status',
    ];

    // Bỏ qua các trường thời gian
    public $timestamps = false;
}
