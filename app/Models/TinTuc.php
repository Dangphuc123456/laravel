<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'title',
        'author',
        'content_1',
        'content_2',
        'content_3',
        'content_4',
        'content_5',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'image_5',
        'created_at',
        'updated_at'
    ];
}

