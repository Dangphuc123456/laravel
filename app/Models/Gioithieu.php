<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gioithieu extends Model
{
    use HasFactory;
    protected $table = 'gioithieu'; // tên bảng
    protected $primaryKey = 'id';    // khóa chính
    // Các cột trong bảng
    protected $fillable = [
        'id',
        'topic',
        'content_1',
        'content_2',
        'content_3',
        'content_4',
        'content_5',
        'image',
        'created_at',
        'update_at',
        'content_6',
        'content_7',
        'content_8',
        'content_9',
        'content_10'

    ];
}
