<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoadonnhap extends Model
{
    use HasFactory;
    protected $table='hoadonandchitietnhap';
    protected $primaryKey = 'idNhap';
    protected $fillable=[
    'idNhap',
    'id',
    'TongSoTien',
    'SoLuong',
    'DonGia',
    'ThanhTien',
    'ProID',
    'ProName',
    'updated_at',
    'created_at'
    ];
}
