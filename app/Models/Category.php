<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category'; // tên bảng
    protected $primaryKey = 'CatID';    // khóa chính
    // Các cột trong bảng
    protected $fillable = [
        'CatID',
        'CatName',
        'MetaTitle',
        'Stuffs',
        'RooID',
        'DisplayOrder',
        'created_at',
        'CreateBy',
        'ModifiedDate',
        'MetaDescriptions',
        'Status',
        'ShowMenu',
        'updated_at'
    ];
}
