<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts'; // tên bảng
    protected $primaryKey = 'id';    // khóa chính
    // Các cột trong bảng
    protected $fillable = [
        'id',
        'email',
        'message',
        'created_at',
        'updated_at'
    ];
}
