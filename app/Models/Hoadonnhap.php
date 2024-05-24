<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoadonnhap extends Model
{
    protected $table = 'hoadonandchitietnhap';
    protected $primaryKey = 'idNhap';
    protected $fillable = [
        'idNhap',
        'id',
        'SoLuong',
        'DonGia',
        'TongTien',
        'ProName',
        'updated_at',
        'created_at'
    ];
}
